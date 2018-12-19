@extends("layout.layout")
@section("content")

    <div class="card">
        <div class="card-header">
            Profile
        </div>
        <div class="row card-body">
            <div class="col-md-4">
                @if($user->UserPicture != '')
                    <img id="profilePicture" src="{{ Storage::url($user->UserPicture)}}"/>
                @else
                    <img src="{{Storage::url('profilePicture/default.jpg')}}">
                @endif
            </div>
            <div class="col-md-4">
                <div>
                    <span class="text-dark">Username : {{$user->UserName}}</span>
                </div>
                <div>
            <span>
                Popularity :
                <span><div class="badge badge-success">+</div> {{$user->UserPositivePop}}</span>
            <span> <div class="badge badge-danger">-</div> {{$user->UserNegativePop}}</span>
            </span>
                </div>

                <div>Email : {{$user->UserEmail}}</div>
                <div>Phone : {{$user->UserPhone}}</div>
                <div>Birthday : {{\Carbon\Carbon::parse($user->UserDOB)->format('d/m/Y')}}</div>
                <div>Gender :
                    @if($user->UserGender == 'M')
                        Male
                    @else
                        Female
                    @endif
                </div>
                <div>
                    Address: {{$user->UserAddress}}
                </div>
            </div>
            <div class="col-md-3 ml-auto">
                @if(session('username') != $user->UserName)
                    <div class="card">
                        <div class="card-header">
                            Popularity
                        </div>
                        <div class="card-body">
                            <form action="{{url('/modifyPop')}}" method="post">
                                <h4 class="black-text text-center">Give Popularity</h4>
                                {{csrf_field()}}
                                {{method_field("PUT")}}
                                <input type="hidden" value="{{$user->UserID}}" name="id">
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit" value="positive" name="pop">+</button>
                                    <button class="btn btn-danger" type="submit" value="negative" name="pop">-</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <a class="btn btn-info" href="{{url('/userform/profile/' . $user->UserID)}}">Edit</a>
                @endif
            </div>

        </div>
        @if(session('username') != $user->UserName)
            <form action="{{url('/sendMessage')}}" method="POST">
                <div class="row">
                    {{csrf_field()}}
                    <input type="hidden" value="{{session('userid')}}" name="sender">
                    <input type="hidden" value="{{$user->UserID}}" name="receiver">
                    <input type="hidden" value="{{$user->UserName}}" name="username">
                    <div class="form-group col">
                        <label for="message">Message</label>
                        <textarea class="form-control" rows="5" name="message"></textarea>
                        @if($errors->has('message'))
                            <div>
                                <span class="red-text">{{$errors->first('message')}}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <input type="submit" value="Send" class="btn btn-info">
            </form>
        @endif
    </div>

@endsection
