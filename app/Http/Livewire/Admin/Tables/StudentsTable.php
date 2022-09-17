<?php

namespace App\Http\Livewire\Admin\Tables;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Student;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class StudentsTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Student::class;

    public $productToBeDeleted = null;

    protected $listeners = [
        'deleteStudent',
        'refresh-students' => '$refresh',
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableAttributes([
            'class' => 'table-sm table-bordered'
        ]);
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Department')
                ->setFilterPillTitle('Department')
                ->setFilterPillValues(Student::getDepartments())
                ->options(array_replace(['' => 'All'], Student::getDepartments()))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('department_id', $value);
                }),
            SelectFilter::make('Status')
                ->setFilterPillTitle('Status')
                ->setFilterPillValues(Student::getStatusArray())
                ->options(array_replace(['' => 'All'], Student::getStatusArray()))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('status', $value);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("#", "number"),
            Column::make("Code", "code"),
            Column::make("Name", "name_english"),
            Column::make("Department", "department_id")
                ->format(function ($department_id, $row, $column) {
                    return Student::getDepartmentName($department_id);
                })->sortable(),

            Column::make("Status", "status")
                ->format(function ($status, $row, $column) {
                    return Student::getStatusName($status);
                })
                ->sortable(),

            Column::make("Date", "created_at")
                ->format(function ($value) {
                    return $value->format('d-m-Y');
                })
                ->sortable(),

            Column::make("Actions", "id")
                ->format(function ($id, $row, $column) {

                    $div = "<div class='d-flex justify-content-start'>";
                    $closeDiv = "</div>";

                    $deleteBtn = '<a class="btn btn-danger btn-sm" wire:click="triggerDeleteStudent(' . $id . ')"><span class="icon"> <i class="lni lni-trash-can"></i></span></a>';
                    $viewBtn = '<a href="' . route('admin.students.show', $id) . '" class="btn btn-warning btn-sm"><span class="icon"> <i class="lni lni-user"></i></span></a>';


                    return $div . $viewBtn . '&nbsp;' . $deleteBtn . $closeDiv;
                })
                ->html(),
        ];
    }



    public function triggerDeleteStudent(Student $student)
    {
        $this->confirm('Are you sure that you want to delete this student?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'deleteStudent'
        ]);

        $this->studentToBeDeleted = $student;
    }

    public function deleteStudent()
    {

        $this->studentToBeDeleted->delete();

        $this->alert('success', 'Student successfully deleted.', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
        ]);

    }


}
