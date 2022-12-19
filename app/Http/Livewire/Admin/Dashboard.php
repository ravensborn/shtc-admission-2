<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
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

    public function refreshStatistics() {
        $this->statisticsByDepartment();
        $this->statisticsByStatus();
    }

    public function statisticsByStatus()
    {
        $grandArr = [];

        foreach (Student::getStatusArray() as $status_id => $status_name) {

            $array = [];

            if($status_id == Student::STATUS_DEFAULT) {
                continue;
            }

            $studentCount = Student::where('status', $status_id)
                ->count();
            $array[$status_name] = $studentCount;

            foreach (Student::getDepartmentTypeArray() as $id => $name) {
                $array[$name] =
                    Student::where('status', $status_id)
                        ->where('department_type_id', $id)
                        ->count();
            }

            array_push($grandArr, $array);
        }

        $this->statisticsByStatusArray = $grandArr;
    }
    public function statisticsByDepartment()
    {
        $grandArr = [];

        foreach (Student::getDepartments() as $depId => $depName) {

            $array = [];

            $studentCount = Student::where('department_id', $depId)
                ->whereIn('status', [Student::STATUS_ACCEPTED, Student::STATUS_POSTPONED])
                ->count();
            $array[$depName] = $studentCount;


            array_push($grandArr, $array);
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
