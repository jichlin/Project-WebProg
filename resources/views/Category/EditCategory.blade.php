@extends('layout.layout')
@section('content')
    <div class="card">
        <div class="card-header" style="display: flex;justify-content: space-between">
            <span>Update Category</span>
        </div>
        <div class="card-body table-responsive">
            <form method="post" action="{{url('/master/category/update/'.$id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <label for="categoryname">Name</label><span class="red-text">*</span>
                <input type="text" class="form-control" placeholder="" id="categoryname" name="categoryname">
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection

