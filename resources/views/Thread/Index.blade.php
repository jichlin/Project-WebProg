@extends("layout.layout")
@section("content")
    @if(Auth::check())
    <div class="addForum mb-2 d-flex">
        <a href="{{url('/forum/create')}}" class="btn btn-info">Add Forum</a>
    </div>
    @endif
    {{--Source : https://www.w3schools.com/howto/howto_css_search_button.asp--}}
    @if(count($threads) > 0)
        {{--Search Bar--}}
        <form action="{{url("/forum/search")}}" method="get" role="search">
            <div class="input-group">
                <input type="text" class="form-control" name="searching"
                       placeholder="Search Forum by Title, and Category Name">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" style="color: white; background: #2196F3">
                        <span class="glyphicon glyphicon-search fa fa-search">Search</span>
                    </button>
                </span>
            </div>
        </form>
        <br>

        {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
        {{--Bagian menampilkan index--}}
        <div class="card-deck flex-column">
            @foreach($threads as $thread)
                <div class="card">
                    <div class="card-header">
                        <table style="width: 100%">
                            <tr>
                                <th class="text-left">
                                    <a href="{{url("/forum/". $thread -> ThreadID)}}">{{$thread -> ThreadName}} </a>
                                </th>
                                @if($thread -> isClosed == 1)
                                    <th class="text-right">
                                        <span class="text-right badge badge-success">Open</span>
                                    </th>
                                @elseif($thread -> isClosed == 0)
                                    <th class="text-right">
                                        <span class="text-right badge badge-danger">Closed</span>
                                    </th>
                                @endif
                            </tr>
                        </table>
                        <div>Category: {{$thread -> category -> CategoryName}}</div>
                        <div>Posted at: {{$thread -> CreatedDate}}</div>
                        @if($thread->CreatedBy == session('userid') && $thread->isClosed == 1)
                            <div class="d-flex justify-content-end">
                                <a href="{{url('/forum/edit/home/'. $thread->ThreadID)}}" class="btn btn-warning">
                                    Edit
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body" style="color: black">{{$thread -> ThreadDescription}}</div>
                </div>
                <br>
            @endforeach
        </div>
        {{--Pagination--}}
        {{$threads -> links()}}
        {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}

    @else
        <div>
            <h3>No Thread Currently Exist</h3>
        </div>

    @endif
@endsection