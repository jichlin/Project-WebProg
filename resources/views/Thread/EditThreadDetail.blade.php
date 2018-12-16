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
                <br>
            </div>
            {{--Untuk Panel Yang besar dan yang heading--}}

            {{--Untuk Panel yang besar dan yang body--}}
            <div class="panel-body">
                {{--Panel untuk thread detail--}}
                @if(count($threadsData) > 0)
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
                                                            <form class="col-md-1" action="{{url('/forum/'. $threadHeading -> ThreadID .'/edit/'. $threadDetail -> ThreadDetailsID)}}" method="get" role="edit">
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn btn-warning">
                                                                    <span class="glyphicon glyphicon-edit"></span>
                                                                    Edit
                                                                </button>
                                                            </form>
                                                            <form class="col-md-1" style="padding-left: 0" action="{{url('forum/'. $threadHeading -> ThreadID .'/delete/'. $threadDetail -> ThreadDetailsID)}}" method="POST" role="delete">
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
                                    {{$threadDetail -> Post}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--Panel untuk thread detail--}}

                    <nav aria-label="Page navigation" class="text-center">
                        <ul class="pagination" style="margin: 0">
                            {{$threadsData -> links()}}
                        </ul>
                    </nav>
                @else
                    <div>
                        This forum doesn't have any thread
                    </div>
                @endif
            </div>
        </div>
    </div>
    <form action="{{url('/forum/'. $threadHeading -> ThreadID .'/update/'. $threadEdited -> ThreadDetailsID)}}" method="POST" role="update">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Current Thread
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="contentPanel">Content</label>
                        <textarea class="form-control" name="contentPanel">{{$threadEdited -> Post}}</textarea>
                    </div>
                </div>
                <div class="panel-heading">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-send"></span>
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection