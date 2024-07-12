<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    public function index(string $id)
    {
        if (!session('user')) {
            return Redirect::route('login.create');
        }
        $event = Http::get('http://localhost:8080/api/event/event/' . $id)->json();
        $tickets = Http::get('localhost:8080/api/ticket/eventTicketType/eventId/' . $id)->json();

        return view('buy-ticket', [
            'event' => $event,
            'tickets' => $tickets,
            'user' => session('user')
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
        $data['userId'] = session('user')['userId'];
        $data['status'] = 'PENDING';
        $data['paymentMethod'] = 'CASH';
        $data['paymentStatus'] = 'PENDING';
        $data['paymentDate'] = date('Y-m-d H:i:s');
        $data['createdDate'] = date('Y-m-d H:i:s');
        $data['updatedDate'] = date('Y-m-d H:i:s');

        $orderReq = [];
        $orderReq['timeOrder'] = date('Y-m-d H:i:s');
        $orderReq['totalAmount'] = $data['total'];
        $orderReq['totalDiscount'] = 0;
        $orderReq['status'] = 'PENDING';

        $response = Http::post('http://localhost:8080/api/ticket/ticketOrder', $orderReq);

        if ($response->status() == 200) {
            return Redirect::route('payment-result', ['status' => 'success']);
        }

        return Redirect::route('payment-result', ['status' => 'fail']);
    }
}
