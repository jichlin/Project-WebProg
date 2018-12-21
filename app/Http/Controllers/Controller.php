<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validateUserData($request , $from = "register"){
        Validator::extend('olderThan', function($attribute, $value, $parameters) {
            $minAge = (!empty($parameters)) ? (int)$parameters[0] : 13;
            return (new Carbon())->diff(new Carbon($value))->y >= $minAge;
        });

        $messages = [
            'older_than' => 'Need to be at least 12 years old!'
        ];


        if($from == "register") {
            $validator = Validator::make($request->all(), [
                'username' => 'required|max:255',
                'email' => 'required|unique:msuser,useremail|regex:/^.+@.+$/i',
                'password' => 'required|same:confirmPassword|min:6',
                'phone' => 'required|numeric',
                'gender' => 'required',
                'address' => 'required|regex:/^.+ Street$/i',
                'photo' => 'required|mimes:jpeg,bmp,png,jpg',
                'birthday' => 'date_format:Y-m-d|olderThan:12',
                'agree' => 'accepted'
            ], $messages);
        }
        else if($from == "profile"){
            $validator = Validator::make($request->all(), [
                'username' => 'required|max:255',
                'email' => ['required','regex:/^.+@.+$/i',
                    Rule::unique('msUser','UserEmail')->ignore($request->id , 'UserID')
                ],
                'password' => 'required|same:confirmPassword|min:6',
                'phone' => 'required|numeric',
                'gender' => 'required',
                'address' => 'required|regex:/^.+ Street$/i',
                'photo' => 'required|mimes:jpeg,bmp,png,jpg',
                'birthday' => 'date_format:Y-m-d|olderThan:12',
            ], $messages);
        }
        else{
            if($request->id == 0) {
                $validator = Validator::make($request->all(), [
                    'username' => 'required|max:255',
                    'email' => 'required|unique:msuser,useremail|regex:/^.+@.+$/i',
                    'role' => 'required',
                    'password' => 'required|same:confirmPassword|min:6',
                    'phone' => 'required|numeric',
                    'gender' => 'required',
                    'address' => 'required|regex:/^.+ Street$/i',
                    'photo' => 'required|mimes:jpeg,bmp,png,jpg',
                    'birthday' => 'date_format:Y-m-d|olderThan:12',
                ], $messages);
            }
            else{
                $validator = Validator::make($request->all(), [
                    'username' => 'required|max:255',
                    'email' => ['required','regex:/^.+@.+$/i',
                        Rule::unique('msUser','UserEmail')->ignore($request->id , 'UserID')
                    ],
                    'role' => 'required',
                    'password' => 'required|same:confirmPassword|min:6',
                    'phone' => 'required|numeric',
                    'gender' => 'required',
                    'address' => 'required|regex:/^.+ Street$/i',
                    'photo' => 'required|mimes:jpeg,bmp,png,jpg',
                    'birthday' => 'date_format:Y-m-d|olderThan:12',
                ], $messages);
            }
        }


        return $validator;
    }

}
