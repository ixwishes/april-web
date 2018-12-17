<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
  public function show()
  {
     $clients = Client::orderBy('id','asc')->get();

     return view('demo')->withClients($clients);
  }
}
