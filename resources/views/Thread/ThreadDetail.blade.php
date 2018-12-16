@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="panel-group">
        <div class="panel panel-default">
            {{--Untuk Panel Yang besar dan yang heading--}}
            <div class="panel-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 " style="padding-left: 0; font-size: x-large">
                            <b>{{$threadHeading -> ThreadName}}</b>
                        </div>
                        @if($threadHeading -> isClosed == 1)
                            <div class="col-md-1 text-right">
                                <span class="text-right label label-success">Open</span>
                            </div>
                        @elseif($threadHeading -> isClosed == 0)
                            <div class="col-md-2 text-right">
                                <span class="text-right label-danger label">Closed</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div>Category: {{$threadHeading -> CategoryName}}</div>
                <div>Owner : {{$threadHeading -> UserName}}</div>
                <div>Posted at: {{$threadHeading -> CreatedDate}}</div>
                <br>
                <div>Description :</div>
                <div>{{$threadHeading -> ThreadDescription}}</div>
                <br>
                <form action="{{url("/search")}}" method="get" role="search" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="searching" placeholder="Search This Forum's Thread By Content or Owner">
                        <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" style="color: white; background: #2196F3">
                        <span class="glyphicon glyphicon-search fa fa-search"></span>
                    </button>
                        </span>
                    </div>
                </form>
            </div>
            {{--Untuk Panel Yang besar dan yang heading--}}

            {{--Untuk Panel yang besar dan yang body--}}
            <div class="panel-body">
                {{--Panel untuk thread detail--}}
                @foreach($threadsData as $threadDetail)
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="container">
                                <div class="row">
                                    <div style="padding-left: 0" class="col-md-9">
                                        <b style="color: cornflowerblue">{{$threadDetail -> UserName}}</b><br>
                                        <div>{{$threadDetail -> RolesName}}</div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div class="container">
                                            <div class="row">
                                                @if(session('username') == $threadDetail -> UserName)
                                                <form class="col-md-1" action="" method="POST" role="edit">
                                                    {{ csrf_field() }}
                                                    {{method_field('PUT')}}
                                                    <button type="submit" class="btn btn-warning">
                                                        <span class="glyphicon glyphicon-edit"></span>
                                                        Edit
                                                    </button>
                                                </form>
                                                <form class="col-md-1" style="padding-left: 0" action="" method="POST" role="delete">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                        Delete
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>Posted at: {{$threadDetail -> PostedDate}}</div>
                        </div>
                        <div class="panel-body">
                        </div>
                    </div>
                </div>
                @endforeach
                {{--Panel untuk thread detail--}}

                @if(count($threadsData) > 5)
                    <nav aria-label="Page navigation" class="text-center">
                        <ul class="pagination">
                            {{$threadsData -> links()}}
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                Post New Thread
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content"></textarea>
                </div>
            </div>
            <div class="panel-heading">
                <form action="" method="POST" role="post" class="text-right">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-send"></span>
                        Post
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection