<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginForm()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials) && Auth::user()->is_admin) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        Auth::logout();
        return back()->withErrors(['email' => 'Invalid credentials or not an admin.'])->onlyInput('email');
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'webinarDate'   => Setting::get('webinar_date', 'Wed, 17 June, 2026'),
            'whatsappLink'  => Setting::get('whatsapp_link', ''),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'webinar_date'  => ['required', 'string', 'max:100'],
            'whatsapp_link' => ['required', 'url', 'max:500'],
        ]);

        Setting::set('webinar_date', $request->webinar_date);
        Setting::set('whatsapp_link', $request->whatsapp_link);

        return back()->with('success', 'Settings updated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
