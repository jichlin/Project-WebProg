<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Roles;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addeditUserData($from,$id = 0){
        $user = new User();
        $action = 'updateUserData';
        if($from == "profile"){
            $user = User::where('UserID',$id)->first();
            return view('Master.AddUpdateMasterUser')->with(compact('user'))->
            with(compact('from'))->with(compact('action'));
        }
        else {
            $roles = Roles::all();
            if($id == 0){
                $action ='newUserData';
                return view('Master.AddUpdateMasterUser')->with(compact('user'))->with(compact('from'))
                    ->with(compact('roles'))->with(compact('action'));
            }
            else{
                $user = User::where('UserID',$id)->first();
                return view('Master.AddUpdateMasterUser')->with(compact('user'))->with(compact('from'))
                    ->with(compact('roles'))->with(compact('action'));
            }
        }
    }

    public function postUserData(Request $request){
        $id = $request->id;
        $from = $request->from;
        $validator = Controller::validateUserData($request , $from);
        if($validator->fails()){
            return redirect()->action('UserController@addeditUserData',['from' => $from, 'id' => $id])->
            withErrors($validator)->withInput();
        }
        else {
            $user = new User();
            if($id != 0) {
                $user = User::where('UserID', $id)->first();
            }
            $user->RolesID = $request->role;
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
            return redirect('/master/user');
        }
    }

    public function putUserData(Request $request){
        $id = $request->id;
        $from = $request->from;
        $validator = Controller::validateUserData($request , $from);
        if($validator->fails()){
            return redirect()->action('UserController@addeditUserData',['from' => $from, 'id' => $id])->
            withErrors($validator)->withInput();
        }
        else {
            $user = User::where('UserID', $id)->first();
            if($from == "master"){
                $user->RolesID = $request->role;
            }
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
            $user->update();
            if($from == "profile"){
                return redirect('/profile/'.$user->UserName);
            }
            else{
                return redirect('/master/user');
            }
        }
    }

    public function modifyPop(Request $request){
        $user = User::where('UserID',$request->id)->first();
        $value = 0;
        if($request->pop == 'positive'){
            $value = $user->UserPositivePop;
            $value += 1;
            $user->UserPositivePop = $value;
        }
        else{
            $value = $user->UserNegativePop;
            $value += 1;
            $user->UserNegativePop = $value;
        }
        $user->update();
        return redirect('/profile/'.$user->UserName);

    }

    public function index(){
        $users = User::paginate(5);

        return view('Master.MasterUser')->with(compact('users'));
    }


    public function profile($username){
        $user = User::where('UserName',$username)->first();
        return view('User.UserProfile',compact('user'));
    }

    public function remove($id){
         $user = User::where('UserID',$id);
         $user->delete();
         return redirect('/master/user');
    }
}
