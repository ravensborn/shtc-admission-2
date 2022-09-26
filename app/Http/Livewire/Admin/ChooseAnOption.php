<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;


class ChooseAnOption extends Component
{

    public function openSection($id) {

        return redirect()->route('admin.dashboard', [
            'status_id' => $id
        ]);

    }

    public function mount() {

    }

    public function render()
    {
        return view('livewire.admin.choose-an-option')->extends('layouts.admin')->section('content');
    }
}
