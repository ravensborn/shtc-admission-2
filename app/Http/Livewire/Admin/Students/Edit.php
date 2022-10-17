<?php

namespace App\Http\Livewire\Admin\Students;

use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads, LivewireAlert;

    public $student;

    public $student_photo;

    public $karty_neshtemany_front_side_photo;
    public $karty_neshtemany_back_side_photo;

    public $nasnama_front_side_photo;
    public $nasnama_back_side_photo;

    public $ragaznama_photo;

    public $karty_zanyari_front_side_photo;
    public $karty_zanyari_back_side_photo;

    public $psulay_xorak_photo;
    public $pshtgere_neshtajebwn_photo;
    public $brwanama_12;
    public $kafala;
    public $daray_psula;

    public string $name_kurdish = "";
    public string $name_english = "";
    public string $gender = "";

    public string $birthday = "";
    public string $birthplace = "";

    public string $phone = "";
    public string $nationality = "";
    public string $school = "";

    public string $education_type_id = "";
    public string $department_id = "";
    public string $department_type_id = "";

    public string $degree_total = "";

    public string $student_type_id = "";
    public string $religion = "";
    public string $bloodgroup_id = "";
    public string $parent_name = "";
    public string $parent_occupation = "";
    public string $parent_phone = "";

    public string $province_id = "";
    public string $district = "";
    public string $sub_district = "";
    public string $village_name = "";
    public string $street = "";
    public string $nearest_place = "";

    public array $rules = [

        'student_photo' => 'nullable|image|max:5120',

        'karty_neshtemany_front_side_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',
        'karty_neshtemany_back_side_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',

        'nasnama_front_side_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',
        'nasnama_back_side_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',

        'ragaznama_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',

        'karty_zanyari_front_side_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',
        'karty_zanyari_back_side_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',

        'psulay_xorak_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',
        'pshtgere_neshtajebwn_photo' => 'nullable|mimes:jpg,jpeg,png|max:5120',
        'brwanama_12' => 'nullable|mimes:jpg,jpeg,png|max:5120',
        'kafala' => 'nullable|mimes:jpg,jpeg,png|max:5120',

        'name_kurdish' => 'required|max:50|min:4',
        'name_english' => 'required|max:50|min:4',
        'gender' => 'required|in:1,2',

        'birthday' => 'required|date',
        'birthplace' => 'required|max:255',


        'phone' => 'required|max:255',
        'nationality' => 'required|max:255',
        'school' => 'required|max:255',

        'education_type_id' => 'required|in:1,2,3',
        'department_type_id' => 'required|in:1,2,3',
        'department_id' => 'required|in:1,2,3,4,5,6,7,8,9',

        'degree_total' => 'required|max:255',

        'student_type_id' => 'required|in:1,2',
        'religion' => 'required|max:255',
        'bloodgroup_id' => 'required|in:1,2,3,4,5,6,7,8',
        'parent_name' => 'required|max:255',
        'parent_occupation' => 'required|max:255',
        'parent_phone' => 'required|max:255',

        'province_id' => 'required|in:1,2,3,4,5',
        'district' => 'required|max:255',
        'sub_district' => 'required|max:255',
        'village_name' => 'nullable|max:255',
        'street' => 'required|max:255',
        'nearest_place' => 'required|max:255',
    ];


    public function update()
    {

        $validated = $this->validate($this->rules);


        $student = $this->student;

        if ($this->student_photo) {
            $name = 'student-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }

            $student->addMedia($this->student_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->student_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);

            $this->student_photo = null;
        }
        if ($this->karty_neshtemany_front_side_photo) {
            $name = 'national-id-front-side';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }

            $student->addMedia($this->karty_neshtemany_front_side_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->karty_neshtemany_front_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);

            $this->karty_neshtemany_front_side_photo = null;
        }
        if ($this->karty_neshtemany_back_side_photo) {
            $name = 'national-id-back-side';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }

            $student->addMedia($this->karty_neshtemany_back_side_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->karty_neshtemany_back_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);

            $this->karty_neshtemany_back_side_photo = null;
        }
        if ($this->nasnama_front_side_photo) {
            $name = 'id-front-side-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }

            $student->addMedia($this->nasnama_front_side_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->nasnama_front_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->nasnama_front_side_photo = null;
        }
        if ($this->nasnama_back_side_photo) {
            $name = 'id-back-side-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->nasnama_back_side_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->nasnama_back_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->nasnama_back_side_photo = null;
        }
        if ($this->ragaznama_photo) {
            $name = 'nationality-card-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->ragaznama_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->ragaznama_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->ragaznama_photo = null;
        }
        if ($this->karty_zanyari_front_side_photo) {
            $name = 'karty-zanyari-front-side-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->karty_zanyari_front_side_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->karty_zanyari_front_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->karty_zanyari_front_side_photo = null;
        }
        if ($this->karty_zanyari_back_side_photo) {
            $name = 'karty-zanyari-back-side-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->karty_zanyari_back_side_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->karty_zanyari_back_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->karty_zanyari_back_side_photo = null;
        }
        if ($this->pshtgere_neshtajebwn_photo) {
            $name = 'residency-confirmation-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->pshtgere_neshtajebwn_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->pshtgere_neshtajebwn_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->pshtgere_neshtajebwn_photo = null;
        }
        if ($this->psulay_xorak_photo) {
            $name = 'food-card-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->psulay_xorak_photo)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->psulay_xorak_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->psulay_xorak_photo = null;
        }
        if ($this->brwanama_12) {
            $name = 'brwanama-12-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->brwanama_12)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->brwanama_12->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->brwanama_12 = null;
        }
        if ($this->kafala) {
            $name = 'kafala-photo';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->kafala)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->kafala->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->kafala = null;
        }
        if ($this->daray_psula) {
            $name = 'daray_psula';
            if ($student->hasMedia($name)) {
                $student->clearMediaCollection($name);
            }
            $student->addMedia($this->daray_psula)
                ->usingName($name)
                ->usingFilename($name . '.' . $this->daray_psula->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection($name);
            $this->daray_psula = null;
        }

        $student->update($validated);

        $this->alert('success', 'بەسەرکەوتوویی نوێکرایەوە.');

        $this->student = $student;




    }

    protected function unique_code($limit): string
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }


    public function mount(Student $student)
    {

        $this->student = $student;

        $this->name_kurdish = $student->name_kurdish;
        $this->name_english = $student->name_english;
        $this->gender = $student->gender;
        $this->birthday = $student->birthday->format('Y-m-d');
        $this->birthplace = $student->birthplace;
        $this->phone = $student->phone;
        $this->nationality = $student->nationality;
        $this->school = $student->school;
        $this->education_type_id = $student->education_type_id;
        $this->department_id = $student->department_id;
        $this->department_type_id = $student->department_type_id;
        $this->degree_total = $student->degree_total;
        $this->student_type_id = $student->student_type_id;
        $this->religion = $student->religion;
        $this->bloodgroup_id = $student->bloodgroup_id;
        $this->parent_name = $student->parent_name;
        $this->parent_occupation = $student->parent_occupation;
        $this->parent_phone = $student->parent_phone;
        $this->province_id = $student->province_id;
        $this->district = $student->district;
        $this->sub_district = $student->sub_district;
        $this->village_name = $student->village_name;
        $this->street = $student->street;
        $this->nearest_place = $student->nearest_place;

    }

    public function render()
    {
        return view('livewire.admin.students.edit')->extends('layouts.admin')->section('content');
    }
}
