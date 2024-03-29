<?php

use App\Http\Livewire\Home as Home;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admin\ChooseAnOption as AdminChooseAnOption;
use App\Http\Livewire\Admin\Students\Show as AdminStudentShow;
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

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('admin.logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', AdminDashboard::class)
        ->name('admin.dashboard');

    Route::get('/admin/select', AdminChooseAnOption::class)
        ->name('admin.select');

    Route::get('/admin/student/{student}', AdminStudentShow::class)
        ->name('admin.students.show');

});

//Route::middleware(['role:admin'])->group(function() {
//
//    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
//    Route::get('/admin/student/{student}', AdminStudentShow::class)->name('admin.students.show');
//
//});

Route::get('/', Home::class)->name('home');

Route::get('/admissions/create', AdmissionCreate::class)->name('admissions.create');
Route::get('/admissions/result', AdmissionResult::class)->name('admissions.result');

