@extends('layouts.app')

@section('style')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('title', $user->name)

@section('content')

    <div class=" text-xl  font-bold  text-gray-800 " >
        <p  class="" >{{$user->name}}</p>
        @if($user->email)
            <p>{{$user->email}}</p>
        @endif

    </div>
    
    <div class=" gap-2 ">
        <h3 class=" text-2xl mt-4  font-bold " >Addresses:-</h3>

        <div class=" flex flex-col gap-3 text-gray-600 " >

                @foreach($user->addresses as $address)
                    <div  class="flex justify-between p-2">
                        <p>{{$address->address}}</p>

                        <div class="flex gap-5" >
                            <div class="px-4 py-2 rounded-md border border-black bg-white  text-sm hover:shadow-[4px_4px_0px_0px_rgba(0,0,0)] transition duration-200 text-gray-700" >
                                <a href="{{route('user.addresses.edit', ['address' => $address->id, 'user'=> $user->id])}}">Edit Address</a>
                            </div>
                            <div>
                                <form action="{{route('user.addresses.destroy', ['address' => $address->id, 'user'=>$user->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 rounded-md border border-black bg-white  text-sm hover:shadow-[4px_4px_0px_0px_rgba(0,0,0)] transition duration-200 text-gray-700" type="submit">Delete Address</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class=" mt-5 " >
            <form method="POST" action="{{route('user.addresses.store', ['user' => $user->id])}}">
                @csrf
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">New Address</label>
                    <input type="text" name="address" id="address" placeholder="New Address" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add Address</button>
            </form>
        </div>


    
    <div class=" flex justify-between mt-8 " >
        <div class="px-4 py-2 rounded-md border border-black bg-white  text-sm hover:shadow-[4px_4px_0px_0px_rgba(0,0,0)] transition duration-200 text-gray-700" >
            <a href="{{route('user.edit', ['user'=> $user->id])}}">Edit user</a>
        </div>

        <div >
            <form action="{{route('user.destroy', ['user'=> $user->id ])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 rounded-md border border-black bg-white  text-sm hover:shadow-[4px_4px_0px_0px_rgba(0,0,0)] transition duration-200 text-gray-700"  type="submit">Delete user</button>
            </form>
        </div>
    </div>
    
    </div>
@endsection
