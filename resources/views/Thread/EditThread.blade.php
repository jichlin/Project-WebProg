@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <div class="card-group">
        <div class="card">
            <div class="card-header">
                <div>Forum Data</div>
            </div>
            <div class="card-body">
                <form action="{{ url('/forum/update/'. $thread -> ThreadID) }}" method="POST" role="addForum">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="name"><span class="red-text">*</span>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$thread -> ThreadName}}">
                        @if($errors->has('name'))
                            <span>{{$errors -> first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category -> CategoryID}}">{{$category -> CategoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description">{{$thread -> ThreadDescription}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection