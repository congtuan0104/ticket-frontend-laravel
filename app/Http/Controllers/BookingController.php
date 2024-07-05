<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class BookingController extends Controller
{
    public function index(): View
    {
        return view('buy-ticket', [
            'user' => session('user')
        ]);
    }
}
