<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;

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
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');

Route::get('menu', function () {
    return view('menu.index');
});
Route::group([
    'prefix' => 'member',
     'as' => 'member.',
     'middleware' => 'auth',
], function () {
    Route::get('top', [MemberController::class, 'top']);
    Route::resources([
        'users' => UserController::class,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
