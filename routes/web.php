<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Site\Create as SiteCreate;
use App\Http\Livewire\Site\Index as SiteIndex;
use App\Http\Livewire\Site\Edit as SiteEdit;
use App\Http\Livewire\Site\SiteBill as SiteBill;
use App\Http\Livewire\Employee\Index as EmployeeIndex;
use App\Http\Livewire\Employee\Create as EmployeeCreate;
use App\Http\Livewire\Employee\Edit as EmployeeEdit;
use App\Http\Livewire\Task\Index as TaskIndex;
use App\Http\Livewire\Task\Create as TaskCreate;
use App\Http\Livewire\Task\Edit as TaskEdit;
use App\Http\Livewire\Bill\Index as BillIndex;
use App\Http\Livewire\Bill\Create as BillCreate;
use App\Http\Livewire\Bill\MakeLedger as BillLedgerCreate;
use App\Http\Livewire\Bill\ListLedger as BillLedgerList;
use App\Http\Livewire\EmployeeTaskUnaccepted\Index as UnacceptedIndex;
use App\Http\Livewire\EmployeeTaskAccepted\Index as AcceptedIndex;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Edit as ProductEdit;

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
        Route::get('/site-bill/{id}', SiteBill::class)->name('site.site-bill');
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
        Route::get('/make-ledger/{id}', BillLedgerCreate::class)->name('bill.makeLedger');
        Route::get('/list-ledger/{id}', BillLedgerList::class)->name('bill.listLedger');
        // Route::get('/edit/{id}', TaskEdit::class)->name('task.edit');
    });
    Route::group(['prefix'=>'admin/product'], function(){\
        Route::get('/index', ProductIndex::class)->name('product.index');
        Route::get('/create', ProductCreate::class)->name('product.create');
        Route::get('/edit/{id}', ProductEdit::class)->name('product.edit');
    });
});
Route::group(['middleware' => ['auth', 'employee']], function(){
    Route::group(['prefix'=>'employee/employee-task-unaccepted'], function(){\
        Route::get('/index', UnacceptedIndex::class)->name('employee-task-unaccepted.index');
        // Route::get('/edit/{id}', TaskEdit::class)->name('task.edit');
    });
    Route::group(['prefix'=>'employee/employee-task-accepted'], function(){\
        Route::get('/index', AcceptedIndex::class)->name('employee-task-accepted.index');
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
