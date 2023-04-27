<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\User;
use App\Models\Video;
use App\Traits\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OldCrudController extends Controller
{
  use StoreImage;
  public function youtube()
  {
    $videos = Video::first();
    event(new VideoViewer($videos));
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
    return view('crud.edit', [
      'client' => Client::where('id', $id)->first()
    ]);
  }
  public function update(string $id, request $request)
  {
    $request->validate([
      'name' => ['required'],
      'email' => ['required'],
      'phone' => ['required'],
      'budget' => ['required']
    ]);
    Client::where('id', $id)->update([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'budget' => $request->budget
    ]);
    return redirect('/')->with('message', "Your update has been applied successfully");
  }
}