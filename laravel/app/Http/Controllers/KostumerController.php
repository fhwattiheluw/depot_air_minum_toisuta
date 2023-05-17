<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KostumerController extends Controller
{
    public function index()
    {
      return view('kelola_data_customer');
    }
}
