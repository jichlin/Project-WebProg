@extends('layout.layout')
@section('content')
    <div class="card">
        <div class="card-header" style="display: flex;justify-content: space-between">
            <span>User Data</span>
            <a class="btn btn-success" href="{{url('/userform/master/')}}">Add New User</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table" width="100%">
                <thead class="">
                    <tr>
                        <td>Photo</td>
                        <td>Name</td>
                        <td>Role</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>Birthday</td>
                        <td>Gender</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                        <td><img class="masterPicture" src="{{($user->UserPicture != '') ? Storage::url($user->UserPicture) : Storage::url('profilePicture/default.jpg')  }}"></td>
                        <td>{{$user->UserName}}</td>
                        <td>
                            @if($user->RolesID == 1)
                                Admin
                            @else
                                User
                            @endif
                        </td>
                        <td>{{$user->UserEmail}}</td>
                        <td>{{$user->UserPhone}}</td>
                        <td>{{$user->UserAddress}}</td>
                        <td>{{\Carbon\Carbon::parse($user->UserDOB)->format('d/m/Y')}}</td>
                        <td>
                            @if($user->UserGender == 'M')
                                Male
                            @else
                                Female
                            @endif
                        </td>
                        <td style="display: inline-flex;">
                            <a class="btn btn-secondary" href="{{url('/userform/master/'.$user->UserID)}}">
                                Edit
                            </a>
                            <form action="{{url('/deleteUser/'.$user->UserID)}}" method="post">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <button type="submit" class="btn btn-warning">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <nav>
    {{$users->links()}}
    </nav>
@endsection