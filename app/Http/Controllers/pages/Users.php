<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
  public function index()
  {
    $users = User::all();
    
    return view('content.pages.users',['users'=>$users]);
  }
  public function create()
  {
    return view('content.pages.users-create');
  }
  public function store(Request $request){
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect()->route('pages-users');
  }
}
