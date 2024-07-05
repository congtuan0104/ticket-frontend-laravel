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
        $res = Http::get('http://localhost:8080/api/event/event');

        $data = $res->json();

        $category = Http::get('http://localhost:8080/api/event/eventCategory')->json();

        return view('home', [
            'data' => $data,
            'category' => $category
        ]);
    }


    // trang chi tiết sự kiện
    public function show(string $id): View
    {
        // gọi api lấy thông tin chi tiết sự kiện
        $base = Http::get('http://localhost:8080/api/event/event/' . $id)->json();

        return view('event-detail', [
            'base' => $base
        ]);
    }
}
