<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Catering;
use App\MenuDate;
use App\Menu;
use App\Product;
use App\ProductMenu;

class CateringController extends Controller
{
    public function __construct()
    {
        $this->middleware('seller');
    }

    public function cateringList()
    {
        $id = Auth::id();
        $caterings = Catering::where('adminId', $id)->get();
        // var_dump($catering);

        return view('catering.caterings', compact('caterings'));
    }

    public function editCatering()
    {
        $id = Auth::id();
        $catering = Catering::where('adminId', $id)->first();
        // var_dump($catering);

        return view('catering.editCatering', compact('catering'));
    }

    public function updateCatering(Request $request)
    {
        $user = Auth::user();
        $catering = Catering::where('adminId', $user->id)->first();

        // if ($request->input('role') == 1) {
        //     Catering::firstOrCreate(['admin_id' => $id]);
        // }
        // var_dump($request->file('image'));
        if ($request->file('image') != null) {
            $file = $request->file('image');
            var_dump($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time() . $catering->id . '.' . $extension;
            $file->move('uploads/catering/', $filename);
            Catering::where('adminId', $user->id)
                ->update([
                    'image' => $filename
                ]);
        }


        if ($request->input('activeCatering') == null) {
            $active = false;
        } else {
            $active = true;
        }
        if ($user->role == 2) {

            // var_dump($file);
            Catering::where('adminId', $user->id)
                ->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'active' => $active,
                    // 'image' => $filename
                ]);
        }

        return redirect('/mycatering');
    }

    public function addMenus()
    {
        $id = Auth::id();
        $catering = Catering::where('adminId', $id)->first();
        $menuDates = MenuDate::all();
        // var_dump($catering);

        return view('catering.menu.menus', compact('catering'), compact('menuDates'));
    }

    public function addMenu(Request $request)
    {
        $id = Auth::id();
        $menuDateId = $request->route('menuDateId');
        $cateringId = $request->route('cateringId');
        $catering = Catering::find($cateringId);
        $menuDate = MenuDate::find($menuDateId);
        $menu = Menu::where('DayOfTheWeekId', $menuDateId)->where('CateringId', $cateringId)->first();
        // var_dump($menu);
        $products = Product::where('cateringId', $cateringId)->get();
        $productsMenu = Product::join('product_menus', 'products.id', '=', 'product_menus.productId')->join('menus', 'product_menus.menuId', '=', 'menus.id')->get();
        // var_dump($productsMenu[0]);

        return view('catering.menu.addMenu', compact('catering', 'menuDate', 'menu', 'products', 'productsMenu'));
    }

    public function removeProductFromMenu(Request $request)
    {
        ProductMenu::where(['menuId' => $request->route('menuId'), 'productId' => $request->route('productId')])->delete();
        return back();
    }

    public function addProducts(Request $request)
    {
        $cateringId = $request->route('cateringId');
        $menuId = $request->route('menuId');
        $products = Product::where('cateringId', $cateringId)->get();

        // var_dump($menuId);
        return view('catering.product.addProduct', compact('cateringId', 'products', 'menuId'));
    }
    
    public function editProducts(Request $request)
    {
        $cateringId = $request->route('cateringId');
        $menuId = $request->route('menuId');
        $productId = $request->route('productId');
        $product = Product::where(['id' =>$productId])->first();

        // var_dump($productId,$product);
        return view('catering.product.editProduct', compact('cateringId', 'product', 'menuId'));
    }

    public function updateActiveState(Request $request)
    {
        $cateringId = $request->input('cateringId');
        $val = $request->input('active');

        $catering = Catering::find($cateringId)->first();

        if($catering->active == 0){
            Catering::findOrFail($cateringId)->update(['active' => 1]);
            $val = "Always True";
        }else{
            Catering::findOrFail($cateringId)->update(['active' => 0]);
            $val = "Could it BE";
        }

        return response()->json(['success'=> $catering->active]);
        

        
    }

    public function editProduct(Request $request)
    {
        $id = Auth::id();
        $menuDateId = $request->route('menuId');
        $cateringId = $request->route('cateringId');
        $productId = $request->input('productId');
        $catering = Catering::find($cateringId);
        $menuDate = MenuDate::find($menuDateId);
        $menu = Menu::where('DayOfTheWeekId', $menuDateId)->where('CateringId', $cateringId)->first();
        // var_dump($menu);


        if ($request->input()) {
            if ($request->file('image') != null) {
                $file = $request->file('image');
                var_dump($file);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . $catering->id . '.' . $extension;
                $file->move('uploads/catering/', $filename);
            } else {
                $filename = null;
            }

            var_dump($productId);

            Product::find($productId)->update(
                [
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'image' => $filename,
                    'cateringId' => $request->input('cateringId')
                ]
            );
        }
        return back();
    }

    public function addProduct(Request $request)
    {
        $cateringId = $request->route('cateringId');
        $catering = Catering::find($cateringId);

        if ($request->input()) {
            if ($request->file('image') != null) {
                $file = $request->file('image');
                var_dump($file);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . $catering->id . '.' . $extension;
                $file->move('uploads/catering/', $filename);
            } else {
                $filename = null;
            }

            Product::updateOrCreate(
                ['name' => $request->input('name')],
                [
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'image' => $filename,
                    'cateringId' => $request->input('cateringId')
                ]
            );
        }

        return back();
    }

    public function addProductToMenu(Request $request)
    {
        var_dump($request->route('productId'));
        ProductMenu::firstOrCreate(['menuId' => $request->route('menuId'), 'productId' => $request->route('productId')]);

        return back();
    }

    public function openOrClosedMenu(Request $request)
    {
        // var_dump($request->input('openOrClosed'));
        if ($request->input('openOrClosed') === 'on') {
            $menu = Menu::updateOrCreate([
                'CateringId' => $request->input('cateringId'),
                'DayOfTheWeekId' => $request->input('DayOfTheWeekId'),
            ], [
                'openingTime' => $request->input('openingTime'),
                'closingTime' => $request->input('closingTime')
            ]);
        }
        if ($request->input('openOrClosed') === null) {
            Menu::where([
                'CateringId' => $request->input('cateringId'),
                'DayOfTheWeekId' => $request->input('DayOfTheWeekId'),
            ])->delete();
        }

        $menuDateId = $request->route('menuId');
        $cateringId = $request->route('cateringId');
        $catering = Catering::find($cateringId);
        $menuDate = MenuDate::find($menuDateId);
        $menu = Menu::where('DayOfTheWeekId', $menuDateId)->where('CateringId', $cateringId)->first();
        $products = Product::where('cateringId', $cateringId)->get();
        $productsMenu = Product::join('product_menus', 'products.id', '=', 'product_menus.productId')->join('menus', 'product_menus.menuId', '=', 'menus.id')->get();
        // var_dump($menu);

        return view('catering.menu.addMenu', compact('catering', 'menuDate', 'menu', 'products', 'productsMenu'));
    }
}
