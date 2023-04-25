<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\User;
use App\Traits\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
  use StoreImage;
  public function index()
  {
    $clients = Client::all();
    return view('crud.index', [
      'clients' => $clients,
      'lang' => app()->getLocale()
    ]);
  }
  public function create()
  {
    return view('crud.create');
  }
  public function store(ClientRequest $request)
  {
    //Save image in folder
    $image_name = $this->saveImage($request->images, "images/clients");

    Client::create([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'budget' => $request->budget,
      'images' => $image_name,
    ]);
    return redirect('/')->with(['success' => 'you add new client successfully']);
  }
}