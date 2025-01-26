<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users=User::all();
        return view("home",compact('users'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adduser');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        // create data method 1 -->>
        // $user = new User;
        // $user->name =$request->username;
        // $user->email =$request->useremail;
        // $user->age =$request->userage;
        // $user->city =$request->usercity;
        // $user->save();
        // return redirect()->route('user.index');

        // create data mehtod 2 --->
        User::create([
            'name' => $request->username,
            'email' => $request->useremail,
            'age' => $request->userage,
            'city' => $request->usercity,
        ]);

        return redirect()->route('user.index')
                        ->with('status','New User Added Successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        // return $users;
        return view('viewuser',compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('updateuser');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
