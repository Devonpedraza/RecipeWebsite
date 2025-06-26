<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class authController extends Controller
{
    public function showRegister(){
        return view('recipes.register');
    }
    public function showLogin(){
        return view('recipes.login');
    }

    public function register (Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create($validated);

        Auth::login($user);
        
        return redirect()->route('recipes.index')->with('success', 'Registration successful!');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email'=> 'email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->route('recipes.index')->with('success', 'Login successful!');
        }
        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('recipes.index')->with('success', 'Logout successful!');
    }
}
