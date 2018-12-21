@extends('layout.layout')
@section('content')
    <div class="card">
        <div class="card-header" style="display: flex;justify-content: space-between">
            <span>Add New Category</span>
        </div>
        <div class="card-body table-responsive">
            <form method="post" action="{{url('/master/category/add')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="categoryname">Name</label><span class="red-text">*</span>
                <input type="text" class="form-control" placeholder="" id="categoryname" name="categoryname">
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header" style="display: flex;justify-content: space-between">
            <span>List of Forum Category</span>
        </div>
        <div class="card-body table-responsive">
            <table class="table" width="100%">
                <thead class="">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->CategoryID}}</td>
                        <td>{{$category->CategoryName}}</td>
                        <td class="d-flex justify-content-around">
                            {{csrf_field()}}
                            <a class="btn btn-secondary" href="{{url('/editCategory/'.$category->CategoryID)}}">
                                Edit
                            </a>
                            <form action="{{url('/deleteCategory/'.$category->CategoryID)}}" method="post">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <button type="submit" class="btn btn-warning" style="float: right;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <nav>
        {{$categories->links()}}
    </nav>
@endsection

