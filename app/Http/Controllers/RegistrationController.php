<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
  public function index () {
    return view('registration', ['title' => 'Registration']);
  }
  public function signup (Request $request) {
    $user = new User();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    return redirect()->route('login');
  }
}
