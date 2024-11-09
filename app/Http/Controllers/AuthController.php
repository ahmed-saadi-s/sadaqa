<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
    
        return redirect('login')->with('error', 'Invalid email or password');
    }
    

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|in:male,female',
            'nationality' => 'required|string|max:255',
            'residence' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
    
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->nationality = $request->nationality;
        $user->residence = $request->residence;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        Auth::login($user);
    
        return redirect('/');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}

