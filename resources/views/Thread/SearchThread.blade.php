@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/howto/howto_css_search_button.asp--}}

        {{--Search Bar--}}
        <form action="{{url("/forum/search")}}" method="get" role="search" >
            <div class="input-group">
                <input type="text" class="form-control" name="searching" placeholder="Seach Forum by Titile, and Category Name" value="{{$search}}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" style="color: white; background: #2196F3">
                        <span class="glyphicon glyphicon-search fa fa-search"></span>
                    </button>
                </span>
            </div>
        </form>
        {{--https://justlaravel.com/search-functionality-laravel/ || untuk search bar--}}

        <div>
            <h4>
                Thread Search Result with '<b>{{$search}}</b>' Keyword(s):
            </h4>
            <br>
        </div>

    @if(count($threads) > 0)
        {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        {{--Bagian menampilkan index--}}
        @foreach($threads as $thread)
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
                        <div>Posted at: {{$thread -> CreatedDate}}</div>
                    </div>
                    <div class="panel-body">{{$thread -> ThreadDescription}}</div>
                </div>
            </div>
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