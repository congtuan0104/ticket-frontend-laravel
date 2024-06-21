<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function search(Request $request): View
    {
        // gọi api tìm kiếm sự kiện theo từ khóa
        $keyword = $request->query('key');
        $page = (int) ($request->query('page') ?? 1);
        $pageSize = 12;

        return view('search', [
            'keyword' => $keyword,
            'page' => $page,
        ]);
    }
}
