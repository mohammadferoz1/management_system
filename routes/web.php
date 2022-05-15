<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Site\Create as SiteCreate;
use App\Http\Livewire\Site\Index as SiteIndex;

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
    return view('auth.login');
});
Route::group(['prefix'=>'admin/site'], function(){
    Route::get('/create', SiteCreate::class)->name('site.create');
    Route::get('/index', SiteIndex::class)->name('site.index');
    //Route::get('/edit/{id}', Edit::class)->name('department.edit');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
