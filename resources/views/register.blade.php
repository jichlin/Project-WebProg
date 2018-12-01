@extends("layout.layout")
@section("content")
    <div>
        <form method="POST" action="{{url('/registerUser')}}" enctype="multipart/form-data">
            <h3>Register Form</h3>
            {{csrf_field()}}
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username"
                       value="{{Request::get('username')}}">
                @if($errors->has('username'))
                    <span class="red-text">{{$errors->first('username')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" value="{{Request::get('email')}}">
                @if($errors->has('email'))
                    <span class="red-text">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password">
                @if($errors->has('password'))
                    <span class="red-text">{{$errors->first('password')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" id="confirmPassword" name="confirmPassword">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" placeholder="Enter Phone" id="phone" name="phone" value="{{Request::get('phone')}}">
                @if($errors->has('phone'))
                    <span class="red-text">{{$errors->first('phone')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea type="text" class="form-control" rows="5" placeholder="Enter Address" id="address" name="address">
                </textarea>
                @if($errors->has('address'))
                    <span class="red-text">{{$errors->first('address')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="birth">Birthday</label>
                <input type="date" class="form-control" placeholder="dd-mm-yyyy" id="birthday" name="birthday" >
                @if($errors->has('birthday'))
                    <span class="red-text">{{$errors->first('birthday')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
               <label class="radio-inline"><input type="radio" id="rbMale" value="M" name="gender">Male</label>
                <label class="radio-inline"><input type="radio"  id="rbFemale" value="F" name="gender">Female</label>
                @if($errors->has('gender'))
                    <span class="red-text">{{$errors->first('gender')}}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo">
                @if($errors->has('photo'))
                    <span class="red-text">{{$errors->first('photo')}}</span>
                @endif
            </div>

            <div class="form-group text-center">
                <label for="agree" class="checkbox-inline">
                    <input type="checkbox" id="agree" value="yes" name="agree">I Agree to The Terms and Conditions
                </label>
                @if($errors->has('agree'))
                    <span class="red-text">{{$errors->first('agree')}}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection

<script>
    $(document).ready(function(){
        $('textarea').val({{Request::get('address')}})
    });
</script>
