<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class TicketController extends Controller
{
    //
    public function store(Request $request):RedirectResponse {
        $createdEvent = $request->session()->get('createdEvent');
        if($createdEvent) {
            $eventId = $createdEvent['eventId'];
            $ticket = ([
                "eventId" => $eventId,
                "ticketName" => $request->ticketName,
                "price" => $request->price,
                "inStock" => $request->inStock,
                "description" => $request->description,
            ]);
            $res = Http::post('http://localhost:8080/api/ticket/eventTicketType', $ticket);
            if($res->successful()) {
                return redirect()->route('event.create.step.two');
            }
        }
        return redirect()->back();
    }
}
