@extends("layout.layout")
@section("content")
    <div class="card">
        <div class="card-header">
            <span>User Data</span>
        </div>
        <div class="card-body">
            <div>
                @foreach($errors as $error)
                    <div>{{$error}}</div>
                @endforeach

                <form method="POST" action="{{url('/'.$action)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if($user->UserID != 0)
                        {{method_field("PUT")}}
                    @endif
                    <input type="hidden" value="{{$user->UserID}}" name="id">
                    <input type="hidden" value="{{$from}}" name="from">
                    <div class="form-group">
                        <label for="username">Name</label><span class="red-text">*</span>
                        <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username"
                               value="{{ ($user->UserID != 0 && old('username') == '') ? $user->UserName : old('username')}}">
                        @if($errors->has('username'))
                            <span class="red-text">{{$errors->first('username')}}</span>
                        @endif
                    </div>

                    @if($from == 'master')
                        <div class="form-group">
                            <label for="roles">Role</label><span class="red-text">*</span>
                            <select class="form-control" name="role" id="roleselectbox">
                                @foreach($roles as $role)
                                    <option value="{{$role->RolesID}}">{{$role->RolesName}}</option >
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <span class="red-text">{{$errors->first('roles')}}</span>
                            @endif
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email">Email</label><span class="red-text">*</span>
                        <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email"
                               value="{{ ($user->UserID != 0 && old('email') == '') ? $user->UserEmail :  old('email') }}">
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
                               value="{{($user->UserID != 0) ? $user->UserPhone :  old('phone')}}">
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
                               value="{{($user->UserID != 0 && old('birthday') == '') ? $user->UserDOB : old('birthday')}}" >
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
                             src="{{($user->UserPicture != '') ? Storage::url($user->UserPicture) : Storage::url('profilePicture/default.jpg') }}"
                             alt="Profile Picture" />
                    </div>
                    @if($user->UserID != 0)
                        <button type="submit" class="btn btn-primary">Update</button>
                    @else
                        <button type="submit" class="btn btn-primary">Add</button>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profilePicture').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo").change(function() {
            readURL(this);
        });

        $(document).ready(function(){
            var a = '{{ ($user->UserID != 0 && old('gender') == '') ? $user->UserGender : old('gender') }}'
            if(a != ''){
                if(a == 'M'){
                    $('#rbMale').prop('checked','checked');
                }
                else{
                    $('#rbFemale').prop('checked','checked');
                }
            }
            var b ='{{($user->UserID != 0 && old('address') == '') ? $user->UserAddress : old('address')}}'
            if(b != ''){
                $('textarea').val(b);
            }

            var c ='{{($user->UserID != 0 && old('role') == '') ? $user->RolesID : old('role')}}'
            if(c != 0){
                $('#roleselectbox').val(c);
            }
        });
    </script>
@endsection