<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Site\Create as SiteCreate;
use App\Http\Livewire\Site\Index as SiteIndex;
use App\Http\Livewire\Site\Edit as SiteEdit;
use App\Http\Livewire\Employee\Index as EmployeeIndex;
use App\Http\Livewire\Employee\Create as EmployeeCreate;
use App\Http\Livewire\Employee\Edit as EmployeeEdit;
use App\Http\Livewire\Task\Index as TaskIndex;
use App\Http\Livewire\Task\Create as TaskCreate;
use App\Http\Livewire\Task\Edit as TaskEdit;
use App\Http\Livewire\Bill\Index as BillIndex;
use App\Http\Livewire\Bill\Create as BillCreate;

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
Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::group(['prefix'=>'admin/site'], function(){
        Route::get('/create', SiteCreate::class)->name('site.create');
        Route::get('/index', SiteIndex::class)->name('site.index');
        Route::get('/edit/{id}', SiteEdit::class)->name('site.edit');
    });
    Route::group(['prefix'=>'admin/employee'], function(){\
        Route::get('/index', EmployeeIndex::class)->name('employee.index');
        Route::get('/create', EmployeeCreate::class)->name('employee.create');
        Route::get('/edit/{id}', EmployeeEdit::class)->name('employee.edit');
    });
    Route::group(['prefix'=>'admin/task'], function(){\
        Route::get('/index', TaskIndex::class)->name('task.index');
        Route::get('/create', TaskCreate::class)->name('task.create');
        Route::get('/edit/{id}', TaskEdit::class)->name('task.edit');
    });
    Route::group(['prefix'=>'admin/bill'], function(){\
        Route::get('/index', BillIndex::class)->name('bill.index');
        Route::get('/create', BillCreate::class)->name('bill.create');
        // Route::get('/edit/{id}', TaskEdit::class)->name('task.edit');
    });
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
