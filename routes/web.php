<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberLoginController;
use App\Http\Controllers\MemberUserController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserMemberController;
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

Route::get('/menu', [HomeController::class, 'menu'])->name('home');

// 勉強用なので、 membersからusersの認証を変更できるような作りにする
Route::get('/member/{member_dir}/login', [MemberLoginController::class, 'login'])->name('member.login');
Route::post('/member/{member_dir}/login', [MemberLoginController::class, 'authenticate'])->name('member.authenticate');
Route::get('/member/logout', [MemberLoginController::class, 'logout'])->name('member.logout');
Route::group(['prefix' => 'member/{member_dir}', 'as' => 'member.', 'middleware' => 'auth:member'], function () {
    Route::get('/', [MemberUserController::class, 'top'])->name('top');
    Route::resources([
        'users' => MemberUserController::class,
    ]);
});

Route::get('/user/login', [UserLoginController::class, 'login'])->name('user.login');
Route::post('/user/login', [UserLoginController::class, 'authenticate'])->name('user.auth');
Route::get('/user/logout', [UserLoginController::class, 'logout'])->name('user.logout');
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth:user'], function() {
	Route::get('/', [UserMemberController::class, 'top'])->name('top');
	Route::resources([
		'members' => UserMemberController::class,
	]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
