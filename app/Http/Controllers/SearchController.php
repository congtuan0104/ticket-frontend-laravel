<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request): View
    {
        $keyword = $request->query('key');
        $page = (int) ($request->query('page') ?? 1);
        $pageSize = 12;
        $cate = $request->query('cate');
        $location = $request->query('location');
        $date = $request->query('date');
        $price = $request->query('price');
        // gọi api tìm kiếm sự kiện theo từ khóa

        $categories = Http::get('http://localhost:8080/api/event/eventCategory')->json();
        $cities = Http::get('http://localhost:8080/api/event/city')->json();

        return view('search', [
            'keyword' => $keyword,
            'page' => $page,
            'pageSize' => $pageSize,
            'cate' => $cate,
            'location' => $location,
            'date' => $date,
            'price' => $price,
            'categories' => $categories,
            'cities' => $cities
        ]);
    }
}
