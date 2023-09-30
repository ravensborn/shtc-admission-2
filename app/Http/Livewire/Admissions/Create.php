<?php

namespace App\Http\Livewire\Admissions;

use App\Models\Student;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, LivewireAlert;

    public $student;
    public bool $studentResultPage = false;

    public string $disabledKartyNeshtemany = '';
    public string $disabledOldNasnama = '';

    public int $uploadedIdType = 0;

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

    public string $id_nationality = "";
    public string $id_number = "";
    public string $id_issue_place = "";
    public string $province_id = "";
    public string $district = "";
    public string $sub_district = "";
    public string $village_name = "";
    public string $street = "";
    public string $nearest_place = "";

    public array $rules = [

        'student_photo' => 'required|image|max:5120',

        'karty_neshtemany_front_side_photo' => 'required|mimes:jpg,jpeg,png|max:5120',
        'karty_neshtemany_back_side_photo' => 'required|mimes:jpg,jpeg,png|max:5120',

        'nasnama_front_side_photo' => 'required|mimes:jpg,jpeg,png|max:5120',
        'nasnama_back_side_photo' => 'required|mimes:jpg,jpeg,png|max:5120',

        'ragaznama_photo' => 'required|mimes:jpg,jpeg,png|max:5120',

        'karty_zanyari_front_side_photo' => 'required|mimes:jpg,jpeg,png|max:5120',
        'karty_zanyari_back_side_photo' => 'required|mimes:jpg,jpeg,png|max:5120',

        'psulay_xorak_photo' => 'required|mimes:jpg,jpeg,png|max:5120',
        'pshtgere_neshtajebwn_photo' => 'required|mimes:jpg,jpeg,png|max:5120',
        'brwanama_12' => 'required|mimes:jpg,jpeg,png|max:5120',
        'kafala' => 'required|mimes:jpg,jpeg,png|max:5120',

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
        'department_id' => 'required|exists:departments,id',

        'degree_total' => 'required|max:255',

        'student_type_id' => 'required|in:1,2',
        'religion' => 'required|max:255',
        'bloodgroup_id' => 'required|in:1,2,3,4,5,6,7,8',
        'parent_name' => 'required|max:255',
        'parent_occupation' => 'required|max:255',
        'parent_phone' => 'required|max:255',

        'id_nationality' => 'required|max:255',
        'id_number' => 'required|max:255',
        'id_issue_place' => 'required|max:255',
        'province_id' => 'required|in:1,2,3,4,5',
        'district' => 'required|max:255',
        'sub_district' => 'required|max:255',
        'village_name' => 'nullable|max:255',
        'street' => 'required|max:255',
        'nearest_place' => 'required|max:255',
    ];


    public function hasKartyNeshtemany(): bool
    {
        if ($this->karty_neshtemany_front_side_photo && $this->karty_neshtemany_back_side_photo) {
            return true;
        }

        return false;
    }

    public function hasPartialKartyNeshtemany(): bool
    {
        if ($this->karty_neshtemany_front_side_photo || $this->karty_neshtemany_back_side_photo) {
            return true;
        }

        return false;
    }

    public function hasOldNasnama(): bool
    {
        if ($this->nasnama_front_side_photo && $this->nasnama_back_side_photo && $this->ragaznama_photo) {
            return true;
        }

        return false;
    }

    public function hasPartialOldNasnama(): bool
    {
        if ($this->nasnama_front_side_photo || $this->nasnama_back_side_photo && $this->ragaznama_photo) {
            return true;
        }

        return false;
    }

    public function updatingKartyNeshtemanyFrontSidePhoto()
    {
        $this->activateKartNeshtemanyMode();
    }

    public function updatingKartyNeshtemanyBackSidePhoto()
    {
        $this->activateKartNeshtemanyMode();
    }

    public function activateKartNeshtemanyMode() {
        $this->uploadedIdType = 1;
        $this->disabledKartyNeshtemany = '';
        $this->disabledOldNasnama = 'disabled';
        $this->rules['karty_neshtemany_front_side_photo'] = 'required|mimes:jpg,jpeg,png|max:5120';
        $this->rules['karty_neshtemany_back_side_photo'] = 'required|mimes:jpg,jpeg,png|max:5120';
        $this->rules['nasnama_front_side_photo'] = 'nullable|mimes:jpg,jpeg,png|max:5120';
        $this->rules['nasnama_back_side_photo'] = 'nullable|mimes:jpg,jpeg,png|max:5120';
        $this->rules['ragaznama_photo'] = 'nullable|mimes:jpg,jpeg,png|max:5120';
        $this->nasnama_front_side_photo = null;
        $this->nasnama_back_side_photo = null;
        $this->ragaznama_photo = null;
    }

    public function updatingNasnamaFrontSidePhoto()
    {
        $this->activateOldNasnamaMode();
    }

    public function updatingNasnamaBackSidePhoto()
    {
        $this->activateOldNasnamaMode();
    }

    public function activateOldNasnamaMode() {
        $this->uploadedIdType = 2;
        $this->disabledKartyNeshtemany = 'disabled';
        $this->disabledOldNasnama = '';
        $this->rules['karty_neshtemany_front_side_photo'] = 'nullable|mimes:jpg,jpeg,png|max:5120';
        $this->rules['karty_neshtemany_back_side_photo'] = 'nullable|mimes:jpg,jpeg,png|max:5120';
        $this->rules['nasnama_front_side_photo'] = 'required|mimes:jpg,jpeg,png|max:5120';
        $this->rules['nasnama_back_side_photo'] = 'required|mimes:jpg,jpeg,png|max:5120';
        $this->rules['ragaznama_photo'] = 'required|mimes:jpg,jpeg,png|max:5120';
        $this->karty_neshtemany_front_side_photo = null;
        $this->karty_neshtemany_back_side_photo = null;
    }


    public function submit()
    {

        $validated = $this->validate($this->rules);
        $validated['code'] = $this->unique_code(10);

        $validated['number'] = Student::generateStudentNumber();
        $validated['uploaded_id_type'] = $this->uploadedIdType;
        $validated['department_name'] = Student::getDepartmentName($validated['department_id']);

        $validated['status'] = Student::STATUS_PENDING;

        $student = new Student;
        $student = $student->create($validated);

        $student->addMedia($this->student_photo)
            ->usingName('student-photo')
            ->usingFilename('student-photo.' . $this->student_photo->getClientOriginalExtension())
            ->preservingOriginal()
            ->toMediaCollection('student-photo');

        if($this->hasKartyNeshtemany()) {

            $student->addMedia($this->karty_neshtemany_front_side_photo)
                ->usingName('national-id-front-side')
                ->usingFilename('national-id-front-side.' . $this->karty_neshtemany_front_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection('national-id-front-side');

            $student->addMedia($this->karty_neshtemany_back_side_photo)
                ->usingName('national-id-back-side')
                ->usingFilename('national-id-back-side.' . $this->karty_neshtemany_back_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection('national-id-back-side');

        }

        if($this->hasOldNasnama()) {

            $student->addMedia($this->nasnama_front_side_photo)
                ->usingName('id-front-side-photo')
                ->usingFilename('id-front-side-photo.' . $this->nasnama_front_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection('id-front-side-photo');

            $student->addMedia($this->nasnama_front_side_photo)
                ->usingName('id-back-side-photo')
                ->usingFilename('id-back-side-photo.' . $this->nasnama_back_side_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection('id-back-side-photo');


            $student->addMedia($this->ragaznama_photo)
                ->usingName('nationality-card-photo')
                ->usingFilename('nationality-card-photo.' . $this->ragaznama_photo->getClientOriginalExtension())
                ->preservingOriginal()
                ->toMediaCollection('nationality-card-photo');

        }

        $student->addMedia($this->karty_zanyari_front_side_photo)
            ->usingName('karty-zanyari-front-side-photo')
            ->usingFilename('karty-zanyari-front-side-photo.' . $this->karty_zanyari_front_side_photo->getClientOriginalExtension())
            ->preservingOriginal()
            ->toMediaCollection('karty-zanyari-front-side-photo');

        $student->addMedia($this->karty_zanyari_back_side_photo)
            ->usingName('karty-zanyari-back-side-photo')
            ->usingFilename('karty-zanyari-back-side-photo.' . $this->karty_zanyari_back_side_photo->getClientOriginalExtension())
            ->preservingOriginal()
            ->toMediaCollection('karty-zanyari-back-side-photo');

        $student->addMedia($this->pshtgere_neshtajebwn_photo)
            ->usingName('residency-confirmation-photo')
            ->usingFilename('residency-confirmation-photo.' . $this->pshtgere_neshtajebwn_photo->getClientOriginalExtension())
            ->preservingOriginal()
            ->toMediaCollection('residency-confirmation-photo');

        $student->addMedia($this->psulay_xorak_photo)
            ->usingName('food-card-photo')
            ->usingFilename('food-card-photo.' . $this->psulay_xorak_photo->getClientOriginalExtension())
            ->preservingOriginal()
            ->toMediaCollection('food-card-photo');

        $student->addMedia($this->brwanama_12)
            ->usingName('brwanama-12-photo')
            ->usingFilename('brwanama-12-photo.' . $this->brwanama_12->getClientOriginalExtension())
            ->preservingOriginal()
            ->toMediaCollection('brwanama-12-photo');

        $student->addMedia($this->kafala)
            ->usingName('kafala-photo')
            ->usingFilename('kafala-photo.' . $this->kafala->getClientOriginalExtension())
            ->preservingOriginal()
            ->toMediaCollection('kafala-photo');

        $this->alert('success', 'بەسەرکەوتوویی تۆمارکرا.');

        $this->student = $student;
        $this->studentResultPage = true;


    }

    protected function unique_code($limit): string
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }


    public function mount() {
        //Testing mode
//        $this->studentResultPage = true;
//        $this->student = Student::first();

    }

    public function render()
    {
        return view('livewire.admissions.create')->extends('layouts.app')->section('content');
    }
}
