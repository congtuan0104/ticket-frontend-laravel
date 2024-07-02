<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

        return view('search', [
            'keyword' => $keyword,
            'page' => $page,

        ]);
    }
}
