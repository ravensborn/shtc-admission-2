<?php

use App\Http\Livewire\Home as Home;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admissions\Create as AdmissionCreate;
use App\Http\Livewire\Admissions\Result as AdmissionResult;
use Illuminate\Support\Facades\Route;

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


Auth::routes([
    'register' => false,
    'logout' => false,
]);

Route::middleware(['role:admin'])->group(function() {

    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');

});

Route::get('/', Home::class)->name('home');

Route::get('/admissions/create', AdmissionCreate::class)->name('admissions.create');
Route::get('/admissions/result', AdmissionResult::class)->name('admissions.result');

