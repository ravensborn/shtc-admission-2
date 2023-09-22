<div>

    <div class="row mt-4">

       <div class="row">
           <div class="col-12 py-3 rounded" style="background-color: #f8f9fa;">


                   <div class="text-center">

                       <h5>{{ $student->name_kurdish }}</h5>
                       <h6>{{ $student->name_english }}</h6>
                       <div>
                           <div>{{ $student->code }} - {{ \App\Models\Student::getStatusName($student->status) }} - {{ \App\Models\Student::getStageStatuses()[$student->stage] }}</div>
                           <hr>
                           <div class="d-flex justify-content-center align-items-center gap-1">

                               <div>
                                   <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.dashboard') }}">
                                       <i class="bi bi-caret-left"></i>
                                       Back
                                   </a>
                               </div>

                               <div>
                                   <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.students.edit', $student->id) }}">
                                       <i class="bi bi-pen"></i>
                                       Edit Student
                                   </a>
                               </div>
                           </div>

                           <div class="d-flex justify-content-center align-items-center gap-1 mt-2" style="direction: rtl;">
                               <div>
                                   <label>
                                       <select class="form-control form-control-sm" id="status" wire:model="status">
                                           @foreach(\App\Models\Student::getStatusArray() as $id => $name)
                                               @if($id == \App\Models\Student::STATUS_DEFAULT)
                                                   @continue
                                               @endif
                                               <option value="{{ $id }}"> {{ $name }}</option>
                                           @endforeach
                                       </select>
                                   </label>
                               </div>

                               <div>
                                   <label>
                                       <select class="form-control form-control-sm" id="stage" wire:model="stage">

                                           @foreach(\App\Models\Student::getStageStatuses() as $id => $name)
                                               <option value="{{ $id }}"> {{ $name }}</option>
                                           @endforeach

                                       </select>
                                   </label>
                               </div>

                           </div>
                       </div>
                   </div>


           </div>
       </div>

        <div class="row">
            <div class="col-12 mt-3 border rounded">
                <div class="table-responsive">
                    <table class="table table-sm table-ltr">
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
                            <td>ئیمەیل</td>
                            <td>{{ $student->email }}</td>
                            <td>ناوی بەخێوکەر:</td>
                            <td>{{ $student->parent_name }}</td>
                        </tr>
                        <tr>
                            <td>کۆدی زانکۆڵاین:</td>
                            <td>{{ $student->school_code }}</td>
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
                            <td>{{ $student->department->name }}</td>
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
        </div>


        <div class="row">
            <div class="col-12 rounded border py-2 mt-3">
                <div class="">
                    <div style="direction: rtl;">
                        هاوپێچەکان
                    </div>
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

                            @if($student->hasMedia('farmany_wargrtn'))
                                <div class="col-6 col-sm-1 text-center">
                                    <a href="{{  $student->getFirstMedia('farmany_wargrtn')->getFullUrl() }}">
                                        <img
                                            style="width: 128px"
                                            class="img-thumbnail"
                                            src="{{ $student->getFirstMedia('farmany_wargrtn')->getFullUrl() }}"
                                            alt="Student Attachment">
                                    </a>
                                    <p>
                                        فەرمانی وەرگرتن
                                    </p>
                                </div>
                            @endif

                            @if($student->hasMedia('farmany_wargrtn_names'))
                                <div class="col-6 col-sm-1 text-center">
                                    <a href="{{  $student->getFirstMedia('farmany_wargrtn_names')->getFullUrl() }}">
                                        <img
                                            style="width: 128px"
                                            class="img-thumbnail"
                                            src="{{ $student->getFirstMedia('farmany_wargrtn_names')->getFullUrl() }}"
                                            alt="Student Attachment">
                                    </a>
                                    <p>
                                         فەرمانی وەرگرتن - لیستی ناوەکان
                                    </p>
                                </div>
                            @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-3 border rounded-1 p-2">
                <div dir="rtl">
                    <label for="note" >تێبینی</label>
                    <textarea id="note" class="form-control mt-1" name="" id="" cols="30" rows="10" wire:model="note"></textarea>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-primary btn-sm mt-2" style="width: 160px;" wire:click.prevent="saveNote">Save Note</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
