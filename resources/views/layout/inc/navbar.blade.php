<nav class="navbar navbar-expand-sm navbar-dark bg-dark py-sm-1">
    <div class="ml-auto">
        <span class="white-text">Current Time : </span> <span class="white-text" id="dateTime">Initializing...</span>
    </div>
</nav>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark py-sm-1">
    <a class="navbar-brand" href="#">div Forum</a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item nav-link"><a class="white-text" href="{{url('/forum')}}">dvForum</a></li>
            @if(Auth::check())
                @if(session('userroles') == '1')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="white-text">Master</span>
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item white-text" href="{{url('/master/user')}}">User</a>
                            <a class="dropdown-item white-text" href="{{url('/master/category')}}">Category</a>
                            <a class="dropdown-item white-text" href="#">Thread</a>
                        </div>
                    </li>
                @endif
                <li class="nav-item nav-link"><a href="#" class="white-text">User Forum</a></li>
            @endif
        </ul>

        <ul class="navbar nav">
            @if(Auth::check())
                <img class="navbarPicture text-center" src="{{Storage::url(session('image'))}}"/>
                <li class="nav-item nav-link">
                    <span class="text-center white-text">{{session('username')}}</span>
                </li>
                <li class="nav-item dropdown-menu-left">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownUser" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
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