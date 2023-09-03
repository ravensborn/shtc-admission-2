<div>

    <div class="mt-4"></div>
    @if(auth()->user()->hasRole('admin'))

        <p>
            <button class="btn btn-outline-primary" style="width: 200px;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#amarCollapse" aria-expanded="false" aria-controls="amarCollapse">
                ئاماری قۆناغی یەکەم
            </button>
        </p>
        <div class="collapse" id="amarCollapse" wire:ignore.self>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="card" style="direction: rtl;">
                        <div class="card-body row">
                            <div class="col-md-2 col-12">
                                <table class="table table-sm table-bordered text-center">
                                    <tbody>

                                    <tr>
                                        <td class="fw-bold">
                                            کۆی گشتی (هەموو حاڵەتەکان)
                                        </td>
                                        <td>{{ \App\Models\Student::all()->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            کۆی گشتی (وەرگیراو، دواخستن)
                                        </td>
                                        <td>{{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_ACCEPTED, \App\Models\Student::STATUS_POSTPONED])->count() }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            @foreach($statisticsByStatusArray as $item)
                                <div class="col-md-2 col-12">
                                    <table class="table table-sm table-bordered text-center">
                                        <tbody>
                                        @foreach($item as $name => $value)
                                            <tr>
                                                <td @if($loop->first) class="fw-bold" @endif>{{ $name}}</td>
                                                <td>{{ $value}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card" style="direction: rtl;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <h5>کۆی گشتی قوتابیان بەپێی بەش (وەرگیراو، دواخستن).</h5>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered text-center">
                                            @foreach($statisticsByDepArray as $item)
                                                @foreach($item as $name => $value)
                                                    <tr>
                                                        <td>{{ $name }}</td>
                                                        <td>{{ $value }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->user()->email == 'yad.hoshyar@gmail.com' || auth()->user()->email == 'abdulqadr.balen@shtc-tomar.com')

            <a href="{{ route('admin.students.export.all') }}" class="btn btn-outline-primary mb-3"
               style="width: 200px;" type="button">
                Export All
            </a>
        @endif
        @if(auth()->user()->email == 'yad.hoshyar@gmail.com' || auth()->user()->email == 'abdulqadr.balen@shtc-tomar.com')
            <a href="{{ route('admissions.create') }}" class="btn btn-outline-success mb-3"
               style="width: 200px;">
                New Student
            </a>
        @endif
    @endif




    @if(auth()->user()->hasRole('limited'))


        <p>
            <button class="btn btn-outline-primary" style="width: 200px;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#amarCollapse" aria-expanded="false" aria-controls="amarCollapse">
                ئامار
            </button>
        </p>
        <div class="collapse" id="amarCollapse" wire:ignore.self>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="card" style="direction: rtl;">
                        <div class="card-body row">
                            <div class="col-md-2 col-12">
                                <table class="table table-sm table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <td class="fw-bold">
                                            تازە تۆمارکراو
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_PENDING])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            زانکۆڵاین
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_PENDING])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 1)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            پاڕالێل
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_PENDING])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 2)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            ئێواران
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_PENDING])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 3)->count() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="col-md-2 col-12">
                                <table class="table table-sm table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <td class="fw-bold">
                                            وەرگیراو
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_ACCEPTED])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            زانکۆڵاین
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_ACCEPTED, \App\Models\Student::STATUS_POSTPONED])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 1)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            پاڕالێل
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_ACCEPTED, \App\Models\Student::STATUS_POSTPONED])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 2)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            ئێواران
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_ACCEPTED, \App\Models\Student::STATUS_POSTPONED])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 3)->count() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-2 col-12">
                                <table class="table table-sm table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <td class="fw-bold">
                                            کێشەی تێدایە
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_INCOMPLETE])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            زانکۆڵاین
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_INCOMPLETE])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 1)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            پاڕالێل
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_INCOMPLETE])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 2)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            ئێواران
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_INCOMPLETE])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 3)->count() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-2 col-12">
                                <table class="table table-sm table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <td class="fw-bold">
                                            دواخستن
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_POSTPONED])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            زانکۆڵاین
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_POSTPONED])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 1)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            پاڕالێل
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_POSTPONED])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 2)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            ئێواران
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_POSTPONED])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 3)->count() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-2 col-12">
                                <table class="table table-sm table-bordered text-center">
                                    <tbody>
                                    <tr>
                                        <td class="fw-bold">
                                            داپچڕان
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_QUIT])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            زانکۆڵاین
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_QUIT])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 1)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            پاڕالێل
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_QUIT])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 2)->count() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            ئێواران
                                        </td>
                                        <td>
                                            {{ \App\Models\Student::whereIn('status', [\App\Models\Student::STATUS_QUIT])->where('department_id', \App\Models\Student::convertRoleToDepartmentId(auth()->user()->roles[1]->name))->where('department_type_id', 3)->count() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
                    <livewire:admin.tables.students-table/>
                </div>
            </div>

        </div>
    </div>


</div>
