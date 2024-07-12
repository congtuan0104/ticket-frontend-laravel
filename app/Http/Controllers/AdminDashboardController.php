<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class AdminDashboardController extends Controller
{
    //
    public function index(Request $request): View
    {
        return view('adminDashboard', [
        ]);
    }
}
