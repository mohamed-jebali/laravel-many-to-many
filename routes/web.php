<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\DashBoardController as AdminDashBoardController;
use App\Http\Controllers\Guest\GuestController;

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


Auth::routes();
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/projects/trashed', [AdminProjectController::class, 'softDelete'])->name('projects.trashed');
    Route::post('/projects/restore/{project}', [AdminProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('/projects/delete/{project}', [AdminProjectController::class, 'hardDelete'])->name('projects.hardDelete');
    Route::get('/', [ AdminDashboardController::class , 'home'])->name('home');
    Route::resource('/projects',  AdminProjectController::class);
    Route::resource('/types',  AdminTypeController::class);
});
Route::get('/', [App\Http\Controllers\Guest\GuestController::class, 'home'])->name('guest.home');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::get('home', [App\Http\Controllers\Admin\DashBoardController::class, 'index'])->name('admin.home');
// });

// require __DIR__.'/auth.php';