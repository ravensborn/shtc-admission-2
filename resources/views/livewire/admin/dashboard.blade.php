<div>

    <div class="row mt-4">
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
