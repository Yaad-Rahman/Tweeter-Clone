<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit (User $user)
    {
        $this->authorize('edit', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' =>['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user),],
            'email' => ['string', 'required', 'email', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

        $password = Hash::make($attributes['password']);
            
        $user->update([
            "name" => $attributes['name'],
            "email" => $attributes['email'],
            "password" => $password,
        ]);

        return "done";
    }


}
