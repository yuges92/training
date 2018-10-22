<?php

namespace App\Http\Middleware;

use Closure;
use App\Cart;

class CheckBuyingForSelf {
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
      foreach ($cartInstance->getCart() as $item) {
        if($item->quantity>1){
          return redirect(('cart'))->with('error', 'You can not buy more than 1 space for a course if you are buying it for your self. If you want to buy more than 1 then please click on someone else button on the next page. Otherwise please change the quantity for the course to 1.');
        }
      }
        return $next($request);
    }
}
