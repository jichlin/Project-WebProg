@extends('layout.layout')
@section('content')
    <h2>My Forum</h2>
    <div class="card-deck flex-column align-items-stretch">
        @if(count($threads) > 0)

            @foreach($threads as $thread)
            <div class="card m-2">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h5><a href="{{url("forum/". $thread -> ThreadID)}}">{{$thread->ThreadName}}</a></h5>
                            <div>
                                Status :
                                @if($thread->isClosed == 0)
                                    <span class="badge badge-danger">Closed</span>
                                @else
                                    <span class="badge badge-success">Open</span>
                                @endif
                            </div>
                        </div>
                        @if($thread->isClosed == 1)
                        <div class="form-inline ml-auto">
                                <a class="btn btn-warning mr-2"
                                   href="{{url('/forum/edit/'.$thread->ThreadID)}}">Edit</a>
                                <form action="{{url('/closeForum/myforum/' . $thread->ThreadID)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field("PUT")}}
                                    <button class="btn btn-danger" type="submit">Close</button>
                                </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    {{$thread->ThreadDescription}}
                </div>
            </div>
        @endforeach
        @else
            <h2>You Have Not Posted Anything</h2>
        @endif

    </div>
    {{$threads->links()}}

@endsection