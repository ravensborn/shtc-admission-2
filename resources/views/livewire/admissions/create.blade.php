<div>


    <div class="row">
        <div class="col-12" wire:loading wire:target="submit">
            <h4 class="text-center mt-4 alert alert-secondary">
                تکایە چاوەڕووانبە...
            </h4>
        </div>
    </div>


    <div wire:loading.remove wire:target="submit">
        @if(!$studentResultPage)
            <div class="row">
                <div class="col-12">

                    <h4 class="text-center mt-4 alert alert-secondary">
                        فۆڕمی تۆمارکردنی قوتابی
                    </h4>

                    <hr>

                    <div class="col-12 mt-3">
                        <div class="alert alert-info mb-0">
                            قوتابی ئازیز، تکایە هەموو زانیاریەکان بە درووستی بنووسە، وە لەکاتی هەبوونی هەر کێشەیەك
                            پەیوەندی بکە.

                            <ul class="mt-3">
                                <li>
                                    ئیمەیل:
                                    <span dir="ltr">
                                    <a class="text-decoration-none text-muted"
                                       href="mailto:{{ config('envAccess.HELP_EMAIL') }}">
                                        {{ config('envAccess.HELP_EMAIL') }}
                                    </a>
                                </span>
                                </li>
                                <li>
                                    ژمارەی هۆبەی تەکنیکی:
                                    <div dir="ltr">
                                        <a class="text-decoration-none text-muted"
                                           href="tel:{{ config('envAccess.TOMAR_NUMBER') }}">
                                            {{ config('envAccess.TOMAR_NUMBER_FORMATTED') }}
                                        </a>
                                    </div>
                                    <span dir="ltr">
                                      <a class="text-decoration-none text-muted"
                                         href="tel:{{ config('envAccess.DEVELOPER_NUMBER') }}">
                                        {{ config('envAccess.DEVELOPER_NUMBER_FORMATTED') }}
                                    </a>
                                </span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <form method="POST" enctype="multipart/form-data" wire:submit.prevent="submit">

                        @csrf

                        <div class="row">

                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        وێنەی قوتابی
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    تکایە وێنەی خۆت بەرزبکەوە.
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="student_photo"
                                                       id="student_photo">
                                                @error('student_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($student_photo)
                                                    <img src="{{ $student_photo->temporaryUrl() }}" alt="Student Photo"
                                                         id="student_photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="alert alert-info mb-0">
                                    تێبینی، ئەگەر زانیاری کارتی نیشتیمانی بەردەست نیە ئەوا ئەبێت بەشی ناسنامە و
                                    ڕەگەزنامە
                                    پڕبکەیەوە.
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        کارتی نیشتیمانی
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    رووی پێشەوە
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="karty_neshtemany_front_side_photo"
                                                       id="karty_neshtemany_front_side_photo" {{$disabledKartyNeshtemany}}>

                                                @error('karty_neshtemany_front_side_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($karty_neshtemany_front_side_photo)
                                                    <img src="{{ $karty_neshtemany_front_side_photo->temporaryUrl() }}"
                                                         alt="Photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    رووی پشتەوە
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="karty_neshtemany_back_side_photo"
                                                       id="karty_neshtemany_back_side_photo" {{$disabledKartyNeshtemany}}>

                                                @error('karty_neshtemany_back_side_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($karty_neshtemany_back_side_photo)
                                                    <img src="{{ $karty_neshtemany_back_side_photo->temporaryUrl() }}"
                                                         alt="Photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        ناسنامە و رەگەزنامە
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    رووی پێشەوەی ناسنامە
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="nasnama_front_side_photo"
                                                       id="nasnama_front_side_photo" {{ $disabledOldNasnama }}>
                                                @error('nasnama_front_side_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($nasnama_front_side_photo)
                                                    <img src="{{ $nasnama_front_side_photo->temporaryUrl() }}"
                                                         alt="Photo" id="nasnama_front_side_photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    رووی پشتەوەی ناسنامە
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="nasnama_back_side_photo"
                                                       id="nasnama_back_side_photo" {{$disabledOldNasnama}}>
                                                @error('nasnama_back_side_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($nasnama_back_side_photo)
                                                    <img src="{{ $nasnama_back_side_photo->temporaryUrl() }}"
                                                         alt="Photo" id="nasnama_back_side_photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    رەگەزنامە
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="ragaznama_photo"
                                                       id="ragaznama_photo" {{ $disabledOldNasnama }}>
                                                @error('ragaznama_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($ragaznama_photo)
                                                    <img src="{{ $ragaznama_photo->temporaryUrl() }}"
                                                         alt="Photo" id="ragaznama_photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        کارتی زانیاری
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    رووی پێشەوە
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="karty_zanyari_front_side_photo"
                                                       id="karty_zanyari_front_side_photo">

                                                @error('karty_zanyari_front_side_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($karty_zanyari_front_side_photo)
                                                    <img src="{{ $karty_zanyari_front_side_photo->temporaryUrl() }}"
                                                         alt="Photo" id="karty_zanyari_front_side_photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    رووی پشتەوە
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="karty_zanyari_back_side_photo"
                                                       id="karty_zanyari_back_side_photo">
                                                @error('karty_zanyari_back_side_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($karty_zanyari_back_side_photo)
                                                    <img src="{{ $karty_zanyari_back_side_photo->temporaryUrl() }}"
                                                         alt="Photo" id="karty_zanyari_back_side_photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        پسوولەی خۆراک
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    پسوولەی خۆراک
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="psulay_xorak_photo"
                                                       id="psulay_xorak_photo">
                                                @error('psulay_xorak_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($psulay_xorak_photo)
                                                    <img src="{{ $psulay_xorak_photo->temporaryUrl() }}"
                                                         alt="Photo" id="psulay_xorak_photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        پشتگیری نیشتەجێبوون
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    پشتگیری نیشتەجێبوون
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="pshtgere_neshtajebwn_photo"
                                                       id="pshtgere_neshtajebwn_photo">
                                                @error('pshtgere_neshtajebwn_photo')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($pshtgere_neshtajebwn_photo)
                                                    <img src="{{ $pshtgere_neshtajebwn_photo->temporaryUrl() }}"
                                                         alt="Photo"
                                                         id="pshtgere_neshtajebwn_photo"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        بڕوانامەی پۆلی ١٢
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    بڕوانامەی پۆلی ١٢
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="brwanama_12"
                                                       id="brwanama_12">
                                                @error('brwanama_12')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($brwanama_12)
                                                    <img src="{{ $brwanama_12->temporaryUrl() }}" alt="Photo"
                                                         id="brwanama_12"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        بەڵێننامە (کفالە)
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    بەڵێننامە (کفالە)
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="kafala"
                                                       id="kafala">
                                                @error('kafala')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($kafala)
                                                    <img src="{{ $kafala->temporaryUrl() }}" alt="Photo"
                                                         id="kafala"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        پشکنینی پزیشکی
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    پشکنینی پزیشکی
                                                </div>
                                                <input type="file" class="form-control-file"
                                                       wire:model.lazy="pshknini_pzishki"
                                                       id="pshknini_pzishki">
                                                @error('pshknini_pzishki')
                                                <div class="text-danger text-start" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                @if($pshknini_pzishki)
                                                    <img src="{{ $pshknini_pzishki->temporaryUrl() }}" alt="Photo"
                                                         id="pshknini_pzishki"
                                                         class="img-thumbnail float-end"
                                                         style="width: auto; height: 100px;">
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-12 mt-3">-->
                            <!--    <div class="card border">-->
                            <!--        <div class="card-header">-->
                            <!--            پسووڵەی دارایی-->
                            <!--        </div>-->
                            <!--        <div class="card-body">-->
                            <!--            <div class="row">-->
                            <!--                <div class="col-6">-->
                            <!--                    <div class="mb-3">-->
                            <!--                        پسووڵەی دارایی-->
                            <!--                    </div>-->
                            <!--                    <input type="file" class="form-control-file"-->
                            <!--                           wire:model.lazy="daray_psula"-->
                            <!--                           id="daray_psula">-->
                            <!--                    @error('daray_psula')-->
                            <!--                    <div class="text-danger text-start" dir="ltr">{{ $message }}</div>-->
                            <!--                    @enderror-->
                            <!--                </div>-->
                            <!--                <div class="col-6">-->
                            <!--                    @if($daray_psula)-->
                            <!--                        <img src="{{ $daray_psula->temporaryUrl() }}" alt="Photo"-->
                            <!--                             id="daray_psula"-->
                            <!--                             class="img-thumbnail float-end"-->
                            <!--                             style="width: auto; height: 100px;">-->
                            <!--                    @endif-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        زانیاری قوتابی
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="name_kurdish" class="form-label">ناوی قوتابی</label>
                                                    <input type="text" class="form-control"
                                                           wire:model.lazy="name_kurdish"
                                                           id="name_kurdish">
                                                </div>
                                                @error('name_kurdish')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="name_english" class="form-label">ناوی قوتابی
                                                        بەئینگلیزی</label>
                                                    <input type="text" class="form-control"
                                                           wire:model.lazy="name_english"
                                                           id="name_english">
                                                </div>
                                                @error('name_english')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="gender" class="form-label">رەگەز</label>
                                                    <select wire:model.lazy="gender" id="gender" class="form-control">
                                                        <option>-- دانەیەک هەڵبژێرە --</option>
                                                        <option value="1">مێ</option>
                                                        <option value="2">نێر</option>
                                                    </select>
                                                </div>
                                                @error('gender')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="birthday" class="form-label">بەرواری لەدایکبوون</label>
                                                    <input type="date" class="form-control" wire:model.lazy="birthday"
                                                           id="birthday">
                                                </div>
                                                @error('birthday')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="birthplace" class="form-label">شوێنی لەدایكبوون</label>
                                                    <input type="text" class="form-control" wire:model.lazy="birthplace"
                                                           id="birthplace">
                                                </div>
                                                @error('birthplace')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="phone" class="form-label">ژمارەی مۆبایلی قوتابی</label>
                                                    <input type="text" class="form-control" id="phone"
                                                           wire:model.lazy="phone"
                                                           placeholder="+9647501234567" dir="ltr">
                                                </div>
                                                @error('phone')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="nationality" class="form-label">نەتەوە</label>
                                                    <input type="text" class="form-control"
                                                           wire:model.lazy="nationality"
                                                           id="nationality">
                                                </div>
                                                @error('nationality')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="school" class="form-label">دەرچووی ئامادەیی</label>
                                                    <input type="text" class="form-control" wire:model.lazy="school"
                                                           id="school">
                                                </div>
                                                @error('school')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="education_type_id" class="form-label">لق</label>
                                                    <select wire:model.lazy="education_type_id" id="education_type_id"
                                                            class="form-control">
                                                        <option>-- دانەیەک هەڵبژێرە --</option>
                                                        <option value="1">
                                                            وێژەیی
                                                        </option>
                                                        <option value="2">
                                                            زانستی
                                                        </option>
                                                        <option value="3">
                                                            پیشەیی
                                                        </option>
                                                    </select>
                                                    @error('education_type_id')
                                                    <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="department_type_id" class="form-label">جۆری
                                                        خوێندن</label>
                                                    <select wire:model.lazy="department_type_id" id="department_type_id"
                                                            class="form-control">
                                                        <option>-- دانەیەک هەڵبژێرە --</option>
                                                        <option value="1">
                                                            زانکۆڵاین
                                                        </option>
                                                        <option value="2">
                                                            پاڕالێل
                                                        </option>
                                                        <option value="3">
                                                            ئێواران
                                                        </option>

                                                    </select>
                                                    @error('department_type_id')
                                                    <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="department" class="form-label">بەشی وەرگیراو</label>
                                                    <select wire:model.lazy="department_id" id="department_id"
                                                            class="form-control">
                                                        <option>-- دانەیەک هەڵبژێرە --</option>
                                                        <option value="1">
                                                            تەکنەلۆجیای زانیاری
                                                        </option>
                                                        <option value="2">سیستەمی
                                                            زانیاری
                                                            کارگێڕی
                                                        </option>
                                                        <option value="3">کارگێڕی
                                                            کار
                                                        </option>
                                                        <option value="4">
                                                            ڤێتەرنەری
                                                        </option>
                                                        <option value="5">
                                                            پەرستاری
                                                        </option>
                                                        <option value="6">شیکاری
                                                            نەخۆشیەکان
                                                        </option>
                                                        <option value="7">
                                                            تەلارسازی
                                                        </option>
                                                        <option value="8">
                                                            بیناکاری
                                                        </option>
                                                        <option value="9">دەزگای
                                                            کارگێڕی
                                                            گەشتیاری
                                                        </option>
                                                    </select>
                                                    @error('department_id')
                                                    <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="degree_total" class="form-label">کۆنمرەی پۆلی دوانزە
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           wire:model.lazy="degree_total"
                                                           id="degree_total">
                                                </div>
                                                @error('degree_total')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="student_type_id" class="form-label">جۆری قوتابی</label>
                                                    <select wire:model.lazy="student_type_id" id="student_type_id"
                                                            class="form-control">
                                                        <option>-- دانەیەک هەڵبژێرە --</option>
                                                        <option value="1">
                                                            دەرەکی
                                                        </option>
                                                        <option value="2">
                                                            ناوەکی
                                                        </option>
                                                    </select>
                                                </div>
                                                @error('student_type_id')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="religion" class="form-label">ئایین</label>
                                                    <input type="text" class="form-control"
                                                           wire:model.lazy.lazy="religion"
                                                           id="religion">
                                                    @error('religion')
                                                    <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="bloodgroup_id" class="form-label">گرووپی خوێن</label>
                                                    <select wire:model.lazy="bloodgroup_id" id="bloodgroup_id"
                                                            class="form-control">
                                                        <option>-- دانەیەک هەڵبژێرە --</option>
                                                        <option value="1">A+
                                                        </option>
                                                        <option value="2">A-
                                                        </option>
                                                        <option value="3">B+
                                                        </option>
                                                        <option value="4">B-
                                                        </option>
                                                        <option value="5">AB+
                                                        </option>
                                                        <option value="6">AB-
                                                        </option>
                                                        <option value="7">O+
                                                        </option>
                                                        <option value="8">O-
                                                        </option>
                                                    </select>
                                                </div>
                                                @error('bloodgroup_id')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card border">
                                    <div class="card-header">
                                        زانیاری بەخێوکەر
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div>
                                                    <label for="parent_name" class="form-label">ناوی بەخێوکەر</label>
                                                    <input type="text" class="form-control"
                                                           wire:model.lazy="parent_name"
                                                           id="parent_name">
                                                </div>
                                                @error('parent_name')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="parent_occupation" class="form-label">پیشەی
                                                        بەخێوکەر</label>
                                                    <input type="text" class="form-control"
                                                           wire:model.lazy="parent_occupation"
                                                           id="parent_occupation">
                                                </div>
                                                @error('parent_occupation')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <div>
                                                    <label for="parent_phone" class="form-label">ژمارەی مۆبایلی
                                                        بەخێوکەر</label>
                                                    <input type="text" class="form-control" id="parent_phone"
                                                           wire:model.lazy="parent_phone"
                                                           placeholder="+9647501234567"
                                                           dir="ltr">
                                                </div>
                                                @error('parent_phone')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-12 mt-3">
                            <div class="card border">
                                <div class="card-header">
                                    زانیاری قوتابی
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="province_id" class="form-label">پارێزگا</label>
                                                <select wire:model.lazy="province_id" id="province_id"
                                                        class="form-control">
                                                    <option>-- دانەیەک هەڵبژێرە --</option>
                                                    <option value="1">هەولێر
                                                    </option>
                                                    <option value="2">سلێمانی
                                                    </option>
                                                    <option value="3">دهۆک</option>
                                                    <option value="4">هەڵەبجە
                                                    </option>
                                                    <option value="5">کەرکووک
                                                    </option>
                                                </select>
                                                @error('province_id')
                                                <div class="text-danger" dir="ltr">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-3 mt-md-0">
                                            <div>
                                                <label for="district" class="form-label">قەزا</label>
                                                <input type="text" class="form-control" wire:model.lazy="district"
                                                       id="district">
                                            </div>
                                            @error('district')
                                            <div class="text-danger" dir="ltr">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-3 mt-md-0">
                                            <div>
                                                <label for="sub_district" class="form-label">ناحیە</label>
                                                <input type="text" class="form-control" wire:model.lazy="sub_district"
                                                       id="sub_district">
                                            </div>
                                            @error('sub_district')
                                            <div class="text-danger" dir="ltr">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="village_name" class="form-label">گوند</label>
                                                <input type="text" class="form-control" wire:model.lazy="village_name"
                                                       id="village_name">
                                            </div>
                                            @error('village_name')
                                            <div class="text-danger" dir="ltr">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-3 mt-md-0">
                                            <div>
                                                <label for="street" class="form-label">گەڕەك</label>
                                                <input type="text" class="form-control" wire:model.lazy="street"
                                                       id="street">
                                            </div>
                                            @error('street')
                                            <div class="text-danger" dir="ltr">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-3 mt-md-0">
                                            <div>
                                                <label for="nearest_place" class="form-label">نزیکترین شوێن</label>
                                                <input type="text" class="form-control" wire:model.lazy="nearest_place"
                                                       id="nearest_place">
                                            </div>
                                            @error('nearest_place')
                                            <div class="text-danger" dir="ltr">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" style="width: 200px;">ناردن</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        @else
            <div class="row mt-4">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            تۆماری قوتابی
                        </div>
                        <div class="card-body text-center">

                            <div class="alert alert-success">
                                زانیاریەکانت بە سەرکەوتوویی تۆمارکرا
                            </div>

                            <div>
                                @if($student->hasMedia('student-photo'))
                                    <img src="{{ $student->getFirstMediaUrl('student-photo') }}"
                                         class="img-thumbnail"
                                         style="width: 200px; height: auto;"
                                         alt="Student Photo">
                                @endif
                            </div>
                            <div>
                                کۆد:
                                {{ $student->code }}
                            </div>

                            <div>
                                قوتابی ئەزیز، چاوەڕێی ئەنجام بکە.
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        @endif

    </div>


</div>
