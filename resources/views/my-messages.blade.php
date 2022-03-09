@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="all-messages">
                @forelse($messages as $message)
                <div class="box shadow">
                    <p>{{ $message->content }}</p>
                    <div class="control">
                        <p class="time">{{ $message->created_at }}</p>
                    </div>
                </div>
                @empty
                    <div class="box shadow">
                        <p>لا يوجد رسائل حتى الان</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection


