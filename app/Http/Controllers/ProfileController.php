<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::findOrFail(Session::get('user_id'));
        return view('profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $userId = Session::get('user_id');
        $user = User::findOrFail($userId);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'current_password' => 'nullable|required_with:new_password', 
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);
        
        // Manual check for current password if provided
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                 return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
            }
        }

        $emailChanged = $user->email !== $request->email;

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        if ($emailChanged) {
            Session::flush();
            Session::regenerateToken();
            return redirect('/login')->with('success', 'Email updated. Please login again.');
        }

        return back()->with('success', 'Profile updated successfully.');
    }
}
