<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div>
        <p style="float:right;" class="navbar-text">Current Time : <span id="dateTime"></span></p>
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href="#">dv Forum</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{url('/forum')}}">dvForum</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(!Auth::check())
                <li><a href="{{url('/login')}}"> Login</a></li>
                <li><a href="{{url('/register')}}">Register</a></li>
            @else
                <div>
                    Hello World!
                </div>
            @endif


        </ul>
    </div>
</nav>