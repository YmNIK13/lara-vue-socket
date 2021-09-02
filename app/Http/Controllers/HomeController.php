<?php

namespace App\Http\Controllers;

use App\Core\ClassA;
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
                'url'   => 'google.com',
            ],
            [
                'title' => "Yahoo",
                'url'   => 'yahoo.com',
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

        sleep(1);

        return response()->json($dataUrls);
    }


    public function dataChart(): JsonResponse
    {
        $dataUrls = [
            'labels'   => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label'           => 'Продажи',
                    'backgroundColor' => '#F26202',
                    'data'            => [15000, 5000, 10000, 30000],
                ],
            ],
        ];

        return response()->json($dataUrls);
    }

}
