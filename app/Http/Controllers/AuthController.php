<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrationForm()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user' // default role
        ]);

        return redirect()->route('login.form')
            ->with('success', 'Registration successful. You can now login.');
    }

    public function loginForm()
    {
        return view('login');
    }



    public function loginForms(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();

        // check password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid password');
        }

        // login user
        Auth::login($user);

        // redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        }

        // fallback redirect
        return redirect()->route('login')->with('error', 'Unauthorized role');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Logged out successfully');
    }
}
