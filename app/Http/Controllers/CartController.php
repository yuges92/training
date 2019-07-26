<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\ClassEvent;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cartInstance = Cart::getCartIntance();

        return view('cart.cart', array('cart' => $cartInstance->getCart(), 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class_id = $request->input('class_id');
        $class = classEvent::find($class_id);
        if (!$class) {
            return redirect()->back()->with('error', 'Course does not exist');
        }
        if ($request->input('quantity') > $class->availableSpace) {
            return redirect()->back()->with('error', 'Required space is more than the allocated space for the course');
        }
        // dd($request);
        $cart = new Cart();
        $cart->class_id = $request->input('class_id');
        $cart->user_id = $request->input('user_id');
        $cart->quantity = $request->input('quantity');
        $cart->addToBasket();
        return redirect()->route('cart.index')->with('success', 'Course added to the basket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        dd(Cart::getCartIntance()->checkIfExist($class_id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {


        $class = classEvent::find($class_id);
        $quantity = $request->input('quantity');
        if ($request->input('quantity') > $class->availableSpace) {
            return redirect()->back()->with('error', 'the quantity you require is more than the allocated space for the course');
        }

        Cart::updateQuantity($class_id, $quantity);
        return redirect()->route('cart.index')->with('success', 'Course quantity updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_id)
    {
        Cart::destroy($class_id);
        return redirect()->route('cart.index')->with('success', 'Course removed from your basket');
    }
}
