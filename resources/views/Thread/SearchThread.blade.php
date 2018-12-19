@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/howto/howto_css_search_button.asp--}}

    {{--Search Bar--}}
    <form action="{{url("/forum/search")}}" method="get" role="search">
        <div class="input-group">
            <input type="text" class="form-control" name="searching"
                   placeholder="Seach Forum by Titile, and Category Name" value="{{$search}}">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default" style="color: white; background: #2196F3">
                    <span class="glyphicon glyphicon-search fa fa-search">Search</span>
                </button>
            </span>
        </div>
    </form>
    {{--https://justlaravel.com/search-functionality-laravel/ || untuk search bar--}}

    <div class="h4">
        Thread Search Result with '<b>{{$search}}</b>' Keyword(s):
    </div>
    <br>

    @if(count($threads) > 0)
        {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}

        {{--Bagian menampilkan index--}}
        <div class="card-deck flex-column">
            @foreach($threads as $thread)
                <a href="{{url("/forum/". $thread -> ThreadID)}}">
                    <div class="card m-2">
                        <div class="card-header">
                            <table style="width: 100%">
                                <tr>
                                    <th class="text-left">{{$thread -> ThreadName}}</th>
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
                            <div>Category: {{$thread -> CategoryName}}</div>
                            <div>Posted at: {{$thread -> CreatedDate}}</div>
                        </div>
                        <div class="card-body" style="color: black">{{$thread -> ThreadDescription}}</div>
                    </div>
                </a>
                <br>
            @endforeach
        </div>

        {{--Pagination--}}
        {{$threads -> links()}}
        {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}

    @else
        <div class="text-left">
            <h4>No Thread Currently Exist</h4>
        </div>
    @endif
@endsection