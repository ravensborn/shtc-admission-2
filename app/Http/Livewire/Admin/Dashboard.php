<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;


class Dashboard extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts.admin')->section('content');
    }
}
