@extends('layouts.app')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('message.store', $user->id) }}">
        @csrf
        <div class="form-group text-center">
            <img src="{{ asset($user->image) }}" alt="{{ $user->name }}" style="border-radius: 50%" title="{{ $user->name }}">
        </div>
        <div class="form-group text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="form-group text-center">
            <label for="exampleFormControlTextarea1">Enter your  Message <3 </label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="7" style="width: 50%; margin: auto"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 550px">Send</button>
    </form>
@endsection
