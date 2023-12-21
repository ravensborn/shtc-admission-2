<?php

namespace App\Http\Livewire\Admin;


use App\Models\Department;
use App\Models\UnRegisteredStudent;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
use \PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class AdminUnRegisteredStudents extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public $search;

    public $availableDepartments;
    public int $department_id = 0;

    public $file;

    public function updatedFile(): void
    {
       $this->validate([
           'file' => 'required|file|mimes:xlsx,xls|max:5120',
       ]);
    }

    public function startImport(): void
    {

        $this->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:5120',
        ]);

        $reader = new XlsxReader();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($this->file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();

        $data = collect();
        $sheetAsArray = $sheet->toArray();
        array_shift($sheetAsArray);


        $user = auth()->user();

        if($this->department_id) {
            $department = $this->department_id;
        } else {
            if($user->hasRole('admin')) {
                $department = 0;
            } else {
                $department = auth()->user()->department_id;
            }
        }

        foreach($sheetAsArray  as $cell) {
            $data->push([
                'name' => $cell[0],
                'code' => $cell[1],
                'department' => $department,
                'date' => Carbon::instance(ExcelDate::excelToDateTimeObject($cell[2])),
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }

        UnRegisteredStudent::insert($data->toArray());
        $this->file = null;
        $this->resetValidation();
    }

    public $deletingItemId = 0;
    public function deleteItem($id): void
    {

        if($this->deletingItemId == $id) {

            UnRegisteredStudent::find($id)->delete();
            $this->deletingItemId = 0;

        } else {
            $this->deletingItemId = $id;
        }

    }
    public function mount(): void
    {
        $this->availableDepartments = Department::all();
    }
    private function getStudents()
    {
        $user = auth()->user();

        $builder = UnRegisteredStudent::query();

        if (!$user->hasRole('admin')) {

            $builder->where('department', $user->department_id);

        }

        if($this->search) {
            $builder->where('name', 'LIKE', '%' . trim($this->search) . '%');
        }

        return $builder->orderBy('created_at', 'desc')
            ->paginate(20)
            ->through(function ($student){

                $department = Department::find($student->department);

                $student['department_name'] = 'No Department';
                if($department) {
                    $student['department_name'] = $department->name;
                }
                return $student;
            });
    }

    public function render()
    {
        $students = $this->getStudents();
        return view('livewire.admin.unregistered-students', ['students' => $students])->extends('layouts.admin')->section('content');
    }
}
