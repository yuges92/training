<?php

namespace App\Http\Controllers\Learner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Order;
use Carbon\Carbon;

class LearnerBookingController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $orders=$user->orders;
    return view('learner.bookings.bookings', compact('orders'))->with('title', 'My Bookings');
  }

  public function show(Order $order)
  {
    return view('learner.bookings.showBooking', compact('order'))->with('title', 'My Bookings');

  }
}
