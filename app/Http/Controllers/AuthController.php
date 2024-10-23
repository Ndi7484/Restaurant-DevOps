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
        $rules = [
            'name' => 'required|string',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'province' => 'nullable|string',
            'city' => 'nullable|string',
            'post_code' => 'nullable|string'
        ];

        $input = validator($request->all(), $rules)->validated();

        $user = Auth::user();
        $user->name = $input['name'];
        $user->phone_number = $input['phone_number'];
        $user->address = $input['address'];
        $user->province = $input['province'];
        $user->city = $input['city'];
        $user->post_code = $input['post_code'];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
