<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div>
        <p style="float:right;" class="navbar-text">Current Time : <span id="dateTime"></span></p>
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href="#">div Forum</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{url('/forum')}}">dvForum</a></li>
            @if(Auth::check())
                <li><a>User Forum</a></li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(!Auth::check())
                <li><a href="{{url('/login')}}"> Login</a></li>
                <li><a href="{{url('/register')}}">Register</a></li>
            @else
                <li><a>Profile Hello, {{session('username')}} </a></li>
                <li><a href="{{url('logout')}}">Logout</a></li>
            @endif


        </ul>
    </div>
</nav>