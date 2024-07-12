<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class OrganizationController extends Controller
{
    //
    public function index(): View {
        $events = Http::get('http://localhost:8080/api/event/event')->json();
        return view('organization-event', compact(['events']));
    }
}
