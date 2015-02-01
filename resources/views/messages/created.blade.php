@extends('app')

@section('content')

<div class="alert alert-info">
    We have received your message: <a href="{{ URL::to('messages/'.$message->getKey()) }}">{{ $message->body }}</a>. Thank you.
</div>

@endsection
