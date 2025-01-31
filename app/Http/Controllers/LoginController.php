<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index () {
    return view('login', ['title' => 'Login']);
  }
  public function signin(Request $request) {
    $data = $request->validate(
      [
        'email' => 'required|email:dns',
        'password' => 'required'
      ]);
    
    if (Auth::attempt($data)) {
      $request->session()->regenerate();
      return redirect()->intended(route('personal.page', ['user' => Auth::user()->username]));
    } else {
      return redirect()->back()->with('gagal','Your Email or Password wrong!');
    }
  }
  public function logout (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
  }
}
