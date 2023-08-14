<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/users', [AdminController::class, 'view_users'])->name('admin.users');
    Route::get('/admin/dashboard/users/trash', [AdminController::class, 'trash'])->name('admin.trash');
    Route::get('/admin/dashboard/users/{id}/restore', [AdminController::class, 'restore'])->name('admin.restore');
    Route::get('/admin/dashboard/users/{id}/forcedelete', [AdminController::class, 'forcedelete'])->name('admin.forcedelete');
    Route::get('/admin/dashboard/users/restore-all', [AdminController::class, 'restore_all'])->name('admin.restore_all');
    Route::get('/admin/dashboard/users/delete-all', [AdminController::class, 'delete_all'])->name('admin.delete_all');
    Route::get('/admin/dashboard/users/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/dashboard/users/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/dashboard/users/all-admin', [AdminController::class, 'all_admin'])->name('admin.all-admin');
    Route::get('/admin/dashboard/users/{id}/show', [AdminController::class, 'show'])->name('admin.show');
    Route::delete('/admin/dashboard/users/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/dashboard/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/dashboard/users/{id}/edit', [AdminController::class, 'update'])->name('admin.update');

    //Request
    Route::get('/admin/dashboard/requst', [RequestController::class, 'index'])->name('request.index');
    Route::get('/admin/dashboard/requst/create', [RequestController::class, 'create'])->name('request.create');
    Route::get('/admin/dashboard/requst/Type', [RequestController::class, 'type'])->name('request.type');
    Route::get('/admin/dashboard/requst/Type/trash', [RequestController::class, 'type_trash'])->name('request.Typetrash');
    Route::get('/admin/dashboard/requst/Type/{id}/restore', [RequestController::class, 'type_restore'])->name('request.Typerestore');
    Route::get('/admin/dashboard/requst/Type/{id}/edit', [RequestController::class, 'typeEdit'])->name('request.typeEdit');
    Route::put('/admin/dashboard/requst/Type/{id}/edit', [RequestController::class, 'type_edit_Update'])->name('request.typeEditUpdate');
    Route::post('/admin/dashboard/requst/store', [RequestController::class, 'store'])->name('request.store');
    Route::get('/admin/dashboard/requst/{id}/edit', [RequestController::class, 'edit'])->name('request.edit');
    Route::put('/admin/dashboard/requst/{id}/edit', [RequestController::class, 'update'])->name('request.update');
    Route::delete('/admin/dashboard/requst/{id}/', [RequestController::class, 'delete'])->name('request.delete');
    Route::get('/admin/dashboard/requst/Type/trash/{id}/forcedelete', [RequestController::class, 'type_forcedelete'])->name('request.typeforcedelete');
    // Route::get('/admin/dashboard/requst/{id}/', [RequestController::class, 'destroy'])->name('request.destroy');
}); //End Group Admin Middleware


Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'employeeDashboard'])->name('employee.dashboard');
    Route::get('/employee/dashboard/request', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/dashboard/request/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/dashboard/request/store', [EmployeeController::class, 'store'])->name('employee.store');
}); //End Group Admin Middleware
