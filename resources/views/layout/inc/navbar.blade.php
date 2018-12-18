<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">div Forum</a>
    <div class="navbar-collapse collapse justify-content-between">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item nav-link"><a href="{{url('/forum')}}">dvForum</a></li>
            @if(Auth::check())
                @if(session('userroles') == '1')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Master
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item white-text" href="{{url('/master/user')}}">User</a>
                            <a class="dropdown-item white-text" href="{{url('/master/category')}}">Category</a>
                            <a class="dropdown-item white-text" href="#">Thread</a>
                        </div>
                    </li>
                @endif
            <li class="nav-item nav-link"><a href="#">User Forum</a></li>
            @endif
        </ul>

        <ul class="navbar nav">
        @if(Auth::check())
            <li class="nav-item nav-link"> <img class="navbarPicture" src="{{Storage::url(session('image'))}}"/> <a  href="{{url('/profile/'.session('username'))}}">{{session('username')}}</a></li>
            <li class="nav-item nav-link"><a href="{{url('logout')}}">Logout</a></li>
        @else
            <li class="nav-item nav-link"><a href="{{url('/login')}}"> Login</a></li>
            <li class="nav-item nav-link"><a href="{{url('/register')}}">Register</a></li>
        @endif
        </ul>
    </div>
    <span class="navbar-text">Current Time : <span id="dateTime"></span></span>

</nav>