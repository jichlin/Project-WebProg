<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ThreadController extends Controller
{
    public function mainForum(){
         $threadList = Thread::paginate(5);

         return view('mainForum')->with(compact('threadList'));
    }

    public function userForum(){
        $userThreadList = Thread::paginate(5);
        return view('userForum')->with(compact('userThreadList'));
    }

}
