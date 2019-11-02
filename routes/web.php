<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Role;

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');
Route::post('/home', 'HomeController@searchCatering')->middleware('verified')->name('search');

Route::get('/catering/{id}/menu', 'HomeController@cateringMenu')->middleware('verified')->name('cateringMenu');
Route::get('/catering/{id}/menu/{dayOfTheWeekId}', 'HomeController@cateringMenuDay')->middleware('verified')->name('cateringMenuDay');

// Cart
// Add to cart
Route::get('/catering/{cateringId}/cartProduct/{cartProductId}/date/{date}', 'CartController@addProductToCart')->middleware('verified')->name('addProductToCart');
// Remove from cart
Route::post('/catering/{cateringId}/cartProduct/remove/', 'CartController@removeProductFromCart')->middleware('verified')->name('removeProductFromCart');
// Update Product Amount In Cart
Route::post('/catering/{cateringId}/cartProduct/update/', 'CartController@updateProductAmount')->middleware('verified')->name('updateProductAmount');




// Route::get('/email', function () {
//     $user = App\User::find(Auth::id());
//     return (new App\Notifications\VerifyCatering());
// });


// Admin
// Get All Users
Route::get('/admin/AllUsers', 'AdminController@index')->middleware('verified')->middleware('admin')->name('admin.getAllUsers');

// Edit Users
Route::get('/admin/editUser/{id}', 'AdminController@editUser')->middleware('verified')->middleware('admin')->name('editUser');
Route::post('/admin/editUser/{id}', 'AdminController@updateUser')->middleware('verified')->middleware('admin')->name('updateUser');




// Seller

// My Catering
Route::get('/mycatering', 'CateringController@cateringList')->middleware('verified')->middleware('seller')->name('MyCatering');

// My Catering :: Menu
Route::get('/mycatering/{id}/menus', 'CateringController@addMenus')->middleware('verified')->middleware('seller')->name('menus');
Route::get('/mycatering/{cateringId}/menu/{menuDateId}', 'CateringController@addMenu')->middleware('verified')->middleware('seller')->name('menu');

Route::post('/mycatering/{cateringId}/menu/{menuId}', 'CateringController@openOrClosedMenu')->middleware('verified')->middleware('seller')->name('openOrClosedMenu');


// Edit Catering
Route::get('/catering/edit/{id}', 'CateringController@editCatering')->middleware('verified')->middleware('seller')->name('editCatering');
Route::post('/catering/edit/{id}', 'CateringController@updateCatering')->middleware('verified')->middleware('seller')->name('updateCatering');
Route::post('/catering/edit/{id}/activeOrInactive', 'CateringController@activeOrInactiveCatering')->middleware('verified')->middleware('seller')->name('activeOrInactiveCatering');


// Product
Route::get('/mycatering/{cateringId}/product/', 'CateringController@addProducts')->middleware('verified')->middleware('seller')->name('addProducts');
Route::post('/mycatering/{cateringId}/product/', 'CateringController@addProduct')->middleware('verified')->middleware('seller')->name('addProduct');

// Add Product To Menu
Route::get('/mycatering/{cateringId}/menu/{menuId}/product/{productId}/menuDateId/{menuDateId}', 'CateringController@addProductToMenu')->middleware('verified')->middleware('seller')->name('addProductToMenu');
Route::post('/mycatering/{cateringId}/menu/{menuId}/product/{productId}', 'CateringController@removeProductFromMenu')->middleware('verified')->middleware('seller')->name('removeProductFromMenu');
