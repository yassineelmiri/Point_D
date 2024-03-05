<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class LoginController extends Controller
{
  
    public function show(){
        return view('login.show');
    }
    public function login(Request $request){
       $login = $request->email;
       $password = $request->password;
       $credentials = ['email' => $login , "password" => $password];
       if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('homepage')->with('success','Vous étes bien connecté '.$login." .");
       }else{
            return back()->withErrors(['email'=>'Email ou mot de pass incorrect'
        ])->onlyInput('email');
       }

    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login.show')->with('success','Vous étes bien déconnecté.');
    }
}
