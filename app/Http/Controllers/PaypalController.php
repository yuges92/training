<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use DB;
use Config;
use App\Cart;
use App\Order;
use App\OrderPayment;

//-------------------------
//All Paypal Details class
//-------------------------
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class PaypalController extends HomeController
{
  private $apiContext;
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    parent::__construct();
    /** setup PayPal api context **/
    $paypal_conf = Config::get('paypal');
    $this->apiContext = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
    $this->apiContext->setConfig($paypal_conf['settings']);
  }

  /**
  * Store a details of payment with paypal.
  *
  * @param IlluminateHttpRequest $request
  * @return IlluminateHttpResponse
  */
  public function postPaymentWithpaypal(Order $order)
  {

    $payer = new Payer();
    $payer->setPaymentMethod('paypal');
    $currency = 'GBP';
    $cart=Cart::getCartIntance();

    $items=[];
    foreach ($cart->getCart() as $cartItem) {
      $item = new Item();
      $item->setName($cartItem->class->course->title) /** item name **/
      ->setCurrency($currency)
      ->setQuantity($cartItem->quantity)
      ->setPrice($cartItem->getPriceIncVat()); /** unit price **/
      $items[]=$item;
    }

    $item_list = new ItemList();
    $item_list->setItems($items);

    $amount = new Amount();
    $amount->setCurrency($currency)
    ->setTotal($cart->total());

    $transaction = new Transaction();
    $transaction->setAmount($amount)
    ->setItemList($item_list)
    ->setDescription('This transaction is for DLF Training');

    $redirect_urls = new RedirectUrls();
    $redirect_urls->setReturnUrl(URL::route('paypal.status'))
    ->setCancelUrl(URL::route('paypal.cancelled', $order->id));

    $payment = new Payment();
    $payment->setIntent('Sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirect_urls)
    ->setTransactions(array($transaction));

    try {
      $payment->create($this->apiContext);
    } catch (PayPalExceptionPPConnectionException $ex) {
      if (Config::get('app.debug')) {
        return Redirect::route('cart.index')->with('error','Connection timeout');

      } else {
        return Redirect::route('cart.index')->with('error','Some error occur, sorry for inconvenient');
        die('Unable to create link for payment');
      }
    }

    foreach($payment->getLinks() as $link) {
      if($link->getRel() == 'approval_url') {
        $redirect_url = $link->getHref();
        break;
      }
    }

    $orderPayment= new OrderPayment();
    $orderPayment->order_id=$order->id;
    $orderPayment->user_id=$order->user_id;
    $orderPayment->paymentId=$payment->getId();
    $orderPayment->amount=$cart->total();
    $orderPayment->payment_status=$payment->state;
    $orderPayment->save();


    if(isset($redirect_url)) {
      /** redirect to paypal **/
      return Redirect::away($redirect_url);
    }
    return Redirect::route('cart.index')->with('error','Unable to create link for payment');
  }




  public function getPaymentStatus(Request $request)
  {
    if(!$request->paymentId){
      return Redirect::route('cart.index')->with('error','The response is missing the Payment ID and Payer ID');
    }

    $paymentId = $request->paymentId;
    $orderPayment= OrderPayment::where('paymentId',$paymentId)->first();

    $payment = Payment::get($paymentId, $this->apiContext);
    /** PaymentExecution object includes information necessary **/
    /** to execute a PayPal account payment. **/
    /** The payer_id is added to the request query parameters **/
    /** when the user is redirected from paypal back to your site **/
    $execution = new PaymentExecution();
    $execution->setPayerId($request->PayerID);
    /**Execute the payment **/
    // dd($payment);
    try {
      $result = $payment;
      if($payment->getState()=='created'){

        $result = $payment->execute($execution, $this->apiContext);
      }

    } catch (Exception $e) {
      return Redirect::route('cart.index')->with('error', 'Payment failed');
    }

    $orderPayment->payment_status=$result->state;
    $orderPayment->save();
    if ($result->getState() == 'approved') {
      $orderPayment->order->completeOrder();
      return Redirect::route('thankYou')->with('success', 'Payment success');
    }
    return Redirect::route('cart.index')->with('error', 'Payment failed');
  }




  public function cancelledPayment(Order $order, Request $request)
  {
    // $payment = Payment::get($order->payment->paymentId, $this->apiContext);

    if($order->payment->payment_status=='created'){
      $order->status='cancelled';
      $order->payment->payment_status='cancelled';
      $order->save();
      $order->payment->save();
    }

    return view('order.cancelledPayment')->with('error','Payment Cancelled');

  }
}
