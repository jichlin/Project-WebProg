<nav class="navbar navbar-expand-sm navbar-dark bg-dark py-sm-1">
    <div class="ml-auto">
        <span class="white-text">Current Time : </span> <span class="white-text" id="dateTime">Initializing...</span>
    </div>
</nav>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark py-sm-1">
    <a class="navbar-brand" href="{{url('/forum')}}">div Forum</a>
    <div class="navbar-collapse collapse justify-content-between">
        <ul class="navbar-nav">
            @if(Auth::check())
                @if(session('userroles') == '1')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span style="color:#007bff">Master</span>
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item white-text" href="{{url('/master/user')}}">User</a>
                            <a class="dropdown-item white-text" href="{{url('/master/category')}}">Category</a>
                            <a class="dropdown-item white-text" href="{{url('/master/forum')}}">Thread</a>
                        </div>
                    </li>
                @endif
                    <li class="nav-item nav-link"><a href="{{url('/myforum')}}">My Forum</a></li>
            @endif
        </ul>

        <ul class="navbar nav mr-2">
            @if(Auth::check())
                <img class="navbarPicture text-center" src="{{Storage::url(session('image'))}}"/>
                <li class="nav-item dropdown-menu-left">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownUser" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                    <span class="white-text caret">{{session('username')}}</span>
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="dropdownUser">
                        <a class="dropdown-item white-text" href="{{url('/profile/'.session('username'))}}">Profile</a>
                        <a class="dropdown-item white-text" href="{{url('/inbox')}}">Inbox</a>
                        <a class="dropdown-item white-text" href="{{url('/logout')}}">Logout</a>
                    </div>
                </li>
            @else
                <li class="nav-item nav-link"><a href="{{url('/login')}}"> Login</a></li>
                <li class="nav-item nav-link"><a href="{{url('/register')}}">Register</a></li>
            @endif
        </ul>
    </div>

</nav>