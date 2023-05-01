<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
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
    $image_name = $this->saveImage($request->images, "images/clients");

    $client = Client::create([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'budget' => $request->budget,
      'images' => $image_name,
    ]);

    if ($client) {
      return response()->json([
        'status' => true,
        'msg' => "تم الحفظ بنجاح",
      ]);
    } else {
      return response()->json([
        'status' => false,
        'msg' => "فشل في الحفظ رجاء المحاولة مجددا",
      ]);
    }
  }

  public function edit(string $id)
  {
    $client = Client::where('id', $id)->first();
    return view(
      'ajaxCRUD.edit',
      ['client' => $client]
    );
  }

  public function update(Request $request)
  {
    $client = Client::where('id', $request->id)->first();
    $client->update([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'budget' => $request->budget
    ]);
    return response()->json([
      'status' => true,
      'msg' => 'your update was applied successfully',
    ]);
    // return $request;
  }
  public function delete(Request $request)
  {
    $client = Client::where('id', $request->id)->first();
    $client->delete();
    return response()->json([
      'status' => true,
      'msg' => 'تم الحدف بنجاح ',
      'id' => $request->id,
    ]);
  }
}