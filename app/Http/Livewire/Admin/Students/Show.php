<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Show extends Component
{

    public function mount(Student $student) {
     
    }


    public function render()
    {
        return view('livewire.admin.students.show')->extends('layouts.admin')->section('content');
    }
}
