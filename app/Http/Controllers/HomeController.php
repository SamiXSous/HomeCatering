<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
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
        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];
        $weekDay = Carbon::now()->dayOfWeek;
        // $dayOfTheWeek = $weekMap[$weekDay];

        $dayOfTheWeek = $weekDay+1;

        $caterings = Catering::where('active', true)
        // ->join('menus', 'caterings.id', '=', 'menus.CateringId')
        ->get();

        return view('home', compact('caterings', 'dayOfTheWeek'));
    }

    public function cateringMenu(Request $request)
    {
        $userId = Auth::id();
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
        $weekDay = Carbon::now()->dayOfWeek;
        $dayOfTheWeek = $weekMap[$weekDay];
        $cateringId = $request->route('id');
        $catering = Catering::find($cateringId);
        $cart = Cart::where('userId', $userId)
        ->where('date', Carbon::today())
        ->join('cart_products', 'carts.id', '=', 'cart_products.cartId')
        ->join('products', 'cart_products.productId', '=', 'products.id')
        ->get();

        $dayOfTheWeek = $weekDay+1;
        
        $todaysDate = Carbon::today('Europe/Amsterdam');


        $allProducts = Product::join('product_menus', 'products.id', '=', 'product_menus.productId')
            ->join('menus', 'product_menus.menuId', '=', 'menus.id')
            ->join('menu_dates', 'menus.DayOfTheWeekId', '=', 'menu_dates.id')
            ->get();

        $products = [];
        foreach ($allProducts as $item) {
            if ($item->id === $dayOfTheWeek && $item->cateringId == $cateringId) {
                array_push($products, $item);
            }
        }

        $totalCart = 0;

        // var_dump($cart);

        return view('catering.menu.displayMenu', compact('products', 'menuDates', 'catering', 'dayOfTheWeek', 'todaysDate', 'cart', 'totalCart'));
    }

    public function cateringMenuDay(Request $request)
    {
        $userId = Auth::id();
        $menuDates = MenuDate::all();
        $dayOfTheWeek = $request->route('dayOfTheWeekId');
        $cateringId = $request->route('id');
        $catering = Catering::find($cateringId);

        
        $weekDay = Carbon::now()->dayOfWeek+1;
        $dateDifference = $dayOfTheWeek - $weekDay;
        
        $todaysDate = Carbon::today()->addDays($dateDifference);
        if($dateDifference < 0){
            $todaysDate = Carbon::today()->addDays($dateDifference)->addWeeks(1);
        }

        $allProducts = Product::
            join('product_menus', 'products.id', '=', 'product_menus.productId')
            ->join('menus', 'product_menus.menuId', '=', 'menus.id')
            ->join('menu_dates', 'menus.DayOfTheWeekId', '=', 'menu_dates.id')
            ->get();

        $cart = Cart::where('userId', $userId)
            ->where('date', $todaysDate)
            ->join('cart_products', 'carts.id', '=', 'cart_products.cartId')
            ->join('products', 'cart_products.productId', '=', 'products.id')
            ->get();

        $products = [];
        foreach ($allProducts as $item) {
            // var_dump($item);
            if ($item->DayOfTheWeekId == $dayOfTheWeek && $item->cateringId == $cateringId) {
                array_push($products, $item);
            }
        }

        $totalCart = 0;
        // var_dump($dateDifference);

        return view('catering.menu.displayMenu', compact('products', 'menuDates', 'catering', 'dayOfTheWeek', 'todaysDate', 'cart', 'totalCart'));
    }

    public function searchCatering(Request $request)
    {
        // var_dump();
        $search = $request->get('searchBar');
        $caterings = Catering::where('active', true)
        ->where('name', 'LIKE', '%'.$search.'%')
        ->orWhere('description', 'LIKE', '%'.$search.'%')
        // ->join('menus', 'caterings.id', '=', 'menus.CateringId')
        ->get();

        return view('home', compact('caterings', 'search'));
        
    }
}
