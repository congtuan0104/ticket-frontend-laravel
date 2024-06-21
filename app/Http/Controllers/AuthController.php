<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $email = $request->email;
        $password = $request->password;

        $res = Http::post('http://localhost:8080/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);

        if ($res->successful()) {
            $data = $res->json();
            $user = $data['user'];
            $token = $data['accessToken'];
            Session::put('access_token', $token);
            Session::put('user', $user);

            if ($user['role'] == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }

            return back()->withErrors(['message' => $res->json()['message']]);
        } else {
            return back()->withErrors(['message' => $res->json()['message']]);
        }

        // return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Session::forget('access_token');
        Session::forget('user');
        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('/');
    }
}
