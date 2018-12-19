@extends("layout.layout")
@section("content")
    <div class="card-group flex-column">
        @if(count($messages) > 0)
            @foreach($messages as $message)
                <div class="card ml-2">
                    <div class="card-header d-flex">
                        <div>
                            <div>
                                <span>{{$message->UserName}}</span>
                            </div>
                            <div>
                                <span>{{$message->SentDate}}</span>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <form action="{{url('/deleteMessage/'.$message->MessageId)}}" method="post">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        {{$message->Message}}
                    </div>
                </div>
            @endforeach
            {{$messages->links()}}
        @else
            <div class="text-center">
                <h1>No Message</h1>
            </div>
        @endif
    </div>
@endsection