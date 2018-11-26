@extends("layout.layout")
@section("content")
    <div>
        <form action="{{ url('/a') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>
            <div class="form-check" style="margin:0 auto">
                <input type="checkbox" id="cb" class="form-check-input" name="remember">
                <label for="cb" class="form-check-label">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection