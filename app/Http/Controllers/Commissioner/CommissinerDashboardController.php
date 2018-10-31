<?php

namespace App\Http\Controllers\Commissioner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommissinerDashboardController extends Controller
{

  public function index()
  {
    return view('commissioner.index')->with('title', 'Dashboard');

  }
}
