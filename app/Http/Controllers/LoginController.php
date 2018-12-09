<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    //
    public function login(){
        if(Auth::check()){
            return redirect('/forum');
        }
        else{
            return view('login');
        }
    }
    public function loginUser(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
        $remember = $request->get('remember');
        $rememberMe = ($remember == 'remember') ? true : false;

        $login = Auth::attempt(['useremail'=>$email,'password'=>$password],$rememberMe);

        $user = User::where('UserEmail',$email)->first();

        if($login == false){
            $validator = Validator::make($request->all(),['email' => 'required']);
            $validator->errors()->add('match', 'Username and password does not match or exist!');
            return redirect('/login')->withErrors($validator)->withInput();
        }
        else{
            session(['username'=> $user->UserName]);
            session(['userroles' => $user->RolesID]);
            if($user->UserPicture != '') {
                session(['image' => $user->UserPicture]);
            }
            else{
                session(['image'=> 'profilePicture/default.jpg']);
            }
            return redirect('/forum');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
