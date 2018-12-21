@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <div class="card-deck">
        <div class="card">
            {{--Untuk Panel Yang besar dan yang heading--}}
            <div class="card-body">
                <table style="width: 100%">
                    <tr>
                        <th class="text-left">
                            <div style="font-size: x-large">
                                {{$threadHeading -> ThreadName}}
                            </div>
                        </th>
                        @if($threadHeading -> isClosed == 1)
                            <th class="text-right">
                                <span class="text-right badge badge-success">Open</span>
                            </th>
                        @elseif($threadHeading -> isClosed == 0)
                            <th class="text-right">
                                <span class="text-right badge badge-danger">Closed</span>
                            </th>
                        @endif
                    </tr>
                </table>
                <div>Category: {{$threadHeading -> CategoryName}}</div>
                <div>Owner : {{$threadHeading -> UserName}}</div>
                <div>Posted at: {{$threadHeading -> CreatedDate}}</div>
                <br>
                <div>Description :</div>
                <div>{{$threadHeading -> ThreadDescription}}</div>
                <br>
                <form action="{{url('/forum/'. $threadHeading -> ThreadID.'/search')}}" method="get" role="search" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="searching" placeholder="Search This Forum's Thread By Content or Owner" value="{{$search}}">
                        <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" style="color: white; background: #2196F3">
                        <span class="glyphicon glyphicon-search fa fa-search">Search</span>
                    </button>
                        </span>
                    </div>
                </form>
                <div style="margin-top: 1%;margin-bottom: 1%">
                    Thread Search Result with '<b>{{$search}}</b>' Keyword(s):
                </div>
            </div>
            {{--Untuk Panel Yang besar dan yang heading--}}

            {{--Untuk Panel yang besar dan yang body--}}
            <div class="panel-body">
                {{--Panel untuk thread detail--}}
                @if(count($threadsData) > 0)
                    <div class="card-deck">
                    @foreach($threadsData as $threadDetail)
                            <div class="card">
                                <div class="card-header">
                                    <table style="width: 100%" class="table-responsive-md">
                                        <tr>
                                            <th class="text-left">
                                                <label style="font-size: x-large; margin: 0">
                                                    {{$threadDetail -> UserName}}
                                                </label>
                                                <div style="font-weight: lighter">
                                                    {{$threadDetail -> RolesName}}
                                                </div>
                                            </th>
                                            @if(session()->exists('username') == true)
                                                @if(session('username') == $threadDetail -> UserName)
                                                    <th class="text-right" style="width: 0.1%">
                                                        <form action="{{url('/forum/'. $threadHeading -> ThreadID .'/edit/'. $threadDetail -> ThreadDetailsID)}}" method="get" role="edit" style="width: fit-content">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-warning">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                                Edit
                                                            </button>
                                                        </form>
                                                    </th>
                                                    <th class="text-right" style="width: 0.1%">
                                                        <form action="{{url('forum/'. $threadHeading -> ThreadID .'/delete/'. $threadDetail -> ThreadDetailsID)}}" method="POST" role="delete" style="width: fit-content">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button type="submit" class="btn btn-danger">
                                                                <span class="glyphicon glyphicon-remove"></span>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </th>
                                                @endif
                                            @endif
                                        </tr>
                                    </table>
                                    <div>Posted at: {{$threadDetail -> PostedDate}}</div>
                                </div>
                                <div class="card-body">
                                    {{$threadDetail -> Post}}
                                </div>
                            </div>
                    @endforeach
                    </div>
                        {{--Panel untuk thread detail--}}

                    {{$threadsData -> links()}}
                @else
                    <div class="text-left">
                        <h4>No Thread Currently Exist</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if(session()->exists('username') == true)
        <form action="{{url('/forum/'. $threadHeading -> ThreadID .'/store/'. $users -> UserID)}}" method="POST" role="post">
            {{csrf_field()}}
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        Post New Thread
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="contentPanel">Content</label>
                            <textarea class="form-control" name="contentPanel"></textarea>
                            @if($errors->has('contentPanel'))
                                <span>The content field is required.</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-send"></span>
                                Post
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection