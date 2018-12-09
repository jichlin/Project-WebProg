@extends("layout.layout")
@section("content")

<div class="profile">
    <div>
        <img id="profilePicture" src="{{ Storage::url($user->UserPicture)}}"  />
    </div>
    <div class="userDetails">
        <div style="float:left">
            <span>Username : {{$user->UserName}}</span>
        </div>
        <div style="float: right;margin-left: 50px">
            <a class="btn btn-info" href="{{url('/userform/profile/' . $user->UserID)}}">Edit</a>
        </div>
        <div style="clear: both"></div>
        <div>
            <span>
                Popularity :
                <span class="popularity positive"><span style="font-size: 18px;">+</span> {{$user->UserPositivePop}}</span>
                <span class="popularity negative"> <span style="font-size: 18px;">-</span> {{$user->UserNegativePop}}</span>
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
</div>
@endsection