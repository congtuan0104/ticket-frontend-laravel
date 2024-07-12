<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class OrganizationController extends Controller
{
    //
    public function index(Request $request): View
    {
        if (!empty($request->session()->get('user'))) {
            $user = $request->session()->get('user');
            if ($user['role'] != 'organize') {
                return redirect()->route('home');
            }
        }
        $events = Http::get('http://localhost:8080/api/event/event')->json();
        return view('organization-event', compact(['events']));
    }
}
