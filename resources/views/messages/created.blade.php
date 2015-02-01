@extends('app')

@section('content')

<div class="alert alert-info">
    Wir haben Ihre Nachricht <a href="{{ URL::to('messages/'.$message->getKey()) }}">{{ $message->body }}</a> erhalten. Vielen Dank
</div>

@endsection
