<div>

    <div class="mt-4"></div>

    <div class="rounded p-3 mb-3" style="background-color: #f8f9fa;">
        <h4>Student Statistics</h4>

        <p>
            Statistics page, provides a simple but comprehensive overview of student admissions and their current status
            within your educational institution. This page offers valuable insights into the admissions process and the
            progress of students.
        </p>

        <hr>

        @if(auth()->user()->hasRole('admin'))

            <h5>System Statistics</h5>

            <div style="direction: rtl;" class="row">
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
            <div style="direction: rtl;" class="row">
                <div class="col-md-6 col-12">
                    <h5>کۆی گشتی قوتابیان بەپێی بەش (وەرگیراو، دواخستن).</h5>
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

        @endif

        @if(!auth()->user()->hasRole('admin') && auth()->user()->department_id)

            <h5>Department Specific Statistics</h5>

            <div class="row" style="direction: rtl;">
                @foreach($departmentSpecificStatisticsByStatusAndType as $type)
                    <div class="col-md-2 col-12">
                        <table class="table table-sm table-bordered text-center">
                            <tbody>

                            @foreach($type['data'] as $data)
                                <tr>
                                    <td>
                                        {{ $data['data'] }}
                                    </td>
                                    <td class="fw-bold">
                                        {{ $data['title'] }}
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                @endforeach

            </div>

        @endif


    </div>


</div>
