<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully');
    }
}
