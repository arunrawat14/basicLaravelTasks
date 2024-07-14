@extends('layouts.app')

@section('title', 'Edit Address')

@section('content')
    <form method="POST" action="{{route('user.addresses.update', ['address' => $address->id, 'user'=> $user->id])}}">
        @csrf
        @method('PUT')
        <div>
            <label for="address">Address</label>
            <input  type="text" name="address" id="address" value="{{ $address->address }}" required>
        </div>
        <button type="submit">Update Address</button>
    </form>

    <div>
        <a href="{{ route('user.show', ['user' => $user->id]) }}">Back to user</a>
    </div>
    
@endsection
