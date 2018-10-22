<?php

namespace App\Http\Middleware;

use Closure;
use App\Cart;
class CheckCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $cartInstance = Cart::getCartIntance();
      if($cartInstance->getCart()->count()<1){
        return redirect('courses')->with('error','Empty cart. There is no courses in the cart. Please add courses to the cart to continue bookings');

      }
        return $next($request);
    }
}
