<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHTC - Admissions</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css">

    <style>
        [x-cloak] {
            display: none;
        }

        .table-ltr {
            direction: rtl !important;
        }

        .table-ltr * {
            direction: rtl !important;
        }
    </style>

    @livewireStyles
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">

            <img src="{{ asset('logos/epu-logo.png') }}" alt="EPU Logo" width="64px" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link @if(request()->is('admin/dashboard')) active @endif" aria-current="page"--}}
{{--                       href="{{ route('admin.dashboard') }}@if(request()->has('status_id'))?status_id={{ request()->get('status_id') }} @endif">Home</a>--}}
{{--                </li>--}}

                <li class="nav-item">
                    <a class="nav-link @if(request()->is('/')) active @endif" aria-current="page"
                       href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if(request()->is('admin/select')) active @endif" aria-current="page"
                       href="{{ route('admin.select') }}">Sections</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                       href="{{ route('admin.logout') }}">Logout</a>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link"--}}
{{--                       href="{{ route('admissions.create') }}">New Admission</a>--}}
{{--                </li>--}}

            </ul>
            <span class="navbar-text">
        {{ config('envAccess.COLLEGE_NAME') }}
      </span>
        </div>
    </div>
</nav>


<div class="container">

    @yield('content')


    <footer class="footer my-5 pt-3 border-top">
        <div class="container">
            <span class="text-muted">Copyright &copy; {{ Date('Y') }} - </span>
            <span>
            <span class="text-muted">
                  {{ config('envAccess.COLLEGE_NAME') }}
            </span>
        </span>


        </div>
    </footer>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>

@livewireScripts

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts/>



</body>
</html>