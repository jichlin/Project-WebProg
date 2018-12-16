<?php

namespace App\Http\Controllers;

use App\Category;
use App\ThreadDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        $thread -> CreatedBy = 1;

        $thread -> save();

        return redirect('/forum');
    }

    public function storeThread(Request $request,$id, $post_id){
        $post = $request -> contentPanel;
        DB::table('trthreaddetails')
            ->insert(
            [
                'Post' => $post,
                'ThreadID' => $id,
                'PostedBy' => $post_id,
                'PostedDate' => Carbon::now()
            ]
        );

        return redirect('/forum/'. $id);
    }

    public function detailThread($id)
    {
        $threadsData = DB::table('trthread')
            ->join('trthreaddetails','trthreaddetails.ThreadID','=','trthread.ThreadID')
            ->join('msuser','msuser.UserID','=','trthreaddetails.PostedBy')
            ->join('msroles','msroles.RolesID','=','msuser.RolesID')
            ->select('msuser.*','msroles.*','trthreaddetails.*')
            ->where('trthreaddetails.ThreadID','=',$id)
            ->paginate(5);

        $threadHeading = DB::table('trthread')
            ->join('mscategory','mscategory.CategoryID','=','trthread.CategoryID')
            ->join('msuser','msuser.UserID','=','trthread.CreatedBy')
            ->select('trthread.*','mscategory.*','msuser.*')
            ->where('trthread.ThreadID','=',$id)
            ->first();

        $user = DB::table('msuser')
            ->select('msuser.*')
            ->where('msuser.UserName','=', session('username'))
            ->first();

        return view('Thread.ThreadDetail', ['threadHeading'=>$threadHeading,'threadsData'=>$threadsData,'users' => $user]);
    }

    public function edit($id)
    {
        $thread = Thread::find($id);
        $categories = Category::all();
        return view('Thread.EditThread')->with(compact('thread','categories'));
    }

    public function editThread($id, $post_id){
        $threadsData = DB::table('trthread')
            ->join('trthreaddetails','trthreaddetails.ThreadID','=','trthread.ThreadID')
            ->join('msuser','msuser.UserID','=','trthreaddetails.PostedBy')
            ->join('msroles','msroles.RolesID','=','msuser.RolesID')
            ->select('msuser.*','msroles.*','trthreaddetails.*')
            ->where('trthreaddetails.ThreadID','=',$id)
            ->paginate(5);

        $threadHeading = DB::table('trthread')
            ->join('mscategory','mscategory.CategoryID','=','trthread.CategoryID')
            ->join('msuser','msuser.UserID','=','trthread.CreatedBy')
            ->select('trthread.*','mscategory.*','msuser.*')
            ->where('trthread.ThreadID','=',$id)
            ->first();

        $threadEdited = DB::table('trthreaddetails')
            ->select('trthreaddetails.*')
            ->where('trthreaddetails.ThreadDetailsID','=',$post_id)
            ->first();

        return view('Thread.EditThreadDetail', ['threadHeading'=>$threadHeading,'threadsData'=>$threadsData,'threadEdited'=>$threadEdited]);
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

        $thread -> save();
        return redirect('/forum');
    }

    public function updateThread(Request $request, $id, $post_id)
    {
        DB::table('trthreaddetails')
            ->where('trthreaddetails.ThreadDetailsID','=',$post_id)
            ->update(['Post' => $request -> contentPanel]);

        return redirect('/forum/'. $id);
    }

    public function destroyThreadDetails($id, $post_id)
    {
        DB::table('trthreaddetails')
            ->where('trthreaddetails.ThreadDetailsID','=',$post_id)
            ->delete();

        return redirect('/forum/'. $id);
    }
}
