<div>

    <div class="mt-4"></div>

    @if($startPolling)
        <div wire:poll.5s="loadStudentImageExportStatus()">
            Polling started {{ now() }}
        </div>
    @endif


    @if(auth()->user()->hasRole('export'))
        <a href="{{ route('admin.students.export.all') }}" class="btn btn-outline-primary mb-1"
           style="width: 200px;" type="button">
            <i class="bi bi-file-earmark-excel"></i>
            Export All
        </a>
        <a wire:click.prevent="handleStudentImageExport()" wire:loading.attr="disabled"
           wire:target="handleStudentImageExport() " href="#" class="btn btn-outline-primary mb-1"
           style="width: 240px;" type="button">
            <i class="bi bi-cloud-arrow-down"></i>
            {{ $exportImagesButtonText }}
        </a>
    @endif
    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('admissions.create') }}" class="btn btn-outline-success mb-1"
           style="width: 200px;">
            <i class="bi bi-plus"></i>
            New Student
        </a>
    @endif

    <div class="mb-2"></div>

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
