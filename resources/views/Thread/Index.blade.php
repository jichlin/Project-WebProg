@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/howto/howto_css_search_button.asp--}}
    @if(count($threads) > 0)

        {{--Search Bar--}}
        <form action="{{url("/forum/search")}}" method="get" role="search" >
            <div class="input-group">
                <input type="text" class="form-control" name="searching" placeholder="Search Forum by Title, and Category Name">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" style="color: white; background: #2196F3">
                        <span class="glyphicon glyphicon-search fa fa-search"></span>
                    </button>
                </span>
            </div>
        </form>
        {{--https://justlaravel.com/search-functionality-laravel/ || untuk search bar--}}
        <br>

        {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        {{--Bagian menampilkan index--}}
        @foreach($threads as $thread)
            <a href="{{url("/forum/". $thread -> ThreadID)}}">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <table style="width: 100%">
                                <tr>
                                    <th class="text-left">{{$thread -> ThreadName}}</th>
                                    @if($thread -> isClosed == 1)
                                        <th class="text-right">
                                            <span class="text-right label label-success">Open</span>
                                        </th>
                                    @elseif($thread -> isClosed == 0)
                                        <th class="text-right">
                                            <span class="text-right label-danger label">Closed</span>
                                        </th>
                                    @endif
                                </tr>
                            </table>
                            <div>Category: {{$thread -> category -> CategoryName}}</div>
                            <div>Posted at: {{$thread -> CreatedDate}}</div>
                        </div>
                        <div class="panel-body" style="color: black">{{$thread -> ThreadDescription}}</div>
                    </div>
                </div>
            </a>
            <br>
        @endforeach

        {{--Pagination--}}
        <nav aria-label="Page navigation" class="text-center">
            <ul class="pagination">
                {{$threads -> links()}}
            </ul>
        </nav>
        {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}

    @else
        <div>
            <h3>No Thread Currently Exist</h3>
        </div>

    @endif
@endsection