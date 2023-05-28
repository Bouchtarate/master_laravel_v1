<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
  public function index()
  {
    return view('front.landing');
  }

  public function landing()
  {
    $data = [];
    $data['id'] = 13;
    $data['name'] = 'hamza';
    $data['age'] = 25;
    $data['email'] = 'hamza@gmail.com';
    return view('front.index', $data);
  }
}