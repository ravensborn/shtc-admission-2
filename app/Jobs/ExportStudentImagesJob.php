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


            $students = Student::where('stage', Student::STAGE_STATUS_1)
                ->whereIn('status', [
                Student::STATUS_ACCEPTED,
                Student::STATUS_INCOMPLETE,
            ])->get();

            foreach ($students as $student) {

                $image = $student->getFirstMedia('student-photo');

                if($image) {
                    $path = $image->getPath();
                    $extension = pathinfo($path, PATHINFO_EXTENSION);

                    $zip->addFile($path, ucwords(strtolower($student->name_english)) . '.' . $extension);
                }
            }
        }
        $zip->close();
    }
}
