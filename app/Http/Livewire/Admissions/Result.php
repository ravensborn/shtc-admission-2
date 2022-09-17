<?php

namespace App\Http\Livewire\Admissions;

use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Result extends Component
{
    use LivewireAlert;



    public function render()
    {
        return view('livewire.admissions.result')->extends('layouts.app')->section('content');
    }
}
