<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Carbon\Carbon;

class AuthController extends Controller
{
    // ==========================================
    // 1. REGISTRATION LOGIC
    // ==========================================
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'register_role' => 'required|in:customer,vendor'
        ]);

        $otp = rand(100000, 999999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->register_role,
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'is_active' => false
        ]);

        // Send OTP Email
        Mail::to($user->email)->send(new OtpMail($otp));

        // Redirect to OTP Page
        return redirect()->route('auth.otp.form')->with('verify_email', $user->email);
    }

    // ==========================================
    // 2. VERIFY OTP LOGIC
    // ==========================================
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp'   => 'required|numeric'
        ]);

        $user = User::where('email', $request->email)->first();

        // OTP ar Expiry Time check kora
        if ($user->otp !== (string)$request->otp || Carbon::now()->greaterThan($user->otp_expires_at)) {
            return back()->with('error', 'Invalid or expired OTP!')->with('verify_email', $request->email);
        }

        // OTP match korle user ke active kora ar OTP muchhe dewa
        $user->update([
            'is_active' => true,
            'otp' => null,
            'otp_expires_at' => null
        ]);

        return redirect()->route('login')->with('success', 'Your account has been successfully verified! Please login.');
    }

    // ==========================================
    // 3. LOGIN LOGIC
    // ==========================================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        // User ache kina check kora
        if (!$user) {
            return back()->with('error', 'No account found with this email.');
        }

        // Account verify kora ache kina check
        if ($user->is_active == false) {
            return redirect()->route('auth.otp.form')->with('verify_email', $user->email)->with('error', 'Please verify your OTP first!');
        }

        // Remember me variable
        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('/')->with('success', 'Welcome back, ' . $user->name . '!');
        }

        return back()->with('error', 'Invalid password. Please try again.');
    }

    // ==========================================
    // 4. LOGOUT LOGIC
    // ==========================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have successfully logged out.');
    }

    // ==========================================
    // 5. FORGOT PASSWORD LOGIC
    // ==========================================
    public function forgotPasswordForm()
    {
        return view('frontend.auth.forgot-password');
    }

    public function sendResetOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $otp = rand(100000, 999999);

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10)
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));

        return redirect()->route('password.reset', ['email' => $user->email])
            ->with('success', 'Password reset OTP sent to your email.');
    }

    public function resetPasswordForm($email)
    {
        return view('frontend.auth.reset-password', compact('email'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->otp !== (string)$request->otp || Carbon::now()->greaterThan($user->otp_expires_at)) {
            return back()->with('error', 'Invalid or expired OTP! Please request a new one.');
        }

        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null,
            'otp_expires_at' => null
        ]);

        return redirect()->route('login')->with('success', 'Password has been reset successfully! You can now login.');
    }

    // ==========================================
    // 6. PROFILE EDIT LOGIC
    // ==========================================
    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Max 2MB image
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/profiles', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return back()->with('success', 'Your profile has been updated!');
    }
}
