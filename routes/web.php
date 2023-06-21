<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyUserController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/checkin', [App\Http\Controllers\CheckController::class, 'checkin']);
Route::get('/checkin_404', [App\Http\Controllers\CheckController::class, 'checkin_404']);

Route::post('/api/api_post_status_user', [App\Http\Controllers\HomeController::class, 'api_post_status_user']);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::group(['middleware' => ['UserRole:superadmin|admin']], function() {

    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

    Route::resource('/admin/MyUser', MyUserController::class);
    Route::post('/api/api_post_status_MyUser', [App\Http\Controllers\MyUserController::class, 'api_post_status_MyUser']);
    Route::get('api/del_MyUser/{id}', [App\Http\Controllers\MyUserController::class, 'del_MyUser']);
    Route::get('admin/users_search/', [App\Http\Controllers\MyUserController::class, 'users_search']);
    Route::get('admin/dealer_search/', [App\Http\Controllers\MyUserController::class, 'dealer_search']);
    Route::get('/orders_export', [App\Http\Controllers\DashboardController::class, 'orders_export'])->name('orders_export');
    Route::post('/orders_import', [App\Http\Controllers\DashboardController::class, 'orders_import'])->name('orders_import');
    Route::get('admin/import_view/', [App\Http\Controllers\MyUserController::class, 'import_view']);

});