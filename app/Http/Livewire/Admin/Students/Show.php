<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Show extends Component
{

    use LivewireAlert;

    public $student;
    public $status;

    public function updatedStatus($value) {
        $this->student->update([
            'status' => $value
        ]);

        $this->student = Student::find($this->student->id);
        $this->status = $this->student->status;

        $this->alert('success', 'Status updated successfully.');
    }

    public function mount(Student $student) {
     $this->student = $student;
     $this->status = $student->status;
    }


    public function render()
    {
        return view('livewire.admin.students.show')->extends('layouts.admin')->section('content');
    }
}
