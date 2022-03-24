<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBps;

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
    return view('welcome2');
});

Route::get('/subject', [ApiBps::class, 'subject']);
Route::get('/subcat', [ApiBps::class, 'subcat']);
Route::get('/turth', [ApiBps::class, 'turth']);
Route::get('/turvar', [ApiBps::class, 'turvar']);
Route::get('/th', [ApiBps::class, 'th']);
Route::get('/unit', [ApiBps::class, 'unit']);

Route::name('list-data.')
    ->prefix('list-data')
    ->group(function(){
        Route::get('/',[\App\Http\Controllers\DataController::class,'index'])
            ->name('index');

        Route::get('/create',[\App\Http\Controllers\DataController::class,'create'])
            ->name('create');
        Route::get('/edit',[\App\Http\Controllers\DataController::class,'edit'])
            ->name('edit');

        Route::post('/store',[\App\Http\Controllers\DataController::class,'store'])
            ->name('store');
        Route::post('/update',[\App\Http\Controllers\DataController::class,'update'])
            ->name('update');

        Route::get('/{id}',[\App\Http\Controllers\DataController::class,'index_kat'])
            ->name('index_kategori');
    });


Route::name('visual.')
    ->prefix('visual')
    ->group(function(){
        Route::get('/',[\App\Http\Controllers\VisualController::class,'index'])
            ->name('index');
        Route::get('/create',[\App\Http\Controllers\VisualController::class,'create'])
            ->name('create');
        Route::get('/edit',[\App\Http\Controllers\VisualController::class,'edit'])
            ->name('edit');

        Route::post('/store',[\App\Http\Controllers\VisualController::class,'store'])
            ->name('store');
        Route::post('/update',[\App\Http\Controllers\VisualController::class,'update'])
            ->name('update');
    });
    
Route::name('async-req.')
    ->prefix('async-req')
    ->group(function(){
        Route::get('/get-sub-kategori',\App\Http\Controllers\AsyncRequest\SubKategori::class)
            ->name('get-sub-kategori');
    });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
