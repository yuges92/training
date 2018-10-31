<?php

namespace App\Http\Controllers\Learner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearnerDashboardController extends Controller
{
    public function index()
    {
      return view('Learner.index')->with('title', 'Dashboard');
    }

}
