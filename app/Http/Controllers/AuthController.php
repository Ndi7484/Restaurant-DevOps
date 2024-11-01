<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:8|max:255|confirmed'
            ];
    
            $input = validator($request->all(), $rules)->validated();
            $input['password'] = Hash::make($input['password']);
    
            User::create($input);
    
            return redirect('/login')->with('success', 'Registration successful! Please login.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/');
        }

        return back()->with('error', 'Login failed!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile(Request $request) 
    {
        $title="Profile";
        return view('profile.index', compact('title'));
    }

    public function editProfile(Request $request)
    {   
        $title="Edit Profile";
        return view('profile.edit', compact('title'));
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'province' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string'
        ];

        $input = validator($request->all(), $rules)->validated();

        $user = Auth::user();
        $user->name = $input['name'];
        $user->phone_number = $input['phone_number'] ?? null;
        $user->address = $input['address'] ?? null;
        $user->province = $input['province'] ?? null;
        $user->city = $input['city'] ?? null;
        $user->post_code = $input['postal_code'] ?? null;
        $user->save();

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min:8|max:255|confirmed'
        ];

        $validatedData = $request->validate($rules);
        $user = Auth::user();

        if(Hash::check($validatedData['old_password'], $user->password)) {
            $user->password = Hash::make($validatedData['new_password']);
            $user->save();
            return redirect()->back()->with('success', 'Password has been changed!');
        }

        return redirect()->back()->with('error', 'Wrong Password!');

    }
}
