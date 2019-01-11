<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('Category.MasterCategory')->with(compact('categories'));
    }

    public function add(Request $req)
    {
        $validator = Validator::make($req->all(),['categoryname' => 'required']);
        if($validator->fails()){
            return redirect('/master/category')->withErrors($validator);
        }
        else {
            $newCategory = new Category();
            $newCategory->CategoryName = $req->categoryname;
            $newCategory->save();
            return redirect('/master/category');
        }
    }

    public function remove($id)
    {
        $category = Category::where('CategoryID', $id);
        $category->delete();
        return redirect('/master/category');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('Category/EditCategory')->with(compact('category'));
    }

    public function update(Request $req, $id)
    {
        $validator = Validator::make($req->all(),['categoryname' => 'required']);
        if($validator->fails()){
            return redirect('/master/category')->withErrors($validator);
        }
        else {
            $category = Category::find($id);
            $category->CategoryName = $req->categoryname;
            $category->save();
            return redirect('/master/category');
        }
    }

}

