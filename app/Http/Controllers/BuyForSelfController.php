<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use Illuminate\Support\Facades\Hash;
use App\Cart;
use App\Address;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Order;
use App\OrderDetail;
use App\Http\Controllers\PaypalController;
use App\AccessCode;

class BuyForSelfController extends Controller
{

  public function __construct()
  {
    $this->middleware('checkCart');
    $this->middleware('checkBuyingForSelf');
  }

  public function index()
  {
    if (Auth::check()) {
      return redirect()->route('paymentAndBillingSelf');
    }
    return view('checkout.loginRegister');

  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    if (Auth::check()) {
      return redirect()->route('paymentAndBilling');
    }

    return view('checkout.buyingForSelf');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, [
      'firstName' => 'required',
      'lastName' => 'required',
      'username' => 'required|unique:users,username',
      'email' => 'required|email|unique:users,email|confirmed',
      'password' => 'required|min:8|confirmed ',
      'phone' => 'required|numeric',
      'line1' => 'required',
      'town' => 'required',
      'county' => 'required',
      'postcode' => 'required',
      'country' => 'required',
      'jobStatus' => 'required',
      'jobRole' => 'required',
      'organisation' => 'required',
      'dob' => 'required',
      'ethnicity' => 'required'
    ]);
    $newUser= new User();
    $newUser->firstName =$request->input('firstName');
    $newUser->lastName =$request->input('lastName');
    $newUser->username =$request->input('username');
    $newUser->email =$request->input('email');
    $newUser->phone =$request->input('phone');
    $newUser->organisation =$request->input('organisation');
    $newUser->password =Hash::make($request->input('password'));

    $userAddress= new Address();
    $userAddress->type='home';
    $userAddress->line1=$request->input('line1');
    $userAddress->line2=$request->input('line2');
    $userAddress->town=$request->input('town');
    $userAddress->county=$request->input('county');
    $userAddress->postcode=$request->input('postcode');
    $userAddress->country=$request->input('country');

    $userAdditionalDetail = new UserDetail();
    $userAdditionalDetail->jobStatus =$request->input('jobStatus');
    $userAdditionalDetail->jobRole =$request->input('jobRole');
    $userAdditionalDetail->dob =$request->input('dob');
    $userAdditionalDetail->gender =$request->input('gender');
    $userAdditionalDetail->ethnicity =$request->input('ethnicity');
    $userAdditionalDetail->ability =$request->input('ability');
    $userAdditionalDetail->disability =$request->input('disability');


    $role = Role::where('name', 'Learner')->first();
    $newUser->save();
    $newUser->roles()->attach($role);
    $newUser->addresses()->save($userAddress);
    $newUser->detail()->save($userAdditionalDetail);


    //send email to the new user about the created account

    if (Auth::loginUsingId($newUser->id)) {
      Cart::storeToDatabase();
      return redirect()->route('paymentAndBillingSelf');
    }

    return redirect()->back()->with('error', 'registration failed');

  }



  public function paymentAndBillingSelf(Request $request){
    if(Auth::check()){
      $userAddress=Auth::user()->getAddressByType('billing');
      if(!$userAddress){
        $userAddress=Auth::user()->getAddressByType('home');
      }
    }
    $paymentAction='payment.someoneElse';
    return view('checkout.paymentAndBilling', compact('userAddress','paymentAction' ));
  }


  public function payment(Request $request)
  {
    // dd($request);
    // dd($request->user()->firstName);
    $order= new Order();
    if($request->input('differentAddress')==1){

      $this->validate($request, [
        'billingFirstName' => 'required',
        'billingLastName' => 'required',
        'billingTel' => 'required|numeric',
        'billingLine1' => 'required',
        'billingTown' => 'required',
        'billingCounty' => 'required',
        'billingPostcode' => 'required',
        'billingCountry' => 'required',
        'paymentMethod' => 'required',
        'termsCondition' => 'required',
        'poNumber' => 'required_if:paymentMethod,invoiceRequest',
      ]);

      $order->billingFirstName=$request->input('billingFirstName');
      $order->billingLastName=$request->input('billingLastName');
      $order->billingTel=$request->input('billingTel');
      $order->billingLine1=$request->input('billingLine1');
      $order->billingLine2=$request->input('billingLine2');
      $order->billingTown=$request->input('billingTown');
      $order->billingCounty=$request->input('billingCounty');
      $order->billingPostcode=$request->input('billingPostcode');
      $order->billingCountry=$request->input('billingCountry');

    }else {
      $this->validate($request, [

        'paymentMethod' => 'required',
        'termsCondition' => 'required',
        'poNumber' => 'required_if:paymentMethod,invoiceRequest',
      ]);

      $userAddress=Auth::user()->getAddressByType('billing');
      if(!$userAddress){
        $userAddress=Auth::user()->getAddressByType('home');
      }

      $order->billingFirstName=$request->user()->firstName;
      $order->billingLastName=$request->user()->lastName;
      $order->billingTel=$request->user()->phone;
      $order->billingLine1=$userAddress->line1;
      $order->billingLine2=$userAddress->line1;
      $order->billingTown=$userAddress->town;
      $order->billingCounty=$userAddress->county;
      $order->billingPostcode=$userAddress->postcode;
      $order->billingCountry=$userAddress->country;

    }



    // $order->signUpForNews=$request->input('signUpForNews');
    // $order->contacts=$request->input('contacts');


    $order->paymentMethod=$request->input('paymentMethod');
    $order->termsCondition=$request->input('termsCondition');
    $order->poNumber=$request->input('poNumber');
    $cart=Cart::getCartIntance();
    $order->total=$cart->total();
    $order->subTotal=$cart->subtotal();
    $order->totalVat=$cart->getVAT();
    $order->vat=$cart->tax();
    $order->isSelf=1;
    $order->billingEmail='sivayuges@gmail.com';


    $order=$request->user()->orders()->save($order);

    foreach ($cart->getCart() as $cartItem) {
      $orderDetails= new OrderDetail();
      $orderDetails->order_id=$order->id;
      $orderDetails->class_id=$cartItem->class_id;
      $orderDetails->quantity=$cartItem->quantity;
      $orderDetails->price=$cartItem->class->price;
      $order->orderDetails()->save($orderDetails);
    }

    if($order->paymentMethod=='invoiceRequest'){
      Cart::getCartIntance()->emptyCurrentUserCart();
      return redirect()->route('thankYou')->with('success', 'Your booking will be approved once the payment is completed');
    }

    if ($order->paymentMethod=='paypal'){
      $paypalController= new PaypalController();
      return  $paypalController->postPaymentWithpaypal($order);
    }
    // dd($request);
  }




}
