<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::get();
        return view('user.index', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('auth.register')->with(["roles" => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->country = $request->get('country');
        $user->city = $request->get('city');
        $user->street = $request->get('street');
        $user->phone = $request->get('phone');
        $user->password = Hash::make($request->get('password'));

        $user->save();
        if ($request->get("role")) {
            $user->assignRole($request->get("role"));
        } else {
            $user->assignRole("guest");
        }
        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit')->with('user', $users);

    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->country = $request->get('country');
        $user->city = $request->get('city');
        $user->street = $request->get('street');
        $user->phone = $request->get('phone');
        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();
        $user->save();


        return redirect()->route("users.index");


    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route("home");
    }
}
