<?php

namespace App\Http\Livewire\Admin\Tables;

use App\Models\Department;
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

        $builder = Student::query()->with(['department']);

        if (!$user->hasRole('admin') && $user->department_id) {

            $builder->where('department_id', $user->department_id);
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
        $departments = Department::select('id', 'name')->get();

        $filteredDepartments = [];

        foreach ($departments as $department) {
            $filteredDepartments[$department->id] = $department->name;
        }

        $statuses = Student::getStatusArray();
        unset($statuses[0]);

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
                ->setFilterPillValues($filteredDepartments)
                ->options(array_replace(['' => 'All'], $filteredDepartments))
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('department_id', $value);
                }),
            SelectFilter::make('Status')
                ->setFilterPillTitle('Status')
                ->setFilterPillValues($statuses)
                ->options(array_replace(['' => 'All'], $statuses))
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
        if (array_key_exists($stage, Student::getStageStatuses())) {
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
            Column::make("Zankoline", "school_code")->searchable(),
            Column::make("Stage", "stage")
                ->format(function ($stage, $row, $column) {

                    return Student::getStageStatuses()[$stage];

                })->html(),
            Column::make("Name", "name_kurdish")->searchable(),
            Column::make("Phone", "phone")->searchable(),
            Column::make("Department", "department.name")->sortable(),
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

                    if (auth()->user()->hasRole('admin')) {
                        return $div . $editBtn . '&nbsp;' . $viewBtn . '&nbsp;' . $deleteBtn . $closeDiv;
                    } else {
                        return $div . $editBtn . '&nbsp;' . $viewBtn . '&nbsp;' . $closeDiv;
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

    public function deleteStudent(): void
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
