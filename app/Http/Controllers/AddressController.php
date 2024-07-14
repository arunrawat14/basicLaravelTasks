<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\AddressRequest;
use App\Models\User;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request, User $user)
    {
        try {
            $user->addresses()->create($request->validated());
            return redirect()->route('user.show', ['user'=> $user])->with('success','addresss added successfully' );
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Address $address)
    {
        try {
            return view('user.addresses.edit', ['address'=> $address, 'user'=> $user]);
        } catch(\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request,User $user, Address $address)
    {
        $address->update($request->validated());
        return redirect()->route('user.show', ['user'=> $user])->with('success', 'address updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Address $address)
    {
        try {
            $address->delete();
            return redirect()->route('user.show', ['user'=> $user])->with('success', 'address deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
