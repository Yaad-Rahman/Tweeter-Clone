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
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(50),
        ]);
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
            'avatar' => ['file'],
            'cover' => ['file'],
            'bio' => ['string', 'min:20', 'max: 500'], 
            'email' => ['string', 'required', 'email', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        if(request('cover')){
            $attributes['cover'] = request('cover')->store('covers');
        }
        
            
        $user->update($attributes);


        return redirect($user->path());
    }


}
