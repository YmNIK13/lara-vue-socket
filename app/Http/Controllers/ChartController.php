<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChartController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.chart');
    }


    public function dataChart(): JsonResponse
    {
        $dataUrls = [
            'labels'   => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label'           => 'Продажи',
                    'backgroundColor' => '#F26202',
                    'data'            => [3500, 5000, 7000, 4000],
                ],
                [
                    'label'           => 'Прошлый год',
                    'backgroundColor' => '#1762a2',
                    'data'            => [15000, 7500, 10000, 3000],
                ],
            ],
        ];

        return response()->json($dataUrls);
    }

    public function dataChartRandom(): JsonResponse
    {
        $dataUrls = [
            'labels'   => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label'           => 'Золото',
                    'backgroundColor' => '#F26202',
                    'data'            => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000),],
                ],
                [
                    'label'           => 'Серебро',
                    'backgroundColor' => '#1762a2',
                    'data'            => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000),],
                ],
            ],
        ];

        return response()->json($dataUrls);
    }

    public function dataChartPie(): JsonResponse
    {
        $dataUrls = [
            'labels'   => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label'           => 'Продажи',
                    'backgroundColor' => ['#F26202', '#1762a2', '#026202', '#F26fa2',],
                    'data'            => [1500, 5000, 4000, 3000],
                ],
            ],
        ];

        return response()->json($dataUrls);
    }


    public function newEvent(Request $request): JsonResponse
    {
        $results = [
            'labels'   => ['март', 'апрель', 'май', 'июнь'],
            'datasets' => [
                [
                    'label'           => 'Прошлый год',
                    'backgroundColor' => '#1762a2',
                    'data'            => [15000, 7500, 10000, 3000],
                ],
            ],
        ];

        if ($request->has('label')) {
            $results['labels'][] = $request->input('label');
            $results['datasets'][0]['data'][] = (integer) $request->input('sale') ?? 0;

            if ($request->has('is_realtime')) {
                if (filter_var($request->input('is_realtime'), FILTER_VALIDATE_BOOLEAN)) {
                    // вызываем событие
                    event(new NewEvent($results));
                }
            }
        }

        return response()->json($results);
    }

}
