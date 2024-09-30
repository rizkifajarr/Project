<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\AdminTableController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CustomerTableController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Route::post('/midtrans/notification', [MidtransController::class, 'handleNotification']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:Customer'])->name('dashboard');

// Rute untuk Guest & Customer
Route::get('customers/tables', [CustomerTableController::class, 'index'])->name('customers.tables.index');
Route::get('customers/tables/{table}', [CustomerTableController::class, 'show'])->name('customers.tables.show');

// Rute untuk Customer membuat Reservasi
Route::middleware(['auth', 'role:Owner,Admin,Customer'])->group(function () {
    Route::get('customers/reservations/create/{table_id}/{hour_id}', [ReservationController::class, 'create'])->name('customers.reservations.create');
    Route::post('customers/reservations', [ReservationController::class, 'store'])->name('customers.reservations.store');
    Route::get('customers/reservations/{reservation}', [ReservationController::class, 'show'])->name('customers.reservations.show');
});

// Rute untuk Admin & Owner Mengelola Akun
Route::middleware(['auth', 'role:Owner,Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('tables', AdminTableController::class);
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    //Rute untuk Melihat Daftar Akun
    Route::get('accounts/admin', [AccountController::class, 'admin_index'])->name('accounts.admin');
    Route::get('accounts/customers', [AccountController::class, 'customers_index'])->name('accounts.customers');
    //Rute untuk Edit, Update & Delete Akun Admin
    Route::get('accounts/{id}/edit/admin', [AccountController::class, 'admin_edit'])->name('accounts.edit.admin');
    Route::put('accounts/{id}/admin', [AccountController::class, 'admin_update'])->name('accounts.update.admin');
    Route::delete('accounts/{users}/admin', [AccountController::class, 'admin_delete'])->name('accounts.delete.admin');
    //Rute untuk Edit, Update & Delete Akun Customers
    Route::get('accounts/{id}/edit/customers', [AccountController::class, 'customer_edit'])->name('accounts.edit.customers');
    Route::put('accounts/{id}/cusomers', [AccountController::class, 'customer_update'])->name('accounts.update.customers');
    Route::delete('accounts/{users}/customers', [AccountController::class, 'customer_delete'])->name('accounts.delete.customers');
});

// Rute untuk Owner Mengelola Akun
Route::middleware(['auth', 'role:Owner'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('accounts/owner', [AccountController::class, 'owner_index'])->name('accounts.owner');
    Route::get('accounts/create/index', [AccountController::class, 'create'])->name('accounts.create.index');
    Route::post('accounts/create/store', [AccountController::class, 'store'])->name('accounts.create.store');
    //Rute untuk Edit, Update & Delete Akun Owner
    Route::get('accounts/{id}/edit/owner', [AccountController::class, 'owner_edit'])->name('accounts.edit.owner');
    Route::put('accounts/{id}/owner', [AccountController::class, 'owner_update'])->name('accounts.update.owner');
    Route::delete('accounts/{users}/owner', [AccountController::class, 'owner_delete'])->name('accounts.delete.owner');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';