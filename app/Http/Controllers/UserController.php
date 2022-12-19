<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (!Gate::allows('edit-user', $user)) {
            abort(403);
        }

        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (!Gate::allows('update-user', $user)) {
            abort(403);
        }

        $validated = $request->validated();
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function showPasswordFrom() {
        return view('user.changePasswordForm');
    }

    public function changePassword(Request $request) {

        // check wether the current password is correct
        if (!Hash::check($request->currentPassword, Auth::user()->password)) {
            //return redirect()->back()->with("currentPassword", "Invalid current password");
            throw ValidationException::withMessages(['currentPassword' => 'Invalid current password']);
        }

        // validated new password
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        // change user's password to new password
        $user = User::where('id', '=', Auth::user()->id)->first();
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        return redirect('/dashboard');
    }
}
