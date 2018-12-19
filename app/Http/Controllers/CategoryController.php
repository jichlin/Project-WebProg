<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Roles;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\BinaryOp\SmallerOrEqual;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('Category.MasterCategory')->with(compact('categories'));
    }

    public function add(Request $req)
    {
        $newCategory = new Category();
        $newCategory->CategoryName = $req->categoryname;
        $newCategory->save();
        return redirect('/master/category');
    }

    public function remove($id)
    {
        $category = Category::where('CategoryID', $id);
        $category->delete();
        return redirect('/master/category');
    }

    public function edit($id)
    {
        return view('Category/EditCategory')->with(compact('id'));
    }

    public function update(Request $req, $id)
    {
        $category  = Category::find($id);
        //$category = Category::where('CategoryID', $id);
        $category->CategoryName = $req->categoryname;
        $category->save();
        return redirect('/master/category');
    }

}

