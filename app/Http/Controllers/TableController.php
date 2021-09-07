<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;


class TableController extends Controller
{
    private const dataUrls = [
        [
            'title' => "Google",
            'url' => 'google.com',
        ],
        [
            'title' => "Yahoo",
            'url' => 'yahoo.com',
        ],
    ];

    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.table', [
            'dataUrls' => static::dataUrls,
        ]);
    }


    public function getUrls(): JsonResponse
    {
        sleep(1);

        return response()->json(static::dataUrls);
    }
}
