@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chat with {{ $user->name }}</h1>

        <div class="messages">
            @foreach ($messages as $message)
                <div class="message">
                    <p>{{ $message->text }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
