@extends("layout.layout")
@section("content")
    <div class="card">
        <div class="card-header">
            Register
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('/registerUser')}}" enctype="multipart/form-data">
                <h3>Register Form</h3>
                {{csrf_field()}}
                <div class="form-group">
                    <label for="username">Username</label><span class="red-text">*</span>
                    <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username"
                           value="{{old('username')}}">
                    @if($errors->has('username'))
                        <span class="red-text">{{$errors->first('username')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label><span class="red-text">*</span>
                    <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email"
                           value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="red-text">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label><span class="red-text">*</span>
                    <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password">
                    @if($errors->has('password'))
                        <span class="red-text">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Must Match" id="confirmPassword" name="confirmPassword">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label><span class="red-text">*</span>
                    <input type="text" class="form-control" placeholder="Enter Phone" id="phone" name="phone"
                           value="{{ old('phone')}}">
                    @if($errors->has('phone'))
                        <span class="red-text">{{$errors->first('phone')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Address</label><span class="red-text">*</span>
                    <textarea type="text" class="form-control" rows="5" placeholder="Enter Address"
                              id="address" name="address"></textarea>
                    @if($errors->has('address'))
                        <span class="red-text">{{$errors->first('address')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="birth">Birthday</label><span class="red-text">*</span>
                    <input type="date" class="form-control" placeholder="dd-mm-yyyy" id="birthday" name="birthday"
                           value="{{old('birthday')}}">
                    @if($errors->has('birthday'))
                        <span class="red-text">{{$errors->first('birthday')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label><span class="red-text">*</span>
                    <label class="radio-inline"><input class ="rb" type="radio" id="rbMale" value="M" name="gender">Male</label>
                    <label class="radio-inline"><input class = "rb" type="radio"  id="rbFemale" value="F" name="gender">Female</label>
                    @if($errors->has('gender'))
                        <span class="red-text">{{$errors->first('gender')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label><span class="red-text">*</span>
                    <input type="file" id="photo" name="photo">
                    @if($errors->has('photo'))
                        <span class="red-text">{{$errors->first('photo')}}</span>
                    @endif
                    <img id="profilePicture"
                         src="{{Storage::url('profilePicture/default.jpg') }}"
                         alt="Profile Picture" />
                </div>

                <div class="form-check text-center">
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
    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profilePicture').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo").change(function() {
            readURL(this);
        });

        $(document).ready(function(){
            let a = '{{old('gender')}}';
            if(a !== ''){
                if(a === 'M'){
                    $('#rbMale').prop('checked','checked');
                }
                else{
                    $('#rbFemale').prop('checked','checked');
                }
            }
            let b ='{{old('address')}}';
            if(b !== ''){
                $('textarea').val(b);
            }
        });
    </script>
@endsection