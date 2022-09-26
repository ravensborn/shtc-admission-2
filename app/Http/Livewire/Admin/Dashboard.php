<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Dashboard extends Component
{

    public array $statistics = [];

    public function statistics()
    {

        $statusResultArray = [];
        $statusList = Student::getStatusArray();
        foreach ($statusList as $status_id => $status) {
            if($status_id == 0) {
                continue;
            }
            $count = Student::where('status', $status_id)->count();
            $statusResultArray[Student::getStatusName($status_id)] = $count;

        }

        $getDepartmentTypeArray = Student::getDepartmentTypeArray();

        foreach ($getDepartmentTypeArray as $item_id => $item) {

            $count = Student::where('department_type_id', $item_id)->count();
            $statusResultArray[$item] = $count;

        }

        $this->statistics = array_replace($statusResultArray, []);
    }

    public int $statusId;

    public function mount() {

        if(request()->has('status_id')) {
            $this->statusId = request()->get('status_id');
        } else {
            return redirect()->route('admin.select');
        }

    }

    public function render()
    {
        if(auth()->user()->hasRole('admin')) {
            $this->statistics();
        }
        return view('livewire.admin.dashboard')->extends('layouts.admin')->section('content');
    }
}
