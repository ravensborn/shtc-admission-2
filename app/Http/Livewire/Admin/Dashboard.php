<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends Component
{
    protected $listeners = [
        'refresh_statistics' => 'refreshStatistics'
    ];

    public array $statisticsByStatusArray = [];
    public array $statisticsByDepArray = [];

    public function refreshStatistics(): void
    {
        $this->statisticsByDepartment();
        $this->statisticsByStatus();
    }

    public function statisticsByStatus(): void
    {
        $grandArr = [];

        foreach (Student::getStatusArray() as $status_id => $status_name) {

            $array = [];

            if($status_id == Student::STATUS_DEFAULT) {
                continue;
            }

            $studentCount = Student::where('status', $status_id)
                ->where('stage', Student::STAGE_STATUS_1)
                ->count();
            $array[$status_name] = $studentCount;

            foreach (Student::getDepartmentTypeArray() as $id => $name) {
                $array[$name] =
                    Student::where('status', $status_id)
                        ->where('stage', Student::STAGE_STATUS_1)
                        ->where('department_type_id', $id)
                        ->count();
            }

            $grandArr[] = $array;
        }

        $this->statisticsByStatusArray = $grandArr;
    }
    public function statisticsByDepartment(): void
    {
        $grandArr = [];

        foreach (Student::getDepartments() as $depId => $depName) {

            $array = [];

            $studentCount = Student::where('department_id', $depId)
                ->whereIn('status', [Student::STATUS_ACCEPTED, Student::STATUS_POSTPONED])
                ->where('stage', Student::STAGE_STATUS_1)
                ->count();
            $array[$depName] = $studentCount;


            $grandArr[] = $array;
        }

        $this->statisticsByDepArray = $grandArr;
    }

    public function mount()
    {
    }

    public function render()
    {
        if (auth()->user()->hasRole('admin')) {
            $this->statisticsByStatus();
            $this->statisticsByDepartment();
        }
        return view('livewire.admin.dashboard')->extends('layouts.admin')->section('content');
    }
}
