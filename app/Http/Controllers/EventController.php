<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    // trang chi tiết sự kiện
    public function show(string $id): View
    {
        // gọi api lấy thông tin chi tiết sự kiện

        return view('event-detail', ['id' => $id]);
    }
}
