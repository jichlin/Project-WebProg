@extends("layout.layout")

@section("content")
    @if(count($threadList) > 0)
        <div>
            <h3>No Thread Currently Exist</h3>
        </div>
    @else
        <div class="panel-group">
        @foreach($threadList as $thread)
                <div class="panel panel-default">
                    <div class="panel-body">Panel Content</div>
                </div>
        @endforeach
        </div>
    @endif
@endsection