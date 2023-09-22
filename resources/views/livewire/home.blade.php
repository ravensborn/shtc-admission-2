<div>
    @if(auth()->check())

        <div class="row mt-5">

            <div class="col-12">

                <div class="alert alert-info" style="direction: ltr;">
                    You are logged in,
                    click <a href="{{ route('admin.dashboard') }}">here</a> to navigate to dashboard.
                </div>
            </div>

        </div>

    @endif
    <div class="row mt-5">
        <div class="col-12">


            <div class="row">
                <div class="col-12">
                    <div class="row mb-3 text-center">
                        <div class="col-12">
                            <img src="{{ asset('logos/epu.png') }}"
                                 style="width: 250px;"
                                 alt="EPU Logo">
                        </div>
                    </div>
                    <div class="rounded p-3" style="background-color: #f8f9fa;">

                        <div class="text-center text-md-start">
                            <h4>{{ config('envAccess.COLLEGE_NAME') }} - Admissions</h4>
                            <p>
                                Erbil Polytechnic University (EPU) is proud to announce the launch of its innovative and
                                streamlined student admission system, designed to revolutionize the process of admitting
                                future scholars into our esteemed institution. This cutting-edge system represents a
                                significant milestone in EPU's commitment to providing a seamless and efficient
                                experience for prospective students, ensuring that the journey to academic excellence
                                begins with a user-friendly and transparent admissions process. With a focus on
                                accessibility, convenience, and fairness, the new student admission system at EPU stands
                                as a testament to our dedication to fostering educational opportunities and welcoming
                                the brightest minds into our vibrant academic community.
                            </p>
                            <p>
                                To begin the registration process, please click on the "فۆڕمی تۆمارکردنی
                                قوتابی" button.
                            </p>

                            @if(config('envAccess.ALLOW_REGISTER'))

                                <div class="text-center border-top pt-3">

                                    <a href="{{ route('admissions.create')  }}" class="btn btn-outline-primary mb-1">فۆڕمی
                                        تۆمارکردنی
                                        قوتابی</a>
                                    <button class="btn btn-outline-warning mb-1" data-bs-toggle="modal"
                                            data-bs-target="#tutorialModal">
                                        فێرکاری تۆمارکردن
                                    </button>
                                    <button class="btn btn-outline-info mb-1" data-bs-toggle="modal"
                                            data-bs-target="#helpModal">
                                        پەیوەندی
                                    </button>

                                </div>
                            @else
                                <div class="text-start text-warning">
                                    <i class="bi bi-info-circle"></i>
                                    The application form has not yet become available.
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="helpModalLabel">Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="mt-3">
                        <li>
                            E-Mail Address:
                            <span dir="ltr">
                                    <a class="text-decoration-none text-muted"
                                       href="mailto:{{ config('envAccess.HELP_EMAIL') }}">
                                        {{ config('envAccess.HELP_EMAIL') }}
                                    </a>
                                </span>
                        </li>
                        <li>
                            @if(config('envAccess.SUPPORT_PRIMARY_PHONE_NUMBER'))
                                Available Phone Numbers:
                                <div dir="ltr">
                                    <div>
                                        <a class="text-decoration-none text-muted"
                                           href="tel:{{ config('envAccess.SUPPORT_PRIMARY_PHONE_NUMBER') }}">
                                            {{ config('envAccess.SUPPORT_PRIMARY_PHONE_NUMBER') }}
                                        </a>
                                    </div>
                                    @if(config('envAccess.SUPPORT_SECONDARY_PHONE_NUMBER'))
                                        <div>
                                            <a class="text-decoration-none text-muted"
                                               href="tel:{{ config('envAccess.SUPPORT_SECONDARY_PHONE_NUMBER') }}">
                                                {{ config('envAccess.SUPPORT_SECONDARY_PHONE_NUMBER') }}
                                            </a>
                                        </div>

                                    @endif
                                </div>
                            @endif
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
                    <h5 class="modal-title" id="tutorialModalLabel">
                        Registration Tutorial
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <video width="100%" height="315" controls>
                        <source src="{{ asset('tutorial.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>

</div>
