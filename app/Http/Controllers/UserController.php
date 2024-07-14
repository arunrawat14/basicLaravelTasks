<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();
            return view('user.index', compact('users'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $user = User::create($request->validated());
            return redirect()->route('user.show', ['user'=> $user->id] )->with('success', 'user added successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            return view('user.show', compact('user'));
        } catch(\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    { 
        try {
            $user->update($request->validated());
            return redirect()->route('user.show', ['user'=> $user->id] )->with('success', 'user updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }
       
    /**
     * Remove the specified resource from storage.
     */

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'user deleted successfully');
        } catch(\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
       
    }
}
