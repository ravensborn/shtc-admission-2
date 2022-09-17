<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;


class Dashboard extends Component
{

    public function mount() {
//        dd(array_replace(['' => 'All'], Student::getDepartments()));
    }


    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts.admin')->section('content');
    }
}
