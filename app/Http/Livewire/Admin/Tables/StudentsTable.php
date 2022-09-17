<?php

namespace App\Http\Livewire\Admin\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Student;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class StudentsTable extends DataTableComponent
{
    protected $model = Student::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableAttributes([
            'class' => 'table-sm'
        ]);
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Department')
                ->setFilterPillTitle('User Status')
                ->setFilterPillValues(Student::getDepartments())
                ->options(array_replace(['' => 'All'], Student::getDepartments()))
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('department_id', $value);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name_english")
                ->sortable(),
            Column::make("Department", "department_id")
                ->format(function($department_id, $row, $column) {
                    return Student::getDepartmentName($department_id);
                })
                ->sortable(),

            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
