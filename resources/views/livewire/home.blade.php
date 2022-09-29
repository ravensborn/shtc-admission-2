<div>
    @if(auth()->check())

        <div class="row mt-5">

            <div class="col-12">

                <div class="alert alert-info" style="direction: ltr;">
                    You are logged in as admin,
                    click <a href="{{ route('admin.select') }}">here</a> to navigate to dashboard.
                </div>
            </div>

        </div>

    @endif
    <div class="row mt-5">
        <div class="col-12 text-center">

            <div class="row pb-3 fw-bold" style="font-size: 42px; color: #084298">
                کۆلێژی تەکنیکی شەقڵاوە
            </div>

            <div class="row border-bottom pb-3">
                <div class="col-6 col-md-3">
{{--                    <img src="{{ asset('logos/epu.png') }}"--}}
{{--                         style="width: 100%"--}}
{{--                         alt="EPU Logo">--}}
                </div>
                <div class="col-6 col-md-3">
{{--                    <img src="{{ asset('logos/stc.png') }}"--}}
{{--                         style="width: 100%"--}}
{{--                         alt="EPU Logo">--}}
                </div>
            </div>


            <div class="row border-bottom pb-4 mt-4">
                <div class="col-12 text-start">
                    <a href="{{ route('admissions.create')  }}" class="btn btn-outline-primary">فۆڕمی تۆمارکردنی
                        قوتابی</a>
                    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#tutorialModal">
                        فێرکاری تۆمارکردن
                    </button>
                    <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#helpModal">پەیوەندی
                    </button>
                </div>
            </div>


            <div class="row pb-3">
                <div class="col-12">
                    <p class="mt-4 fw-bold text-start">
                        کورتەیەک دەربارەى دامەزراندنى کۆلێژی تەکنیکى شەقڵاوە
                    </p>
                    <p class="text-start">
                        بەخشینى زانست بە قوتابیان ودەرچوانیان لە کۆلێژی تەکنیکى شەقڵاوە دەستکەوتێکى گەورەیە بۆ شارى
                        شەقڵاوە ودانیشتوانەکەى وپێویستێکى سەردەمى مۆدێرن وبەرەو پێش بردنى زانست وسوود مەندى خەڵکى
                        شەقڵاوە بوو بۆ تەواو کردنى خوێندن ودەستکەوتێکى گەورە بۆ قوتابیە هەژارەکان و کەم دەرامەتەکان
                        کەنەیان دەتوانی درێژە بە خوێندنى خۆیان بدەن دوور لە ماڵەوە.
                    </p>
                    <p class="mt-3 text-start">
                        بۆیە بە پێ بریارى ئەنجوومەنى فێرکردنى
                        باڵا ژمارە (٥) لە ٢٨/٨/١٩٩٧ ولە گەڵ دەست بە کاربوونى کابینى سێ یەمى حکومەتى هەرێمێ کوردستان لە
                        ژێر چاودێرى شەهید (سامى عبدالرحمان) ئەم دیاریە پێشکەش بە شەقڵاوە کرا.
                    </p>
                    <p class="mt-3 text-start">
                        کۆلێژەکە یەکەم ساڵى
                        خوێندنى لە ناو باڵاخانەى پەیمانگەى تەکنیکى هەولێر دەستى بە وەرگرتنى قوتبیان کرد کە ژمارەیان (٢٧)
                        قوتابیى بوو بە کردنەوەى بەشى کارگێرى ئوتێل وگەشت وگوزار. وە لە ٢٥-٩-١٩٩٩ کۆلێژی بۆ ساڵى دووەم
                        ١٩٩٩-٢٠٠٠ گواستراوە بۆ شەقڵاوە.
                    </p>
                    <p class="mt-3 text-start">
                        کۆلێژی تەکنیکی شەقڵاوە پێكدێت لەم بەشانە:
                    <ul class="text-start">
                        <li>
                            تەکنەلۆجیای زانیاری
                        </li>
                        <li>سیستەمی
                            زانیاری
                            کارگێڕی
                        </li>
                        <li>کارگێڕی
                            کار
                        </li>
                        <li>
                            ڤێتەرنەری
                        </li>
                        <li>
                            پەرستاری
                        </li>
                        <li>شیکاری
                            نەخۆشیەکان
                        </li>
                        <li>
                            تەلارسازی
                        </li>
                        <li>
                            بیناکاری
                        </li>
                        <li>دەزگای
                            کارگێڕی
                            گەشتیاری
                        </li>
                    </ul>
                    </p>
                </div>
            </div>


        </div>
    </div>

    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="helpModalLabel">پەیوەندی</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                            ژمارەی هۆبەی تۆماری کۆلێژ:
                            <span dir="ltr">
                                    <a class="text-decoration-none text-muted"
                                       href="tel:{{ config('envAccess.TOMAR_NUMBER') }}">
                                        {{ config('envAccess.TOMAR_NUMBER_FORMATTED') }}
                                    </a>
                                </span>
                        </li>
                        <li>
                            ژمارەی هۆبەی تەکنیکی:
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
        </div>
    </div>


    <div class="modal fade" id="tutorialModal" tabindex="-1" aria-labelledby="tutorialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tutorialModalLabel">فێرکاری تۆمارکردن</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="315"
                            src="https://www.youtube.com/embed/qZXt1Aom3Cs?controls=0&amp;start=2160"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

</div>
