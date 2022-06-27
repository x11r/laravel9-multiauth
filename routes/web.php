<?php

use App\Http\Controllers\MemberLoginController;
use App\Http\Controllers\UserLoginController;
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

// 勉強用なので、 membersからusersの認証を変更できるような作りにする
Route::get('/member-login', [MemberLoginController::class, 'login'])->name('member.login');
Route::post('member-login', [MemberLoginController::class, 'auth'])->name('member.auth');
Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => 'auth:member'], function () {
    Route::get('/', [MemberController::class, 'top'])->name('top');
    Route::resources([
        'users' => UserController::class,
    ]);
});

Route::get('user-login', [UserLoginController::class, 'login'])->name('user.login');
Route::post('user-login', [UserLoginController::class, 'auth'])->name('user.auth');
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function() {
	Route::get('/', [UserController::class, 'top'])->name('top');
	Route::resources([
		'members' => MemberController::class,
	]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
