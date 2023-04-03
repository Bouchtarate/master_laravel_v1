<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['users', 'dashboard']);
  }

  public function home()
  {
    return "Welcome back";
  }
  public function dashboard()
  {
    return "Dashboard section";
  }
  public function users()
  {
    return "Users Section";
  }
}