<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catering;
use App\Product;
use App\MenuDate;
use Carbon\Carbon;

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

    public function cateringMenu(Request $request)
    {

        $menuDates = MenuDate::all();
        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];
        $cateringId = $request->route('id');
        $catering = Catering::find($cateringId);


        $allProducts = Product::join('product_menus', 'products.id', '=', 'product_menus.productId')
            ->join('menus', 'product_menus.menuId', '=', 'menus.id')
            ->join('menu_dates', 'menus.DayOfTheWeekId', '=', 'menu_dates.id')
            ->get();

        $products = [];
        foreach ($allProducts as $item) {
            if ($item->DayOfTheWeek === $weekday && $item->cateringId == $cateringId) {
                array_push($products, $item);
            }
        }

        $dayOfTheWeek =+1;

        // var_dump($weekday, $products);

        return view('catering.menu.displayMenu', compact('products', 'menuDates', 'catering', 'dayOfTheWeek'));
    }
    public function cateringMenuDay(Request $request)
    {

        $menuDates = MenuDate::all();
        $dayOfTheWeek = $request->route('dayOfTheWeekId');
        $cateringId = $request->route('id');
        $catering = Catering::find($cateringId);


        $allProducts = Product::join('product_menus', 'products.id', '=', 'product_menus.productId')
            ->join('menus', 'product_menus.menuId', '=', 'menus.id')
            ->join('menu_dates', 'menus.DayOfTheWeekId', '=', 'menu_dates.id')
            ->get();

        $products = [];
        foreach ($allProducts as $item) {
            // var_dump($item);
            if ($item->DayOfTheWeekId == $dayOfTheWeek && $item->cateringId == $cateringId) {
                array_push($products, $item);
            }
        }

        // var_dump($weekdayId, $products);

        return view('catering.menu.displayMenu', compact('products', 'menuDates', 'catering', 'dayOfTheWeek'));
    }
}
