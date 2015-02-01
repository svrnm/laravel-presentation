@extends('app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            # {{ $message->id }} ({{ $message->created_at->diffForHumans() }})
        </div>
        <div class="panel-body">
<p>
    {{ $message->body }}
</p>
        </div>
    </div>



@endsection
