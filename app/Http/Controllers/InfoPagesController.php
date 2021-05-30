<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoPagesController extends Controller
{
    public function about()
    {
        return view('InfoPages.about');
    }

    public function feedback()
    {
        return view('InfoPages.feedback');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $fields = $request->only('title', 'comment');
        $data = json_encode($fields, JSON_UNESCAPED_UNICODE);
        file_put_contents('feedback.txt', $data);
        return view('InfoPages.feedback');
    }

    public function order()
    {
        return view('InfoPages.order');
    }

    public function orderStore(Request $request)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $fields = $request->only('title', 'phone', 'mail', 'description');
        $data = json_encode($fields, JSON_UNESCAPED_UNICODE);
        file_put_contents('order.txt', $data);
        return view('InfoPages.order');
    }


}
