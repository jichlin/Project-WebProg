@extends('layout.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            List of Forum
        </div>
        <div class="card-body">
            <table class="table" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Owner</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($threads as $thread)
                    <tr>
                        <td>{{$thread->ThreadName}}</td>
                        <td>{{$thread->CategoryName}}</td>
                        <td>{{$thread->UserName}}</td>
                        <td>{{$thread->ThreadDescription}}</td>
                        <td>@if($thread->isClosed == 0) Closed
                            @else Open
                            @endif
                        </td>
                        <td class="d-flex justify-content-around">
                            @if($thread->isClosed == 0)
                                <button class="btn btn-danger disabled">Close</button>
                            @else
                                <form action="{{url('/closeForum/master/'.$thread->ThreadID)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button type="submit" class="btn btn-danger">Close</button>
                                </form>
                            @endif
                            <form action="{{url('/deleteForum/'.$thread->ThreadID)}}" method="post">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection