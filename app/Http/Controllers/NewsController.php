<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', ['newsList' => $this->newsList]);
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
