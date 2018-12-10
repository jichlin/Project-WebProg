@extends("layout.layout")
@section("content")
    {{--Source : https://www.w3schools.com/howto/howto_css_search_button.asp--}}
        <style>
            body {
                font-family: Arial;
            }

            * {
                box-sizing: border-box;
            }

            form.example input[type=text] {
                padding: 10px;
                font-size: 17px;
                border: 1px solid grey;
                float: left;
                width: 96%;
                background: #ffffff;
                border-radius: 5px 0px 0px 5px;
            }

            form.example button {
                float: left;
                width: 4%;
                padding: 10px;
                background: #2196F3;
                color: white;
                font-size: 17px;
                border: 1px solid grey;
                border-left: none;
                cursor: pointer;
                border-radius: 0px 5px 5px 0px;
            }

            form.example button:hover {
                background: #0b7dda;
            }

            form.example::after {
                content: "";
                clear: both;
                display: table;
            }

            div.title-custom {
                font-weight: bold;
                font-size: 18px;
            }

            div.custom_box_open{
                background: green;
                border-radius: 3px;
                width: 4%;
                padding-bottom: 0.3%;
                padding-left: 0;
                padding-right: 0;
                padding-top: 0;
                text-align: center;
                color: #ffffff;
                margin-left: 7%;
            }

            div.custom_box_close{
                background: red;
                border-radius: 3px;
                width: 4%;
                padding-bottom: 0.3%;
                padding-left: 0;
                padding-right: 0;
                padding-top: 0;
                text-align: center;
                color: #ffffff;
                margin-left: 7%;
            }

            div.col-xs-10{
                padding: 0;
            }
        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        {{--Search Bar--}}
        <form action="{{url("/search")}}" method="get" role="search" >
            <div class="input-group">
                <input type="text" class="form-control" name="searching" placeholder="Seach Forum by Titile, and Category Name" value="{{$search}}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" style="color: white; background: #2196F3">
                        <span class="glyphicon glyphicon-search fa fa-search"></span>
                    </button>
                </span>
            </div>
        </form>

        <div>
            <h4>
                Thread Search Result with '{{$search}}' Keyword(s):
            </h4>
            <br>
        </div>

    @if(count($threads) > 0)
        {{--Source : https://www.w3schools.com/howto/howto_css_search_button.asp--}}
        {{--Source : https://www.w3schools.com/bootstrap/bootstrap_panels.asp--}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        {{--Bagian menampilkan index--}}
        @foreach($threads as $thread)
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="container">
                            <div class="row">
                                <div class="title-custom col-xs-10 " >{{$thread -> ThreadName}}</div>
                                @if($thread -> isClosed == 1)
                                    <div class="col-xs-1 custom_box_open">Open</div>
                                @elseif($thread -> isClosed == 0)
                                    <div class="col-xs-1 custom_box_close">Closed</div>
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
        <nav aria-label="Page navigation example" class="text-center">
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