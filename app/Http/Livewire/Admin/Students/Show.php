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
    public $stage;
    public string|null $note = null;

    public function updatedStage($value): void
    {
        $this->student->update([
            'stage' => $value
        ]);

        $this->student = Student::find($this->student->id);
        $this->stage = $this->student->stage;

        $this->alert('success', 'Stage updated successfully.');
    }

    public function updatedStatus($value): void
    {
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
     $this->stage = $student->stage;
     $this->note = $student->note;
    }

    public function saveNote(): void
    {

        $validated = $this->validate([
            'note' => 'nullable|string|max:10000'
        ]);

        $this->student->update([
            'note' => $validated['note']
        ]);

        $this->alert('success', 'Successfully updated student notes.');
    }


    public function render()
    {
        return view('livewire.admin.students.show')->extends('layouts.admin')->section('content');
    }
}
