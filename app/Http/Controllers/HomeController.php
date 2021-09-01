<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }



    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function welcome()
    {
        $dataUrls = [
            [
                'title' => "Google",
                'url' => 'google.com',
            ],
            [
                'title' => "Yahoo",
                'url' => 'yahoo.com',
            ],
        ];

        //    dd($dataUrls);

        return view('welcome', [
            'dataUrls' => $dataUrls,
        ]);
    }


    public function getUrls(): JsonResponse
    {
        $dataUrls = [
            [
                'title' => "Google",
                'url'   => 'google.com',
            ],
            [
                'title' => "Yahoo",
                'url'   => 'yahoo.com',
            ],
        ];

        return response()->json($dataUrls);
    }
}
