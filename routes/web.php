<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBps;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome2');
// })->name('landing');

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/kms/{id}', [HomeController::class, 'indexkms'])->name('landingkms');

Route::get('/subject', [ApiBps::class, 'subject']);
Route::get('/subcat', [ApiBps::class, 'subcat']);
Route::get('/turth', [ApiBps::class, 'turth']);
Route::get('/turvar', [ApiBps::class, 'turvar']);
Route::get('/th', [ApiBps::class, 'th']);
Route::get('/unit', [ApiBps::class, 'unit']);

Route::post('/loginkms', [App\Http\Controllers\AuthController::class, 'loginkms'])->name('loginkms');

Route::name('list-data.')
    ->prefix('list-data')
    ->middleware(['auth:sanctum', 'verified'])
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


Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth:sanctum', 'verified', 'visual-data'])
    ->group(function(){
        Route::get('/loguser',[\App\Http\Controllers\UserController::class,'loguser'])
            ->name('loguser');
    });


Route::name('visual.')
    ->prefix('visual')
    ->middleware(['auth:sanctum', 'verified', 'visual-data'])
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

    Route::name('analytic.')
    ->prefix('analytic')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\AnalyticController::class, 'index'])
            ->name('index');
        Route::get('/detail', [\App\Http\Controllers\AnalyticController::class, 'detail'])
            ->name('detail');
        Route::get('/trash', [\App\Http\Controllers\AnalyticController::class, 'trash'])
        ->name('trash');
        Route::get('/create', [\App\Http\Controllers\AnalyticController::class, 'create'])
            ->name('create');
        Route::get('/edit', [\App\Http\Controllers\AnalyticController::class, 'edit'])
            ->name('edit');
        Route::post('/delete', [\App\Http\Controllers\AnalyticController::class, 'delete'])
            ->name('delete');
        Route::post('/restore', [\App\Http\Controllers\AnalyticController::class, 'restore'])
            ->name('restore');
        Route::post('/store', [\App\Http\Controllers\AnalyticController::class, 'store'])
            ->name('store');
        Route::post('/update', [\App\Http\Controllers\AnalyticController::class, 'update'])
            ->name('update');
    });

Route::name('async-req.')
    ->prefix('async-req')
    ->group(function(){
        Route::get('/get-sub-kategori',\App\Http\Controllers\AsyncRequest\SubKategori::class)
            ->name('get-sub-kategori');
        Route::get('/get-list-data',\App\Http\Controllers\AsyncRequest\ListData::class)
            ->name('get-list-data');
    });

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function (){
    return view('dashboard');
})->name('dashboard');