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


    public function builder(): Builder
    {
        $user = auth()->user();

        $builder = Student::query();

        if ($user->hasRole('limited')) {

            if ($user->hasRole('MIS')) {
                $builder->where('department_id', 2);
            }
            if ($user->hasRole('AD')) {
                $builder->where('department_id', 3);
            }
            if ($user->hasRole('VET')) {
                $builder->where('department_id', 4);
            }
            if ($user->hasRole('NURSING')) {
                $builder->where('department_id', 5);
            }
            if ($user->hasRole('MLT')) {
                $builder->where('department_id', 6);
            }
            if ($user->hasRole('ARC')) {
                $builder->where('department_id', 7);
            }
            if ($user->hasRole('BUILD')) {
                $builder->where('department_id', 8);
            }
            if ($user->hasRole('TOURISM')) {
                $builder->where('department_id', 9);
            }
        }

        return $builder;
    }


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
            SelectFilter::make('Stage')
                ->setFilterPillTitle('Stage')
                ->setFilterPillValues(Student::getStageStatuses())
                ->options(array_replace(['' => 'All'], Student::getStageStatuses()))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('stage', $value);
                }),
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
            SelectFilter::make('Type')
                ->setFilterPillTitle('Type')
                ->setFilterPillValues(Student::getDepartmentTypes())
                ->options(array_replace(['' => 'All'], Student::getDepartmentTypes()))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('department_type_id', $value);
                }),
        ];
    }

    public function updateStage($student, $stage): void
    {

        $student = Student::find($student);
        if(array_key_exists($stage, Student::getStageStatuses())) {
            $student->update([
                'stage' => $stage
            ]);
        }

        $this->alert('success', 'Updated stage for student: ' . $student->name_kurdish . '.');

    }
    public function columns(): array
    {
        return [
            Column::make("#", "number")->searchable(),
            Column::make("Code", "code")->searchable(),
            Column::make("Stage", "stage")
                ->format(function ($stage, $row, $column) {

                return Student::getStageStatuses()[$stage];

            })->html(),
            Column::make("Name", "name_kurdish")->searchable(),
            Column::make("Phone", "phone")->searchable(),
            Column::make("Department", "department_id")
                ->format(function ($department_id, $row, $column) {
                    return Student::getDepartmentName($department_id);
                })->sortable(),
            Column::make("Type", "department_type_id")
                ->format(function ($department_type_id, $row, $column) {
                    return Student::getDepartmentTypeName($department_type_id);
                })->sortable(),
            Column::make("Status", "status")
                ->format(function ($status, $row, $column) {
//                    if ($status == Student::STATUS_PENDING) {
//                        return '';
//                    }

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
                    $editBtn = '<a href="' . route('admin.students.edit', $id) . '" class="btn btn-info btn-sm"><span class="icon"> <i class="lni lni-pencil-alt"></i></span></a>';
//                    $editBtn = '';

                    if(auth()->user()->hasRole('admin')) {
                        return $div . $editBtn . '&nbsp;' . $viewBtn . '&nbsp;' . $deleteBtn . $closeDiv;
                    } else {
                        return $div . $editBtn . '&nbsp;'. $viewBtn . '&nbsp;' . $closeDiv;
                    }
                })
                ->html(),
        ];
    }

    public function triggerDeleteStudent(Student $student): void
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

        $this->emit('refresh_statistics');

        $this->alert('success', 'Student successfully deleted.', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
        ]);

    }


}
