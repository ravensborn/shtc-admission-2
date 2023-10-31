<?php

namespace App\Jobs;

use App\Console\Commands\ExportStudentImages;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use ZipArchive;

class ExportStudentImagesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $exportPath = public_path('zip-exports');
        File::cleanDirectory($exportPath);

        $zipFileName = $exportPath . '/images_' . date('YmdHis') . '.zip';

        $zip = new ZipArchive();

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {


            $students = Student::all();

            foreach ($students as $student) {

                $image = $student->getFirstMedia('student-photo');

                if($image) {
                    sleep(1);
                    $path = $image->getPath();
                    $extension = pathinfo($path, PATHINFO_EXTENSION);

                    $zip->addFile($path, $student->name_english . '.' . $extension);
                }
            }
        }
        $zip->close();
    }
}