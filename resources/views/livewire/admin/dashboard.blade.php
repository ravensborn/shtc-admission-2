<div>

    <div class="mt-4"></div>
    @if(auth()->user()->hasRole('admin'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info" style="direction: rtl;">

                    @foreach($statistics as $name => $value)
                        <div>
                            {{ $name . ': ' . $value}}
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    All Admissions
                </div>
                <div class="card-body">
                    <livewire:admin.tables.students-table status-id="{{ (int)$statusId }}" />
                </div>
            </div>

        </div>
    </div>


</div>
