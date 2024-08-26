<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required', 
                'string', 
                'min:8', 
                'confirmed',
                'regex:/[a-z]/',              // Must have at least one lowercase letter
                'regex:/[A-Z]/',              // Must have at least one uppercase letter
                'regex:/[0-9]/',              // Must have at least one number
                'regex:/[@$!%*?&]/'           // Must have at least one special character
            ],
            'role' => ['required', 'in:CS,Supervisi'],
        ], [
            'password.regex' => 'Password harus terdiri dari minimal 8 karakter, mengandung huruf besar, huruf kecil, angka, dan karakter khusus.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
