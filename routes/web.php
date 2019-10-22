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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');

Auth::routes(['verify' => true]);

// Route::get('/email', function () {
//     $user = App\User::find(Auth::id());
//     return (new App\Notifications\VerifyCatering());
// });


// Admin
// Get All Users
Route::get('/admin/AllUsers', 'AdminController@index')->middleware('admin')->name('admin.getAllUsers');

// Edit Users
Route::get('/admin/editUser/{id}', 'AdminController@editUser')->middleware('admin')->name('editUser');
Route::post('/admin/editUser/{id}', 'AdminController@updateUser')->middleware('admin')->name('updateUser');




// Seller

// My Catering
Route::get('/mycatering', 'CateringController@cateringList')->middleware('seller')->name('MyCatering');


// Edit Catering
Route::get('/catering/edit/{id}', 'CateringController@editCatering')->middleware('seller')->name('editCatering');
Route::post('/catering/edit/{id}', 'CateringController@updateCatering')->middleware('seller')->name('updateCatering');

// Menu
Route::get('/mycatering/{id}/menus', 'CateringController@addMenus')->middleware('seller')->name('menus');
Route::get('/mycatering/{cateringId}/menu/{menuId}', 'CateringController@addMenu')->middleware('seller')->name('menu');

Route::post('/mycatering/{cateringId}/menu/{menuId}', 'CateringController@openOrClosedMenu')->middleware('seller')->name('openOrClosedMenu');

// Product
Route::get('/mycatering/{cateringId}/product/', 'CateringController@addProducts')->middleware('seller')->name('addProducts');
Route::post('/mycatering/{cateringId}/product/', 'CateringController@addProduct')->middleware('seller')->name('addProduct');
