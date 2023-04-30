<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Traits\StoreImage;
use Illuminate\Http\Request;

class ClientController extends Controller
{

  use StoreImage;
  public function index()
  {
    $clients = Client::all();
    return view('ajaxCRUD.index', [
      'clients' => $clients,
    ]);
  }
  public function create()
  {
    return view('ajaxCRUD.create');
  }

  // Store client into db using AJAX
  public function Store(Request $request)
  {
    // $image_name = $this->saveImage($request->images, "images/clients");

    Client::create([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'budget' => $request->budget,
      // 'images' => $image_name,
    ]);
  }
}