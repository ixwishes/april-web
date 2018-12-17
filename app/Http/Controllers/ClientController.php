<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
  public function show()
  {
     $clients = \App\Client::select('id', 'name')->get();

     return view('demo')->withClients($clients);
  }
}
