<div>

    <div class="row mt-4">

        <div class="col-12 col-md-9">
            <div class="alert alert-info shadow-sm h-100">
                <h5>Viewing {{ $student->number }}</h5>
                <div>Student Code: {{ $student->code }}</div>
                <div>Register Date: {{ $student->created_at->format('d-m-Y') }}</div>
                <div>Current Status: {{ $student->getStatusName($student->status) }}</div>
                <div class="mt-2 text-end">
                    <a href="{{ route('admin.students.edit', $student->id) }}" style="text-decoration: none;">
                        دەستکاری کردنی زانیاری قوتابی
                    </a>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-3 mt-3 mt-md-0">
            <div class="alert alert-info shadow-sm h-100">
                <label for="status">Update Status</label>
                <select class="form-control form-control-sm mt-2" id="status" wire:model="status">

                    @foreach(\App\Models\Student::getStatusArray() as $id => $name)
                        @if($id == \App\Models\Student::STATUS_DEFAULT)
                            @continue
                        @endif
                        <option value="{{ $id }}"> {{ $name }}</option>
                    @endforeach

{{--                    @if($student->status == \App\Models\Student::STATUS_PENDING)--}}
{{--                        <option value="{{ \App\Models\Student::STATUS_INCOMPLETE }}"> {{ \App\Models\Student::getStatusArray()[\App\Models\Student::STATUS_INCOMPLETE] }}</option>--}}
{{--                        <option value="{{ \App\Models\Student::STATUS_ACCEPTED }}"> {{ \App\Models\Student::getStatusArray()[\App\Models\Student::STATUS_ACCEPTED] }}</option>--}}
{{--                    @else--}}
{{--                        @foreach(\App\Models\Student::getStatusArray() as $id => $name)--}}
{{--                            @if($id == \App\Models\Student::STATUS_DEFAULT)--}}
{{--                                @continue--}}
{{--                            @endif--}}
{{--                            <option value="{{ $id }}"> {{ $name }}</option>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}


                </select>
            </div>
        </div>
        <div class="col-12 mt-3">

            <div class="table-responsive">
                <table class="table table-bordered table-sm table-ltr shadow-sm">
                    <tbody>
                    <tr>
                        <th colspan="2">
                            زانیاری قوتابی
                        </th>
                        <th colspan="2">
                            {{--                            زانیاری بەخێوکەر--}}
                        </th>
                    </tr>
                    <tr>
                        <td>ناو:</td>
                        <td>{{ $student->name_kurdish }}</td>
                        <td>ناوی بەخێوکەر:</td>
                        <td>{{ $student->parent_name }}</td>
                    </tr>
                    <tr>
                        <td>ناو بە ئینگلیزی:</td>
                        <td>{{ $student->name_english }}</td>
                        <td>پیشەی بەخێوکەر:</td>
                        <td>{{ $student->parent_occupation }}</td>
                    </tr>
                    <tr>
                        <td>رەگەز:</td>
                        <td>{{ $student->getGender() }}</td>
                        <td>ژمارەی مۆبایلی بەخێوکەر:</td>
                        <td>{{ $student->parent_phone }}</td>
                    </tr>
                    <tr>
                        <td>بەرواری لەدایكبوون:</td>
                        <td>{{ $student->birthday->format('d-m-Y') }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>شوێنی لەدایكبوون:</td>
                        <td>{{ $student->birthplace }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>نەتەوە:</td>
                        <td>{{ $student->nationality }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>دەرچووی ئامادەیی:</td>
                        <td>{{ $student->school }}</td>
                        <td>پارێزگا:</td>
                        <td>{{ $student->getProvince() }}</td>
                    </tr>
                    <tr>
                        <td>لق:</td>
                        <td>{{ $student->getEducationType() }}</td>
                        <td>قەزا:</td>
                        <td>{{ $student->district }}</td>
                    </tr>
                    <tr>
                        <td>جۆری خوێندن:</td>
                        <td>{{ $student->getDepartmentType() }}</td>
                        <td>ناحیە:</td>
                        <td>{{ $student->sub_district }}</td>
                    </tr>
                    <tr>
                        <td>بەشی وەرگیراو:</td>
                        <td>{{ $student->getDepartment() }}</td>
                        <td>گوند:</td>
                        <td>{{ $student->viallage_name }}</td>
                    </tr>
                    <tr>
                        <td> کۆنمرە:</td>
                        <td>{{ $student->degree_total }}</td>
                        <td>گەڕەک:</td>
                        <td>{{ $student->street }}</td>
                    </tr>
                    <tr>
                        <td>جۆری قوتابی:</td>
                        <td>{{ $student->getStudentType() }}</td>
                        <td>نزیکترین شوێن:</td>
                        <td>{{ $student->nearest_place }}</td>
                    </tr>
                    <tr>
                        <td>ئایین:</td>
                        <td>{{ $student->religion }}</td>
                        <th>زانیاری زیاتر</th>
                        <td></td>
                    </tr>
                    <tr>
                        <td>گرووپی خوێن:</td>
                        <td>{{ $student->getBloodgroup() }}</td>
                        <td>جۆری ناسنامە</td>
                        <td>{{ $student->getUploadedIdType() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12">
            <div class="shadow-sm border rounded-1 p-2">
                Attachments
                <hr>
                <div class="row">
                    @if($student->hasMedia('student-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{ $student->getFirstMedia('student-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('student-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                وێنەی قوتابی
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('national-id-front-side'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{ $student->getFirstMedia('national-id-front-side')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('national-id-front-side')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                کارتی نیشتیمانی - رووی پێشەوە
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('national-id-back-side'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{ $student->getFirstMedia('national-id-back-side')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('national-id-back-side')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                کارتی نیشتیمانی - رووی پشتەوە
                            </p>
                        </div>
                    @endif

                    @if($student->hasMedia('id-front-side-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{ $student->getFirstMedia('id-front-side-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('id-front-side-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                ناسنامە - رووی پێشەوە
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('id-back-side-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{ $student->getFirstMedia('id-back-side-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('id-back-side-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                ناسنامە - رووی پشتەوە
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('nationality-card-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{ $student->getFirstMedia('nationality-card-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('nationality-card-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                رەگەزنامە
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('karty-zanyari-front-side-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{ $student->getFirstMedia('karty-zanyari-front-side-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('karty-zanyari-front-side-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                کارتی زانیاری - رووی پێشەوە
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('karty-zanyari-back-side-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{ $student->getFirstMedia('karty-zanyari-back-side-photo')->getFullUrl()}}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('karty-zanyari-back-side-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                کارتی زانیاری - رووی پشتەوە
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('residency-confirmation-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{  $student->getFirstMedia('residency-confirmation-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('residency-confirmation-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                پشتگیری نیشتەجێبوون
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('food-card-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{  $student->getFirstMedia('food-card-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('food-card-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                پسووڵەی خۆراک
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('brwanama-12-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{  $student->getFirstMedia('brwanama-12-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('brwanama-12-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                بڕوانامەی پۆلی ١٢
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('kafala-photo'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{  $student->getFirstMedia('kafala-photo')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('kafala-photo')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                بەڵگەنامە (کەفالە)
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('pshknini_pzishki'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{  $student->getFirstMedia('pshknini_pzishki')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('pshknini_pzishki')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                پشکنینی پزیشکی
                            </p>
                        </div>
                    @endif
                    @if($student->hasMedia('daray_psula'))
                        <div class="col-6 col-sm-1 text-center">
                            <a href="{{  $student->getFirstMedia('daray_psula')->getFullUrl() }}">
                                <img
                                        style="width: 128px"
                                        class="img-thumbnail"
                                        src="{{ $student->getFirstMedia('daray_psula')->getFullUrl() }}"
                                        alt="Student Attachment">
                            </a>
                            <p>
                                پسووڵەی دارایی
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
