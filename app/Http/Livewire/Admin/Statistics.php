<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Student;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Statistics extends Component
{
    protected $listeners = [
        'refresh_statistics' => 'refreshStatistics'
    ];

    public array $statisticsByStatusArray = [];
    public array $statisticsByDepArray = [];
    public array $departmentSpecificStatisticsByStatusAndType = [];

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
        $resultArray = [];

        foreach (Department::all() as $department) {
            $array = [];

            $studentCount = Student::where('department_id', $department->id)
                ->whereIn('status', [Student::STATUS_ACCEPTED, Student::STATUS_POSTPONED])
                ->where('stage', Student::STAGE_STATUS_1)
                ->count();

            $array[$department->name] = $studentCount;

            $resultArray[] = $array;
        }

        $this->statisticsByDepArray = $resultArray;
    }

    public function getDepartmentSpecificStatisticsByStatusAndType(): void
    {
        $array = [];

        $departmentId = auth()->user()->department_id;

        $statusArray = Student::getStatusArray();
        unset($statusArray[0]);

        foreach (Student::getDepartmentTypeArray() as $typeId => $type) {

            $students = Student::where('department_id', $departmentId)
                ->where('department_type_id', $typeId);

            $statsArr = [
                [
                    'title' => $type,
                    'data' => $students->count(),
                ]
            ];

            foreach ($statusArray as $statusId => $status) {

                $students = Student::where('department_id', $departmentId)
                    ->where('status', $statusId)
                    ->where('department_type_id', $typeId);

                $statsArr[] = [
                    'title' => $status,
                    'data' => $students->where('status', $statusId)->count(),
                ];
            }

            $array[] = [
                'title' => $type,
                'data' => $statsArr,
            ];

        }

        $this->departmentSpecificStatisticsByStatusAndType = $array;
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

        if(!auth()->user()->hasRole('admin') && auth()->user()->department_id) {
            $this->getDepartmentSpecificStatisticsByStatusAndType();
        }
        return view('livewire.admin.statistics')->extends('layouts.admin')->section('content');
    }
}
