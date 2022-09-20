<div>
    <div class="row mt-4">
        <div class="col-4 offset-4">
            <img src="{{ asset('logos/stc.png') }}"
                 style="width: 100%"
                 alt="EPU Logo">
        </div>
    </div>

    @if(!$resultPage)

        <div class="row mt-3">
            <div class="col-12 offset-0 col-md-6 offset-md-3">

                <div class="border shadow-sm rounded p-3">
                    <div class="text-center mb-3 alert alert-info">
                        وەرگرتنەوەی ئەنجام
                    </div>
                    <div class="card-body text-center">

                        <div class="text-secondary mb-2">
                            تکایە کۆدی قوتابی بنووسە.
                        </div>

                        <div class="text-center">
                            <input type="text" placeholder="abc123" class="form-control text-center" wire:model="code">
                            <button class="btn btn-outline-secondary mt-3" wire:click="getResult()">ئەنجام</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    @else
        <div class="row mt-3">
            <div class="col-6 offset-3">

                <div class="border shadow-sm rounded p-3">
                    <div class="text-center mb-3 alert alert-info">
                        قوتابی
                        {{ $student->name_kurdish }}
                    </div>
                    <div class="card-body text-center">

                        @if($student->status == \App\Models\Student::STATUS_ACCEPTED)

                            <div class="alert alert-success">
                                قوتابی ئازیز، پیرۆزە، بەسەرکەوتوویی وەرگیرای.
                            </div>

                        @else

                            <div class="alert alert-danger">
                                هەڵە هەبوو لە زانیاریەکانت تکایە سەردانی بەشی کۆلێژ بکە.
                            </div>

                        @endif
                            <div class="text-center">
                                <button class="btn btn-outline-secondary" wire:click="resetPage">گەڕانەوە</button>
                            </div>

                    </div>
                </div>

            </div>
        </div>
    @endif


</div>
