<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Role;
use App\User;
use App\Order;
use App\Address;
use App\AccessCode;
use App\UserDetail;
use App\OrderDetail;
use App\ReferralCode;
use App\Mail\NewUserMail;
use Illuminate\Http\Request;
use App\Mail\NewUserRegistered;
use App\Mail\InvoiceBookingMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PaypalController;

class BuyForSomeoneElseController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkCart');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('paymentAndBillingSomeoneElse');
        }
        Session::flash('previous_page', route('paymentAndBillingSomeoneElse'));
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

        return view('checkout.someoneElse');
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
            'organisation' => 'required',
            'line1' => 'required',
            'town' => 'required',
            'county' => 'required',
            'postcode' => 'required',
            'country' => 'required',
        ]);

        $newUser = new User();
        $newUser->firstName = $request->input('firstName');
        $newUser->lastName = $request->input('lastName');
        $newUser->username = $request->input('username');
        $newUser->email = $request->input('email');
        $newUser->phone = $request->input('phone');
        $newUser->organisation = $request->input('organisation');
        $newUser->password = Hash::make($request->input('password'));

        $userAddress = new Address();
        $userAddress->type = 'home';
        $userAddress->line1 = $request->input('line1');
        $userAddress->line2 = $request->input('line2');
        $userAddress->town = $request->input('town');
        $userAddress->county = $request->input('county');
        $userAddress->postcode = $request->input('postcode');
        $userAddress->country = $request->input('country');

        $role = Role::where('name', 'Commissioner')->first();
        $newUser->save();
        $newUser->roles()->attach($role);
        $newUser->addresses()->save($userAddress);


        //send email to the new user about the created account


        if (Auth::loginUsingId($newUser->id)) {
            Mail::to($newUser)->send(new NewUserRegistered($newUser));

            Cart::storeToDatabase();
            return redirect()->route('paymentAndBillingSomeoneElse');
        }

        return redirect()->back()->with('error', 'registration failed');
    }

    public function paymentAndBilling(Request $request)
    {
        // $userData=$request->session()->get('userData');
        // $userAddress=$userData['address'];
        if (Auth::check()) {
            $userAddress = Auth::user()->getAddressByType('billing');
            if (!$userAddress) {
                $userAddress = Auth::user()->getAddressByType('home');
            }
        }
        $paymentAction = 'payment.self';
        $referralCodes = ReferralCode::all();

        return view('checkout.paymentAndBilling', compact('userAddress', 'paymentAction', 'referralCodes'));
    }



    public function payment(Request $request)
    {
        $order = new Order();
        if ($request->input('differentAddress')) {

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
                'billingEmail' => 'required',
                'termsCondition' => 'required',
                'poNumber' => 'required_if:paymentMethod,invoiceRequest',
            ]);

            $order->billingFirstName = $request->billingFirstName;
            $order->billingLastName = $request->billingLastName;
            $order->billingTel = $request->billingTel;
            $order->billingLine1 = $request->billingLine1;
            $order->billingLine2 = $request->billingLine2;
            $order->billingTown = $request->billingTown;
            $order->billingCounty = $request->billingCounty;
            $order->billingPostcode = $request->billingPostcode;
            $order->billingEmail = $request->billingEmail;
            $order->billingCountry = $request->billingCountry;
        } else {
            $this->validate($request, [

                'paymentMethod' => 'required',
                'termsCondition' => 'required',
                'poNumber' => 'required_if:paymentMethod,invoiceRequest',
            ]);

            $userAddress = Auth::user()->getAddressByType('billing');
            if (!$userAddress) {
                $userAddress = Auth::user()->getAddressByType('home');
            }

            $order->billingFirstName = $request->user()->firstName;
            $order->billingLastName = $request->user()->lastName;
            $order->billingTel = $request->user()->phone;
            $order->billingLine1 = $userAddress->line1;
            $order->billingLine2 = $userAddress->line1;
            $order->billingTown = $userAddress->town;
            $order->billingCounty = $userAddress->county;
            $order->billingPostcode = $userAddress->postcode;
            $order->billingCountry = $userAddress->country;
            $order->billingEmail = $request->user()->email;
        }



        // $order->signUpForNews=$request->input('signUpForNews');
        // $order->contacts=$request->input('contacts');


        $order->paymentMethod = $request->paymentMethod;
        $order->termsCondition = $request->termsCondition;
        $order->poNumber = $request->poNumber;
        $order->referralCode = $request->referralCode;

        $cart = Cart::getCartIntance();
        $order->total = $cart->total();
        $order->subTotal = $cart->subtotal();
        $order->totalVat = $cart->getVAT();
        $order->vat = $cart->tax();
        $order->isSelf = 0;


        $order = $request->user()->orders()->save($order);

        foreach ($cart->getCart() as $cartItem) {
            # code...
            if ($cartItem->class->type == 'private') {
                $cartItem->class->availableSpace = 0;
                $cartItem->class->save();
            } else {
                $cartItem->class->reduceSpace($cartItem->quantity);
            }
            $orderDetails = new OrderDetail();
            $orderDetails->order_id = $order->id;
            $orderDetails->class_id = $cartItem->class_id;
            $orderDetails->quantity = $cartItem->quantity;
            $orderDetails->price = $cartItem->class->price;
            $order->orderDetails()->save($orderDetails);
        }

        if ($order->paymentMethod == 'invoiceRequest') {
            Mail::to($request->user())->send(new InvoiceBookingMail($request->user(),  $order));

            Cart::getCartIntance()->emptyCurrentUserCart();
            return redirect()->route('thankYou')->with('success', 'Your booking will be approved once the payment is completed');
        }

        if ($order->paymentMethod == 'paypal') {
            $paypalController = new PaypalController();
            return  $paypalController->postPaymentWithpaypal($order);
        }
        // dd($request);
    }
}
