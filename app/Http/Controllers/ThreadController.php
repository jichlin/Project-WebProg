<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
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
        $threads = Thread::Where('ThreadName','LIKE','%'.$search.'%') -> paginate(5);
        $threads -> appends($request->except('page'));

        return view('Thread.SearchThread')->with(compact('threads', 'search'));
    }

    public function createAdd()
    {
        $categories = Category::all();

        return view('Thread.AddThread')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'description' => 'nullable'
        ]);

        if ($validate->fails()){
            return redirect('/create')->withErrors($validate);
        }

        if($request -> description == null){
            $request -> description = "";
        }

        $thread = new Thread();
        $thread -> ThreadName = $request -> name;
        $thread -> CategoryID = $request -> category;
        $thread -> ThreadDescription = $request -> description;
        $thread -> CreatedDate = Carbon::now();
        $thread -> isClosed = 1;
        $thread -> CreatedBy = 1; // masih butuh pencerahan

        $thread -> save();

        return redirect('/forum');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $thread = Thread::find($id);
        $categories = Category::all();
        return view('Thread.EditThread')->with(compact('thread','categories'));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'description' => 'nullable'
        ]);

        if ($validate->fails()){
            return redirect('/edit/'. $id)->withErrors($validate);
        }

        if($request -> description == null){
            $request -> description = "";
        }

        $thread = Thread::find($id);
        $thread -> ThreadName = $request -> name;
        $thread -> CategoryID = $request -> category;
        $thread -> ThreadDescription = $request -> description;
        $thread -> isClosed = 1; // masih butuh pencerahan

        $thread -> save();
        return redirect('/forum');
    }

    public function destroy($id)
    {

    }
}
