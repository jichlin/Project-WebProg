@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div>Forum Data</div>
            </div>
            <div class="panel-body">
                <form action="{{ url('/store') }}" method="POST" role="addForum">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name"><span class="red-text">*</span>Name</label>
                        <input type="text" class="form-control" name="name">
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
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection