<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $newsList = [
        'News-1',
        'News-2',
        'News-3',
        'News-4',
        'News-5'
    ];
    protected $categoriesList = [
        'Cat-1' => [
            'News-1',
            'News-2',
            'News-3',
            'News-4',
            'News-5'
        ],
        'Cat-2' => [
            'News-21',
            'News-22',
            'News-23',
            'News-24',
            'News-25'
        ],
        'Cat-3' => [
            'News-31',
            'News-32',
            'News-33',
            'News-34',
            'News-35'
        ],
        'Cat-4' => [
            'News-41',
            'News-42',
            'News-43',
            'News-44',
            'News-45'
        ],
        'Cat-5' => [
            'News-51',
            'News-52',
            'News-53',
            'News-54',
            'News-55'
        ]
    ];
}
