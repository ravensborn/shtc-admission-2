<?php

use App\Http\Livewire\Home as Home;
use App\Http\Livewire\About as About;
use App\Http\Livewire\Admin\Dashboard as AdminDashboard;
use App\Http\Livewire\Admin\Students\Show as AdminStudentShow;
use App\Http\Livewire\Admin\Students\Edit as AdminStudentEdit;
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

    Route::get('/admin/student/{student}', AdminStudentShow::class)
        ->name('admin.students.show');

    Route::get('/admin/student/{student}/edit', AdminStudentEdit::class)
        ->name('admin.students.edit');

    Route::get('/admin/student/export/all',
        [\App\Http\Controllers\ExportController::class, 'exportAdmin']
    )->name('admin.students.export.all');

    Route::get('/admin/reset-passwords', function () {

        $users = \App\Models\User::all();
        $echo = [];

        foreach ($users as $user) {

            $password = 'shtc@' . random_int(10000,99999);
            $echo[] = [
                'email' => $user->email,
                'password' => $password,
//                'role' => $user->getRoleNames(),
            ];

            $user->update([
                'password' => bcrypt($password)
            ]);
        }

        dd($echo);

    })->name('admin.reset-passwords');

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

Route::get('/about', About::class)->name('about');
//
//Route::get('/get/image/{code}', function() {
//
//    $model = \App\Models\Student::where('code', request()->input('code'))->first();
//
//    $file = $student->getFirstMedia('student-photo');
//
//    return response()->download($file->getPath());
//
//});
//Route::get('/test', function() {
//
//     $model = \App\Models\Student::where('status', [\App\Models\Student::STATUS_ACCEPTED, \App\Models\Student::STATUS_INCOMPLETE])
//        ->get();
//
//        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//
//        foreach($model as $student) {
//            $txt = 'https://shtc-tomar.com/get/image/' . $student->code;
//            fwrite($myfile, $txt);
//        }
//
//
//fclose($myfile);
//return 'done';
//
//
//# create new zip object
//    $zip = new ZipArchive();
//
//# create a temp file & open it
//    $tmp_file = tempnam('.', '');
//    $zip->open($tmp_file, ZipArchive::CREATE);
//
//# loop through each file
//    foreach ($model as $student) {
//        # download file
//        $file = $student->getFirstMedia('student-photo');
//
//        $download_file = file_get_contents($file->getPath());
//
//        #add it to the zip
//        $zip->addFromString($student->code . '.' . $file->extension, $download_file);
//    }
//
//# close zip
//    $zip->close();
//
//# send the file to the browser as a download
//    header('Content-disposition: attachment; filename="my file.zip"');
//    header('Content-type: application/zip');
//    readfile($tmp_file);
//
//
//
//
//
//});

