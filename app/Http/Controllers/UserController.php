<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function login(){
        if(Auth::viaRemember()){
            return redirect('/forum');
        }
        else{
            return view('login');
        }
    }

    function loginUser(Request $request){

        $login = [
            'name' => $request->get('username'),
            'password' => $request->get('password')
        ];
        $remember = $request->get('remember');

        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return redirect('/login')->withErrors('validator');
        }

        if(Auth::attempt($login,$remember)) {
            session(['username'=>$login['name']]);
            return redirect('/forum');
        }
        else{
            $error = 'Username or password does not match';
            return redirect('/login')->with(compact('error'))->withInput();
        }
    }

    function logout(){
        Auth::logout();
        session_destroy();
        return redirect('/login');
    }

    function register(){
        return view('register');
    }

    function registerUser(Request $request){

    }

    function index(){

    }

    function profile($id){
        $user = User::with('role')->where('UserID',$id)->first();
        return view('userDetail',compact('user'));
    }
}
