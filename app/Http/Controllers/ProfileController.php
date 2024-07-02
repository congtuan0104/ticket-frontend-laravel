<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // if (!session('user'))
        //     return Redirect::route('login');

        $organize = null;

        if (session('user')['role'] == 'organize') {
            $res = Http::get('http://localhost:8080/api/organization/find', [
                'userId' => session('user')['id'],
            ]);
            $organize = $res->json();
        }

        // dd($organize);

        return view('profile.edit', [
            'user' => $request->user(),
            'organize' => $organize,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // get all the data from the form
        $req = $request->all();

        $newUser = [
            'name' => $req['name'],
            'email' => $req['email'],
            'phoneNumber' => $req['phoneNumber'],
            'address' => $req['address'],
            'avatar' => session('user')['avatar'],
            'role' => session('user')['role'],
        ];

        dd($newUser);

        // // update user api
        // $updateUser = Http::put('http://localhost:8080/api/user/' + $req['userId'], $newUser);

        // if user is organizer
        if (session('user')['role'] == 'organize') {
            $newOrganize = [
                'description' => $req['description'],
                'userId' => $req['userId'],
            ];
            dd($newOrganize);

            // update organizer api
            $updateOrganize = Http::put('http://localhost:8080/api/organization/' + $req['organizeId'], $newOrganize);
        }

        return Redirect::to('/profile')->with('status', 'profile-updated');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $req = $request->all();
        dd($req);
        $oldPassword = $req['oldPassword'];
        $newPassword = $req['newPassword'];
        $confirmPassword = $req['confirmPassword'];

        // check
        if ($newPassword != $confirmPassword) {
            return back()->withErrors(['message' => 'Mật khẩu không khớp']);
        }

        // update password api
        $updatePassword = Http::put('http://localhost:8080/api/auth/changePassword' + $req['userId'], [
            'oldPassword' => $oldPassword,
            'newPassword' => $newPassword,
        ]);

        return Redirect::to('/profile')->with('status', 'password-update-success');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
