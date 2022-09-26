<?php

namespace App\Http\Livewire\Admissions;

use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Result extends Component
{
    use LivewireAlert;

    public $code = '';
    public $resultPage = false;
    public $student;

    public function getResult() {

        if(!$this->code) {
            $this->alert('info', 'زانیاری', [
                'text' => 'تکایە کۆدی قوتابی بنووسە.',
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
            ]);
            return false;
        }

        $student = Student::where('code', $this->code)->first();

        if(!$student) {

            $this->alert('error', 'هەڵە', [
                'text' => 'کۆدی قوتابی هەڵەیە.',
                'position' => 'center',
                'timer' => 5000,
                'toast' => false,
            ]);

            return false;
        }

        $this->resultPage = true;
        $this->student = $student;
    }

    public function resetPage() {
        $this->resultPage = false;
        $this->code = $this->student->code;
        $this->student = null;
    }

    public function mount() {
        if(!config('envAccess.RESULT_MODE')) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.admissions.result')->extends('layouts.app')->section('content');
    }
}
