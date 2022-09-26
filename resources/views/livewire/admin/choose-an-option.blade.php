<div>

    <div class="mt-4"></div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info">

                Please select an option.

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Options
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        @foreach(\App\Models\Student::getStatusArray() as $id => $status)
                            @if($id == 0)
                                @continue
                            @endif
                            <button wire:click="openSection({{ $id }})" class="btn btn-outline-info me-2" style="width: 200px; height: 200px;">
                                {{ $status }}
                            </button>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
