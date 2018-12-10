<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Thread;

class ThreadController extends Controller
{

    public function mainForum(){
        $threads = Thread::with('category')->paginate(5);

        return view('Thread.index')->with(compact('threads'));
    }

    public function searchMainForum(Request $request){
        $search = $request -> get('searching');
        $threads = Thread::with('category') -> Where('ThreadName','LIKE','%'.$search.'%') -> paginate(5);
        $threads -> appends($request->except('page'));

        return view('Thread.SearchThread')->with(compact('threads', 'search'));
    }

}
