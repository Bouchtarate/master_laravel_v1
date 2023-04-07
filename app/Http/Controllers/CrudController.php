<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CrudController extends Controller
{
  public function index()
  {
    $user = User::get();
    return $user;
  }
}