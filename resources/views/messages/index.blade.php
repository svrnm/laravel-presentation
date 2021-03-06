@extends('app')

@section('content')

    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Text</th>
        <th>Created at</th>
        </thead>
        @forelse($messages as $message)
            <tr>
                <td>{{ $message->id }}</td>
                <td>{{ $message->body }}</td>
                <td>{{ $message->created_at }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">
                    No messages.
                </td>
            </tr>
        @endforelse
    </table>


@endsection
