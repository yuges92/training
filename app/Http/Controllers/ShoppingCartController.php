<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Cart;
use App\ClassEvent;
use App\Course;
use App\User;


class ShoppingCartController extends Controller
{


  public function addToBasket(Request $request)
  {
    if (Auth::check()) {
      Cart::restore(Auth::user()->id);
    }

    $class_id=$request->input('class_id');
    $classEvent=ClassEvent::find($class_id);
    $qty=($request->has('quantity')) ? $request->input('quantity'):1;
    // $request->validate([
    //   'quantity' => 'required|numeric|min:1|max:'.$classEvent->availableSpace,
    // ]);

    if($qty>$classEvent->availableSpace){
      return redirect()->route('showCart')->with('error', 'You can`t buy more than the available space');

    }

    $cartItem=Cart::content()->where('id', $class_id)->first();
    if($cartItem){
      Cart::update($cartItem->rowId, $qty);
      if (Auth::check()) {
        Cart::store(Auth::user()->id);
      }

      return redirect()->route('showCart')->with('success', 'Quantity updated');

    }

    $cartItem = Cart::add(array('id' => $classEvent->id, 'name' => $classEvent->course->title, 'qty' => $qty, 'price' => $classEvent->price));
    $cartItem->associate(ClassEvent::class);
    if (Auth::check()) {
      Cart::store(Auth::user()->id);
    }
    return redirect()->route('showCart')->with('success', 'Course added to cart');

  }

  public function showCart()
  {

    // if (Auth::check()) {
    //   Cart::restore(Auth::user()->id);
    //   Cart::store(Auth::user()->id);
    // }

    $cart = Cart::content();
    dd($cart);
    // dd($cart['370d08585360f5c568b18d1f2e4ca1df']->model);
    return view('cart.cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
  }



  /**
  *
  *Removes item from the cart
  */
  public function destroy(Request $request)
  {
    if (Auth::check()) {
      Cart::restore(Auth::user()->id);
    }
    // dd($cart);
    //     $rowId=$cart->search(function ($cartItem, $rowId) use ($request) {
    //     	return $cartItem->id ==$request->class_id;
    //     });
    // dd($row_id);

    $rowId=$request->rowId;
    Cart::remove($rowId);
    $cart = Cart::content();
    if (Auth::check()) {
      Cart::store(Auth::user()->id);
    }
    return redirect()->route('showCart')->with('success', 'Course deleted from your cart');

  }




}
