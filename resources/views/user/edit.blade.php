@extends('layouts.app')

@section('title', 'Edit user')

@section('style')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{route('user.update', ['user'=>$user->id])}}">
        @csrf
            @method('put')
            <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter name">

                @error('name')
                    <p class="error-message">{{$message}}</p>
                @enderror

            </div>

            <div>
            <label for="email"> Enter email</label>
                <input type="text" id="email" name="email" placeholder="Enter email">
                @error('email')
                    <p class="error-message" >{{$message}}</p>
                @enderror
            </div>

            <div>
                <button class="px-4 py-2 rounded-md border border-black bg-white  text-sm hover:shadow-[4px_4px_0px_0px_rgba(0,0,0)] transition duration-200 text-gray-700"   type="submit" > Edit user</button>
            </div>
    </form>
@endsection