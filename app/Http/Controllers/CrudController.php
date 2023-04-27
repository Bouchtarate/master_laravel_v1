<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use App\Models\Video;
use App\Traits\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
  use StoreImage;
  public function youtube()
  {
    $videos = Video::first();
    return view('crud.youtube', [
      'videos' => $videos
    ]);
  }
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
  public function edit(string $id)
  {
    $client = Client::where('id', $id)->first();
    if (!$client) {
      return redirect('/');
    }
    return view('crud.edit', [
      'client' => $client
    ]);
  }
  public function update(string $id, UpdateClientRequest $request)
  {
    $client = Client::where('id', $id)->first();

    // IF YOU WANT UPDATE ALL THE IN ONE LINE ||
    // $client->update($request->all());
    // UPDATE DATA IN MULTI LINE
    $client->update([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'budget' => $request->budget
    ]);

    return redirect('/')->with('success', 'Your updating was applied successfully');
  }

  public function delete(string $id)
  {
    $client = Client::where('id', $id)->first();
    if (!$client) {
      return redirect('/');
    }
    $client->delete();
    return redirect('/')->with('success', 'Your delete was applied successfully');
  }
}