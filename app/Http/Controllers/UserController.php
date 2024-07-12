<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    //Call API to get User List
    public function user(Request $request): View
    {
    
        $users = Http::get('http://localhost:8080/api/users/getAll')->json();

        return view('user', [
        
            'users' => $users
        ]);
    }
}
