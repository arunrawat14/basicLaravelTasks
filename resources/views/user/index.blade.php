@extends('layouts.app')

@section('title', 'The List Of users')

@section('content')

<div class="mb-4">
    <a class="font-medium text-gray-700 underline decoration-pink-500 hover:text-pink-500" href="{{route('user.create')}}">Add User!</a>
</div>

<div class="bg-white shadow overflow-hidden sm:rounded-lg max-h-[calc(100vh-8rem) mx-auto p-4">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">User List</h3>
    </div>
    <div class="border-t border-gray-200">
        <dl>
            @if(count($users))
                @foreach ($users as $user)
                    <div class="bg-gray-50 px-4 py-5 sm:px-6 flex justify-between items-center">
                        <div>
                            <a class="text-indigo-600 hover:text-indigo-900 text-sm font-medium" href="{{route('user.show', ['user'=> $user->id])}}">{{$user->name}}</a>
                        </div>
                        <div>
                            <p class="text-sm text-gray-900">{{$user->email}}</p>
                        </div>
                    </div>
                @endforeach
            @else 
                <div class="bg-gray-50 px-4 py-5 sm:px-6">
                    <p class="text-sm text-gray-500">There are no Users!</p>
                </div>
            @endif
        </dl>
    </div>
</div>

@endsection
