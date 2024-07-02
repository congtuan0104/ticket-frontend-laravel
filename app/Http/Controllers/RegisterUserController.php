<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;



class RegisterUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (!$request->name || !$request->email || !$request->phoneNumber || !$request->password || !$request->confirmPassword || !$request->role)
            return back()->withErrors(['message' => 'Vui lòng điền đầy đủ thông tin']);

        if (!$request->hasFile('avatar'))
            return back()->withErrors(['message' => 'Vui lòng chọn ảnh đại diện']);

        if (strlen($request->password) < 8)
            return back()->withErrors(['message' => 'Mật khẩu phải có ít nhất 8 ký tự']);

        if ($request->password != $request->confirmPassword)
            return back()->withErrors(['message' => 'Mật khẩu không khớp']);

        $avatarFile = $request->file('avatar');
        // dd(file_get_contents($avatarFile->getRealPath()));

        $uploadRes = Http::attach('file', file_get_contents($avatarFile->getRealPath()), $avatarFile->getClientOriginalName())
            ->post('http://localhost:8080/api/upload');


        $fileUrl = $uploadRes->json()['fileUrl'];

        $user = ([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'password' => $request->password,
            'role' => $request->role,
            'avatar' => $fileUrl,
        ]);

        $res = Http::post('http://localhost:8080/api/auth/register', $user);

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
    }
}
