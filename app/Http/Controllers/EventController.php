<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{

    public function index(): View
    {
        // gọi api lấy danh sách sự kiện
        $events = Http::get('http://localhost:8080/api/event/event')->json();
        $categories = Http::get('http://localhost:8080/api/event/eventCategory')->json();
        $cities = Http::get('http://localhost:8080/api/event/city')->json();

        return view('home', [
            'events' => $events,
            'categories' => $categories,
            'cities' => $cities
        ]);
    }


    // trang chi tiết sự kiện
    public function show(string $id): View
    {
        // gọi api lấy thông tin chi tiết sự kiện
        $event = Http::get('http://localhost:8080/api/event/event/' . $id)->json();
        $organization = Http::get('http://localhost:8080/api/organization/' . $event['organizationId'])->json();
        $cate = Http::get('http://localhost:8080/api/event/eventCategory/' . $event['eventCategoryId'])->json();
        $tickets = Http::get('localhost:8080/api/ticket/eventTicketType/eventId/' . $event['eventId'])->json();
        $evaluates = Http::get('localhost:8080/api/event/eventEvaluate/search?eventId=' . $event['eventId'])->json();
        // dd($tickets);
        return view('event-detail', [
            'event' => $event,
            'organization' => $organization,
            'cate' => $cate,
            'tickets' => $tickets,
            'evaluates' => $evaluates
        ]);
    }
}
