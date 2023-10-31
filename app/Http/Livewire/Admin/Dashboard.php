<?php

namespace App\Http\Livewire\Admin;

use App\Jobs\ExportStudentImagesJob;
use Illuminate\Support\Facades\File;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Dashboard extends Component
{

    use LivewireAlert;

    public string $exportImagesButtonText = 'Export Student Images';
    public bool $startPolling = false;

    public function handleStudentImageExport(): void
    {
        if($this->hasZippedStudentImageExportFiles()) {
            $this->downloadZippedStudentImageExportFiles();
            $this->startPolling = false;

        } else {
            $this->exportStudentImages();
            $this->loadStudentImageExportStatus();
        }

    }
    public function exportStudentImages(): void
    {

        if(!$this->hasStudentImageExportStarted()) {

            ExportStudentImagesJob::dispatch();
        }
    }

    public function hasZippedStudentImageExportFiles(): bool
    {
        $directory = public_path('zip-exports');
        $files = File::files($directory);

        return (count($files) > 0);
    }

    public function downloadZippedStudentImageExportFiles(): void
    {

        $this->redirectRoute('admin.students.export.download-student-images');
    }

    public function loadStudentImageExportStatus(): void
    {
        $this->exportImagesButtonText = 'Export Student Images';

        if($this->hasZippedStudentImageExportFiles()) {
            $this->startPolling = true;
            $this->exportImagesButtonText = 'Download zipped images';
        }
        if($this->hasStudentImageExportStarted()) {
            $this->startPolling = true;
            $this->exportImagesButtonText = 'Export in progress... ';
        }
    }

    public function hasStudentImageExportStarted(): bool
    {
        $queueItems = \DB::table(config('queue.connections.database.table'))->get();

        foreach ($queueItems as $item) {

            $payload = json_decode($item->payload, true);

            if ($payload['displayName'] == ExportStudentImagesJob::class) {

                return true;
            }
        }

        return false;
    }


    public function mount()
    {
        $this->loadStudentImageExportStatus();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts.admin')->section('content');
    }
}
