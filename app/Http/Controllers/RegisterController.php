<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('register');
    }

    public function registerUser(Request $request){

        $validator = Controller::validateUserData($request);

        if($validator->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }
        else {
            $user = new User();
            $user->RolesID = 2;
            $user->UserName = $request->username;
            $user->UserEmail = $request->email;
            $user->UserPassword = Hash::make($request->password);
            $user->UserPhone = $request->phone;
            $user->UserAddress = $request->address;
            $date = Carbon::parse($request->birthday);
            $user->UserDOB = $date->format('Y-m-d');
            $user->UserGender = ($request->gender == 'M') ? 'M' : 'F';
            $path = $request->file('photo')->store('public/profilePicture');
            $user->UserPicture = $path;
            $user->remember_token = '';
            $user->save();
            return redirect('/login');
        }
    }
}
