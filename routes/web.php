<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogupController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PermissionRoleController;
use App\Http\Controllers\Admin\PermissionRouteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

//for authentication page routes
Route::group(['middleware' => 'guest'], function () {
    //for login page routes
    Route::get('/', [LoginController::class, 'index'])->name('in');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    //for signup page routes
    Route::get('/create-account', [LogupController::class, 'index'])->name('up');
    Route::post('/logup', [LogupController::class, 'logup'])->name('logup');
});

//for dashboard page routes
Route::group(['prefix' => '/admin', 'middleware' => 'is.authed'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/logout', [HomeController::class, 'exit'])->name('logout');
    Route::get('/error-404', [HomeController::class, 'error'])->name('error.404');
});

//for admin pages routes (for CRUD operations)
Route::group(['prefix' => '/admin', 'middleware' => ['is.authed', 'accessable']], function () {
    Route::resource('/modules', ModuleController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/permission-roles', PermissionRoleController::class);
    Route::resource('/permission-routes', PermissionRouteController::class);
    Route::resource('/users', UserController::class);
});
