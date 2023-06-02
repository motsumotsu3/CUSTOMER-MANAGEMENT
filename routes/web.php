<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AnalysisController;

//csv 追加 ここから
use App\Http\Controllers\ExportController;
//csv 追加 ここまで


Route::get('analysis', [AnalysisController::class, 'index'])->name('analysis');

Route::resource('items', ItemController::class)
->middleware(['auth', 'verified']);

Route::resource('customers', CustomerController::class)
->middleware(['auth', 'verified']);

Route::resource('purchases', PurchaseController::class)
->middleware(['auth', 'verified']);


Route::get('/inertia-test', function () {
    return Inertia::render('InertiaTest');
    }
);

Route::get('/component-test', function () {
    return Inertia::render('ComponentTest');
    }
);


Route::get('/inertia/index', [InertiaTestController::class, 'index'])->name('inertia.index');
Route::get('/inertia/create', [InertiaTestController::class, 'create'])->name('inertia.create');
Route::post('/inertia', [InertiaTestController::class, 'store'])->name('inertia.store');
Route::get('/inertia/show/{id}', [InertiaTestController::class, 'show'])->name('inertia.show');
Route::delete('/inertia/{id}', [InertiaTestController::class, 'delete'])->name('inertia.delete');



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//csv 追加 ここから
Route::get('export',  [ExportController::class, 'index'])->name('export');
//csv 追加


//admin 追加の為 ここから
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->middleware(['auth:admins', 'verified'])->name('dashboard');

    Route::resource('items', ItemController::class)
    ->middleware(['auth:admins', 'verified']);


    
    require __DIR__.'/admin.php';
});
//admin 追加の為 ここまで


//roll　追加の為　ここから
// Route::get('/admin', 'AdminController@index')->name('admin');
//roll　追加の為　ここまで
