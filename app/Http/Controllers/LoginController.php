<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\LoginRequest;
class LoginController extends Controller
{
    public function getLogin(){
        if(!Auth::check() ){
            return view('admin.login');
        }else{
            return redirect('admin-ts');
        }
    }
    public function postLogin(Request $request){
        $login = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 1
        ];
        if (Auth::attempt($login)) { 
            return redirect('admin-ts');
        }else{
            echo "ERROR";
        }
    
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
