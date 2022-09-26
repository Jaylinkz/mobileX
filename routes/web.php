<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\managerController;
use App\Http\Controllers\Admin\salesPersonController;
use App\Http\Controllers\Admin\taskController;
use App\Http\Controllers\Admin\transferController;
use App\Http\Controllers\Admin\storeController;
use App\Http\Controllers\Admin\exchangeRateController;
use App\Http\Controllers\Admin\manageProductsController;
use App\Http\Controllers\manager\manageProductsController as pd;
use App\Http\Controllers\Admin\customerController;
use App\Http\Controllers\manageSalesController;
use App\Http\Controllers\Auth\authenticationController;
use App\Http\Controllers\manager\salesPersonController as sp;

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
Route::get('loginScreen', function () {
    return view('admin.auth.login');
});
Route::get('managerLogin', function () {
    return view('admin.managers.login');
});
Route::get('workersLogin', function () {
    return view('admin.workers.login');
});



Route::get('logout',[App\Http\Controllers\Auth\authenticationController::class,'logout']);
Route::view('admin.login', 'loginScreen');
Route::post('adminLogin',[App\Http\Controllers\Auth\authenticationController::class,'adminLogin']);
// Route::post('adminLogin',[App\Http\Controllers\Auth\authenticationController::class,'adminLogin']);
Route::post('workerLogin',[App\Http\Controllers\Auth\authenticationController::class,'workerLogin'])->name('workerLogin');
Route::POST('managerLogs',[App\Http\Controllers\Auth\authenticationController::class,'managerLogin']);
Route::get('sales/{id}',[App\Http\Controllers\salesController::class,'index']);
Route::post('saveSale',[App\Http\Controllers\salesController::class,'sales'])->name('saveSale');
// Route::get('/cart', 'App \ Http \ Controllers \ manageSalesController@index')->name("cart.index");
// Route::get('/cart/delete', 'App \ Http \ Controllers \ manageSalesController@delete')->name("cart.delete");
// Route::middleware(['admin','manager','worker'])->group(function () {
       Route::post('setRate',[App\Http\Controllers\Admin\exchangeRateController::class,'setRate']);
       Route::post('rate',[App\Http\Controllers\Admin\exchangeRateController::class,'updateRate'])->name('updateRated');
       //manageProducts
       Route::resource('manageProducts',manageProductsController::class);
       //managerController
       Route::resource('manager',managerController::class);
       //storeController
       Route::resource('store',storeController::class);
       //admin dashboard
       Route::get('/adminDashboard', function () {
        return view('admin.dashboard');
    });



// Route::group(['middleware'=>'admin','manager'],function () {
    route::get('taskView/{id}',[App\Http\Controllers\Admin\taskController::class,'index'])->name('taskView');
    route::post('assignTask',[App\Http\Controllers\Admin\taskController::class,'assignTask'])->name('assignTask');
    Route::resource('salesPerson', salesPersonController::class);
    Route::resource('category', categoryController::class);
    Route::resource('managerManageProducts', pd::class);
    Route::post('transfer',[App\Http\Controllers\Admin\transferController::class,'transferGoods'])->name('transfer');
    Route::get('show/{id}',[App\Http\Controllers\Admin\transferController::class,'show']);
    Route::get('barcode',[App\Http\Controllers\Admin\transferController::class,'barcode'])->name('barcode');//->middleware('admin');
    Route::resource('customer', customerController::class);

    Route::resource('managerSalesPerson', sp::class);
    Route::get('/managerDashboard', function () {
    return view('admin.managers.dashboard');
});
// });






//customerController


// Route::post('checkout',[App\Http\Controllers\manageSalesController::class,'checkout']);

Route::get('/cart',[App\Http\Controllers\manageSalesController::class,'index'])->name("cart.index");
Route::get('/cart/delete', [App\Http\Controllers\manageSalesController::class,'delete'])->name("cart.delete");

//task controller



// Route::group(['all'],function () {

    Route::resource('category', categoryController::class);
    Route::get('index',[App\Http\Controllers\manageSalesController::class,'indexView']);
    Route::get('workerIndex',[App\Http\Controllers\manageSalesController::class,'workerView'])->name('workerIndex');//->middleware(['auth','worker']);
    Route::post('/',[App\Http\Controllers\Sales\cartController::class,'addToCart'])->name("cart.add");
    Route::post('checkout',[App\Http\Controllers\Sales\cartController::class,'checkout'])->name("checkout");
    Route::get('/cartView',[App\Http\Controllers\Sales\cartController::class,'cartView'])->name("cartView");
    Route::post('search',[App\Http\Controllers\manageSalesController::class,'search'])->name('search');
    Route::get('/workersDashboard', function () {
        return view('admin.workers.dashboard');
    });

    Route::get('stats',[App\Http\Controllers\salesTrackingController::class,'dailyAdmin'])->name('stats');
    Route::get('managerStats',[App\Http\Controllers\salesTrackingController::class,'dailyManager'])->name('managerStats');
    Route::get('dailyView',[App\Http\Controllers\salesTrackingController::class,'dailyView'])->name('dailyView');
    Route::get('creditView',[App\Http\Controllers\salesTrackingController::class,'creditSales'])->name('creditView');

    Route::get('deptPaid/{id}',[App\Http\Controllers\salesTrackingController::class,'deptPaid'])->name('deptPaid');


