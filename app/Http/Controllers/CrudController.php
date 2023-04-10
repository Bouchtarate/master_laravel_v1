<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
  public function index()
  {
    $user = User::get();
    return view('crud.index', [
      'users' => $user,
    ]);
  }
  public function create()
  {
    return view('crud.create');
  }
  public function store(ClientRequest $request)
  {

    return $request;
  }
}