<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserTicketController extends Controller
{
    public function index(): View
    {
        if (!session('user'))
            return Redirect::route('login');

        $tickets = null;

        return view('user-ticket', [
            'tickets' => $tickets,
        ]);
    }

    public function detail($id): View
    {
        $ticket = null;

        return view('ticket-detail', [
            'ticket' => $ticket,
        ]);
    }
}
