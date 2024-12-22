<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\UserEmail;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/home');
    }

    public function showRegistrationForm()
    {
        return view('auth/signup');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
            'terms' => 'required',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'email_verification_token' => Str::random(64),
        ]);

        Mail::to($user->email)->send(new UserEmail($user));

        return redirect()->back()->with('success', 'Registration successful! Please check your email for verification.');
    }

    public function verify($token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid verification token.');
        }

        $user->email_verified_at = now();
        $user->email_verification_token = null; // Invalidate the token
        $user->save();

        return redirect()->route('login')->with('success', 'Email verified successfully! You can now log in.');
    }
}
