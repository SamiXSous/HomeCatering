<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catering;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $caterings = Catering::where('active', true)->get();

        return view('home', compact('caterings'));
    }
}
