<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1. Shows the Login Form (Fixes your current error)
    public function login()
    {
        return view('login');
    }

    // 2. Processes the Login Form Submission (Fixes the loginStore error)
    public function loginStore(Request $request)
    {
        $user = Demo::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('logged_in_user', $user->id);
            return "Login Successful! Welcome, " . $user->name;
        } else {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }
    }

    // 3. Processes New User Registration (Your original save user code)
    public function store(Request $request)
    {
        Demo::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'dob'      => $request->dob,
            'status'   => $request->status === 'Active' ? 1 : 0,
            'password' => bcrypt($request->password),
        ]);

        return "Data successfully Store in Database";
    }
}
