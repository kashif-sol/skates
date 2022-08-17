<?php

use App\Http\Controllers\SettingController;
use App\Http\Controllers\SqftController;
use App\Http\Controllers\TabsController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\Sqft;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Websie;

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
    // $settings=Setting::all();                                                                                                                                                        
    $data = Sqft::all();
    return view('welcome',compact('data'));
})->middleware(['verify.shopify'])->name('home');

Route::get('dashbaord', function () {
    $settings=Setting::all();

    return view('dashboard',compact('settings'));
})->name('dashboard');


Route::get('main', function () {
    $settings=Setting::all();
    $data = Sqft::all();

    return view('welcome',compact('settings','data'));
})->name('main');

// Route::post('store-form', [SettingController::class, 'store']);
Route::post('store-form', [SettingController::class, 'store'])->name('store-form');

Route::get('sqfts',[SqftController::class,'index'])->name('sqfts');
Route::post('store-sqft', [SqftController::class, 'store'])->name('store-sqft');
Route::get('sqfts.edit/{id}',[SqftController::class,'edit'])->name('sqfts.edit');
Route::post('sqfts/{id}',[SqftController::class,'update'])->name('sqfts.update');
Route::delete('/sqft/{id}', [SqftController::class,'destroy']) ->name('sqfts.destroy');
Route::delete('/sqft/{id}', [SqftController::class,'destroy']) ->name('sqfts.destroy');
Route::get('skaters',[SqftController::class,'skaters'])->name('skaters');
// Route::post('save_plan_description/{id}', [SqftController::class,'save_description',])->name('save_plan_description');
// Route::post('save_plan_description/{id}', [SqftController::class,'save_description',])->name('save_plan_description');
Route::post('submitform',[SqftController::class,'skater_store'])->name('submitform');
Route::post('submitforms',[SqftController::class,'skater'])->name('submitforms');

Route::delete('/skater/{id}', [SqftController::class,'destroySkater']) ->name('skater.destroy');
// Route::get('email',function(){
//     Mail::to('69e6230a18-92a241@inbox.mailtrap.io')->send(new WelcomeMail());
//     return new WelcomeMail();
// });
Route::get('email',[Websie::class,'index']);

Route::get('/get-email', [Websie::class, 'email']);
Route::get('tabs',[TabsController::class,'index']);
Route::post('tab1',[TabsController::class,'storet1'])->name('tab1.store');
Route::post('tab2',[TabsController::class,'storet2'])->name('tab2.store');
Route::post('tab3',[TabsController::class,'storet3'])->name('tab3.store');
Route::get('result',[TabsController::class,'result']);
Route::post('tabstore',[TabsController::class,'save'])->name('tab.store');
Route::post('update-tab', [TabsController::class, 'update']);
Route::get('quotes',[SqftController::class,'quotes']);