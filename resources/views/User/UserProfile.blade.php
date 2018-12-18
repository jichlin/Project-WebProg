@extends("layout.layout")
@section("content")

<div class="profile row">
    <div class="col-md-4">
        <img id="profilePicture" src="{{ Storage::url($user->UserPicture)}}"  />
    </div>
    <div class="col-md-8">
        <div style="position: relative">
            <span>Username : {{$user->UserName}}</span>

            <div class="popularity" style="position: absolute; right: 0; top:0; height: 200px; width: 200px">
            @if(session('username') != $user->UserName)
                <form action="{{url('/modifyPop')}}" method="post" style="position: relative; left: 0;">
                    <h4 class="black-text" style="margin-left:15px;">Give Popularity</h4>
                    {{csrf_field()}}
                    {{method_field("PUT")}}
                    <input type="hidden" value="{{$user->UserID}}" name="id">
                    <div style="display: flex;justify-content: space-around">
                        <button class="btn btn-primary" type="submit" value="positive" name="pop">+</button>
                        <button class="btn btn-warning" type="submit" value="negative" name="pop">-</button>
                    </div>
                </form>
            @else
            <a class="btn btn-info" style="position: relative; left: 0;" href="{{url('/userform/profile/' . $user->UserID)}}">Edit</a>
            @endif
            </div>

        </div>
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
    @if(session('username') != $user->UserName)
        <form>
            <div class="row">
                <div class="form-group col">
                    <label for="message">Message</label>
                    <textarea class="form-control" rows="5"></textarea>
                </div>
            </div>
            <input type="submit" value="Send" class="btn btn-info">
        </form>
    @endif

@endsection
