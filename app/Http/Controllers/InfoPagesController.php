<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class InfoPagesController extends Controller
{
    public function about()
    {

        return view('InfoPages.about');
    }

    /**
     * @return Application|Factory|View
     */
    public function feedback()
    {
        $feedback = Feedback::all();
        return view('InfoPages.feedback', [
            'feedback' => $feedback
        ]);

    }


    public function store(\App\Http\Requests\Feedback $request, Feedback $feedback)
    {

        $fields = $request->only('name', 'order');

        $feedback = $feedback->fill($fields)->save();
        if ($feedback) {
            return view('InfoPages.feedback');
        }
        return back();

    }

    public function order()
    {
        return view('InfoPages.order');
    }

    public function orderStore(\App\Http\Requests\Order $request, Order $order)
    {

        $fields = $request->only('name', 'phone', 'email', 'order');

        $order = $order->fill($fields)->save();
        if ($order) {
            return view('InfoPages.order');
        }
        return back();

    }


}
