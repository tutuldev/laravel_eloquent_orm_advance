<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users=User::all();
        // return $users;

        // $users = User::find(2);
        // $users = User::find(2,['name','email']);
        // $users = User::find([2,4],['name','email']);
        // $users = User::count();
        // $users = User::min('age');
        // $users = User::max('age');
        // $users = User::sum('age');
        // return $users;
        // $users = User::where('city',"Austin")->get();

        // multiple where method 1
        // $users = User::where('city',"Austin")
        //                 ->where('age','>',20)->get();

        // multiple where method 2
        // $users = User::where([
        //     ['city',"Austin"],
        //     ['age','>',20]
        //   ])->get();

        // or where method
        // $users = User::where('city',"Austin")
        //                 ->orWhere('age','>',20)
        //                 ->get();

        // $users = User::whereCity("Austin")
        //             ->whereAge(25)
        //             // ->select('name','email')
        //             ->select('name','email as Use Email')
        //             ->get();
        //             return $users;


        // $users = User::whereCity("Austin")
        // ->whereAge(25)
        // // ->select('name','email')
        // ->select('name','email as Use Email')
        // // ->toSql();
        // // ->toRawSql();
        // // ->dd();
        // ->ddRawSql();
        // return $users;

        // $users = User::whereCity("Austin")
        // ->first();
        // return $users;

        // $users = User::where('age','<>',20)
        // ->get();
        // return $users;

        // $users = User::whereNot('age',20)
        // ->get();
        // return $users;

        // $users = User::whereBetween('age',[20,30])
        // ->get();
        // return $users;

        // $users = User::whereNotBetween('age',[20,25])
        // ->get();

        // $users = User::whereIn('city',['Austin','San Jose'])
        // ->get();

        $users = User::whereNotIn('city',['Austin','San Jose'])
        ->get();

        // foreach($users as $user){
        //     echo $user->name  . "<br>";
        // }
        // return view("welcome",['data'=>$users]);
        return view("welcome",compact('users'));


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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
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
