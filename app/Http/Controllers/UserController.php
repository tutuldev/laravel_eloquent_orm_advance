<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        // $users=User::all();
        $users=User::simplePaginate(4);
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
        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required|alpha',
        ]);
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
        $users = User::findOrFail($id);
        // return $users;
        return view('viewuser',compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)//you can use 'string $id'
    {
        $users = User::findOrFail($user->id);
        return view('updateuser',compact('users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //you can use 'User $user'
    {
        $request->validate([
            'username' => 'required|alpha',
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required|alpha',
        ]);
        //update method 1
        // $user = User::find($id);
        // $user->name =$request->username;
        // $user->email =$request->useremail;
        // $user->age =$request->userage;
        // $user->city =$request->usercity;
        // $user->save();

        // update method 2 mass update
        $user =User::where('id',$id)
                        ->update([
                            'name' => $request->username,
                            'email' => $request->useremail,
                            'age' => $request->userage,
                            'city' => $request->usercity,
                        ]);

        return redirect()->route('user.index')
                        ->with('status','User Data Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // method 1
        // $users=User::find($id);
        // // $users=User::where('email','and@gmail.com');
        // $users->delete();
        // return redirect()->route('user.index')
        // ->with('status','User Data Deleted Successfully.');

        // method 2
        // User::destroy($id);
        // User::destroy(4,5);
        // User::truncate();

        // common and good method
        $users=User::find($id);
        $users->delete();
        return redirect()->route('user.index')
        ->with('status','User Data Deleted Successfully.');
    }
}
