<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {

            return view('news.index', [
                'newsList' => News::all()
        ]);

    }

    public function show(int $id)
    {
        return view('news.show', ['id' => $id]);
    }

    public function categories()
    {
        return view('news.categories', ['categoriesList' => $this->categoriesList]);
    }

    public function categoriesShow(string $id)
    {
        return view('news.categoriesShow', ['id' => $id], ['categoriesList' => $this->categoriesList]);
    }

}
