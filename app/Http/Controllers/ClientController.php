<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
{
   // $clients = Client::all();
//    $clients = DB::connection('Business_mysql')->table('clients')->get();
    // return view('clients.index', compact('clients'));
    return view('clients.index');
}
}
