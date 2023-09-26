<?php

use App\Http\Controllers\ExportController;
use App\Http\Livewire\Home as Home;
use App\Http\Livewire\About as About;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admin\Statistics as AdminStatistics;
use App\Http\Livewire\Admin\Students\Show as AdminStudentShow;
use App\Http\Livewire\Admin\Students\Edit as AdminStudentEdit;
use App\Http\Livewire\Admissions\Create as AdmissionCreate;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Controllers\HttpConnectionHandler;


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

Route::post('livewire/message/{name}', [HttpConnectionHandler::class, '__invoke']);

Auth::routes([
    'register' => false,
    'logout' => false,
    'reset' => false,
]);

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('admin.logout');


Route::get('/', Home::class)->name('home');

Route::get('/admissions/application-form', AdmissionCreate::class)->name('admissions.create');

Route::get('/about', About::class)->name('about');


Route::middleware(['auth'])->group(function () {

    Route::get('/admin', AdminDashboard::class)
        ->name('admin.dashboard');

    Route::get('/admin/statistics', AdminStatistics::class)
        ->name('admin.statistics');

    Route::get('/admin/student/{student}', AdminStudentShow::class)
        ->name('admin.students.show');

    Route::get('/admin/student/{student}/edit', AdminStudentEdit::class)
        ->name('admin.students.edit');

    Route::get('/admin/student/export/all', [ExportController::class, 'exportAdmin'])->name('admin.students.export.all');

    Route::get('/admin/set-passwords', function () {

//        if(auth()->check() && auth()->user()->email != 'yad.hoshyar@gmail.com') {
//            abort(401);
//        }

//        $collegeCode = \Str::lower(config('envAccess.COLLEGE_CODE'));

//        $users = [
//            [
//                'id' => 2,
//                'name' => 'Admin',
//                'email' => 'admin@admissions.epu.edu.iq',
//                'password' => $collegeCode . '@' . rand(1000, 9999),
//                'roles' => ['admin', 'export'],
//                'department_id' => null,
//                'department_name' => null,
//            ],
//        ];

        foreach (Department::all() as $index => $department) {
            $users[] = [
                'id' => $index + 3,
//                'name' => $collegeCode . '-dep-' . $department->id,
//                'email' => $collegeCode . '-dep-' . $department->id . '@admissions.epu.edu.iq',
//                'password' => $collegeCode . '@' . rand(1000, 9999),
//                'roles' => [],
                'department_id' => $department->id,
                'department_name' => $department->name,
            ];
        }


        foreach ($users as $user) {

            User::update([
                'department_id' => $user['department_id'],
            ]);

//            $createOrUpdateUser = User::updateOrCreate(
//                [
//                    'id' => $user['id']
//                ],
//                [
//                    'name' => $user['name'],
//                    'email' => $user['email'],
//                    'password' => bcrypt($user['password']),
//                    'department_id' => $user['department_id']
//                ]);
//
//            $createOrUpdateUser->syncRoles($user['roles']);
        }

        print("<pre>".print_r($users,true)."</pre>");

    })->middleware('role:admin')->name('admin.set-passwords');

});

