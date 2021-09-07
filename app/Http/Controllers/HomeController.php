<?php

namespace App\Http\Controllers;

use App\Core\ClassA;
use App\Events\NewEvent;
use App\Events\NewMessage;
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
        return view('welcome');
    }

}
