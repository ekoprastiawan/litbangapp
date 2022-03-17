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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
