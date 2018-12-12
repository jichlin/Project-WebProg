@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 " style="padding-left: 0; font-size: x-large">
                            <b>{{$thread -> ThreadName}}</b>
                        </div>
                        @if($thread -> isClosed == 1)
                            <div class="col-md-1 text-right">
                                <span class="text-right label label-success">Open</span>
                            </div>
                        @elseif($thread -> isClosed == 0)
                            <div class="col-md-1 text-right">
                                <span class="text-right label-danger label">Closed</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div>Category: {{$thread -> category -> CategoryName}}</div>
                <div>Owner : {{$thread -> user -> UserName}}</div>
                <div>Posted at: {{$thread -> CreatedDate}}</div>
                <br>
                <div>Description :</div>
                <div>{{$thread -> ThreadDescription}}</div>

                <form action="{{url("/search")}}" method="get" role="search" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="searching" placeholder="Seach Forum by Titile, and Category Name">
                        <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" style="color: white; background: #2196F3">
                        <span class="glyphicon glyphicon-search fa fa-search"></span>
                    </button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="panel-body">

            </div>
        </div>
    </div>
@endsection