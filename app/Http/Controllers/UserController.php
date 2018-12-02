<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function login(){
        if(Auth::check()){
            return redirect('/forum');
        }
        else{
            return view('login');
        }
    }

    function loginUser(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');
        $remember = $request->get('remember');
        $rememberMe = ($remember == 'remember') ? true : false;


        $login = Auth::attempt(['username'=>$username,'password'=>$password],$rememberMe);

        $validator = Validator::make(['username'=>$username,'password'=>$password],[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails() || $login == false){
                if($login == false){
                    $validator->errors()->add('match', 'Username and password does not match or exist!');
                }
                return redirect('/login')->withErrors($validator)->withInput();
        }
        else{
            if($rememberMe == true){
                $cookie = cookie('loginCookie','true',10);
            }
            session(['username'=>   $username]);
            return redirect('/forum');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }

    function register(){
        return view('register');
    }

    public function registerUser(Request $request){

        Validator::extend('olderThan', function($attribute, $value, $parameters) {
            $minAge = (!empty($parameters)) ? (int)$parameters[0] : 13;
            return (new Carbon())->diff(new Carbon($value))->y >= $minAge;
        });

        $messages = [
            'older_than' => 'Need to be at least 12 years old!'
        ];



        $validator = Validator::make($request->all(),[
           'username' => 'required|max:255',
           'email' => 'required|unique:msuser,useremail|regex:/^.+@.+$/i',
           'password' => 'required|same:confirmPassword|min:6',
           'phone' => 'required|numeric',
           'gender' => 'required',
           'address' => 'required',
           'photo' => 'required|mimes:jpeg,bmp,png,jpg',
           'birthday'=>'date_format:Y-m-d|olderThan:12',
           'agree' => 'accepted'
        ],$messages);

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
            $path = $request->file('photo')->store('profilePicture');
            $user->UserPicture = $path;
            $user->remember_token = '';
            $user->save();
            return redirect('/login');
        }
    }

    function index(){

    }

    function profile($id){
        $user = User::with('role')->where('UserID',$id)->first();
        return view('userDetail',compact('user'));
    }
}
