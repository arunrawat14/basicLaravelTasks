@extends('layouts.app')

@section('title', 'Add User')

@section('style')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection
@section('content')
    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter name">
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email">
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

       

        <div>
            <button class=" mt-5 px-4 py-2 rounded-md border border-black bg-white  text-sm hover:shadow-[4px_4px_0px_0px_rgba(0,0,0)] transition duration-200 text-gray-700"   type="submit">Add Person</button>
        </div>
    </form>
@endsection
