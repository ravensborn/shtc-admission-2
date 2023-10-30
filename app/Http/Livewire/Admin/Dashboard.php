<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use ZipArchive;


class Dashboard extends Component
{

    public  string $exportImagesButtonText = 'Export Student Images';

    public function exportImages() {

        $exportPath = public_path('zip-exports');
        File::cleanDirectory($exportPath);

        $this->exportImagesButtonText = 'Zipping images...';

        $zipFileName = 'zip-exports/images_' . date('YmdHis') . '.zip';

        // Initialize a ZipArchive object
        $zip = new ZipArchive();

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {


            foreach (Student::all() as $student) {

                $image = $student->getFirstMedia('student-photo');

                if($image) {
                    $path = $image->getPath();
                    $extension = pathinfo($path, PATHINFO_EXTENSION);
                    $zip->addFile($path, $student->name_english . '.' . $extension);
                }

            }

            $zip->close();

            // Set the appropriate headers for download
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
            header('Content-Length: ' . filesize($zipFileName));

            $this->exportImagesButtonText = 'Ready to download.';

            return response()->download(public_path( $zipFileName));

        } else {
            echo "Failed to create the zip file.";
        }

    }
    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts.admin')->section('content');
    }
}
