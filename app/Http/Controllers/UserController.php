<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $validated = $request->validated();

        $input = $request->processContactsAndAddresses($request->input());

        $user = new User($input);

        if (! empty($request->input('password'))) {
            $user->user_passwordhash = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect('/users')->with('success', "User '{$user->user_email}' has been added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $view = view('users.show', compact('user'));

        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $view = view('users.edit', compact('user'));

        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserFormRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, User $user)
    {
        if (! empty($request->input('password'))) {
            $user->user_passwordhash = Hash::make($request->input('password'));
        }

        $input = $request->processContactsAndAddresses($request->input());

        $user->update($input);

        $user->save();

        return redirect('/users')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('success', "User '{$user->user_email}' has been deleted.");
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function enable(int $id)
    {
        $user = User::find($id);

        $user->user_isenabled = true;
        $user->save();

        return redirect('/users')->with('success', "User '{$user->user_email}' has been enabled.");
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function disable(int $id)
    {
        $user = User::find($id);

        $user->user_isenabled = false;
        $user->save();

        return redirect('/users')->with('success', "User '{$user->user_email}' has been disabled.");
    }
}
