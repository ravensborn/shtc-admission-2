<div>

    <div class="mt-4"></div>

    @if(auth()->user()->hasRole('export'))
        <a href="{{ route('admin.students.export.all') }}" class="btn btn-outline-primary mb-3"
           style="width: 200px;" type="button">
            <i class="bi bi-file-earmark-excel"></i>
            Export All
        </a>
    @endif
    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('admissions.create') }}" class="btn btn-outline-success mb-3"
           style="width: 200px;">
            <i class="bi bi-plus"></i>
            New Student
        </a>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    All Admissions
                </div>
                <div class="card-body">
                    <livewire:admin.tables.students-table/>
                </div>
            </div>

        </div>
    </div>


</div>
