@extends("layout.layout")
@section("content")
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="{{ url('/loginUser') }}" method="post">
                {{csrf_field()}}
                @if($errors->has('match'))
                    <div>
                        <h5 class="red-text">{{$errors->first('match')}}</h5>
                    </div>
                @endif
                <div class="form-group">
                    <label for="username">E-mail</label>
                    <input type="text" class="form-control" placeholder="Enter E-mail" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                </div>
                <div class="form-check" style="margin:0 auto">
                    <input type="checkbox" id="cb" class="form-check-input" name="remember" value="remember">
                    <label for="cb" class="form-check-label">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Login</button>
            </form>
        </div>
    </div>
@endsection