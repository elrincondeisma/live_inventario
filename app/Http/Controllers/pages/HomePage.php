<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Device,So,Type};

class HomePage extends Controller
{
  public function index()
  {
    $n_sos = So::where('active',true)->count();
    $n_types = Type::where('active',true)->count();
    $n_devices = Device::where('active',true)->count();
    return view('content.pages.pages-home',['n_sos'=>$n_sos,'n_types'=>$n_types,'n_devices'=>$n_devices]);
  }
}
