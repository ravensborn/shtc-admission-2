<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPU - Admissions</title>

    @if(isset($enableRtl) && $enableRtl)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favico/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favico/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favico/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favico/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favico/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('favico/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="{{ asset('favico/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <style>
        [x-cloak] {
            display: none;
        }

        .dynamic-text {
            font-size: 3.0vh !important;
        }
    </style>

    @livewireStyles
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" style="margin-right: var(--bs-navbar-brand-margin-end) !important; margin-left: 0 !important;"
           href="{{ route('home') }}">

            <img src="{{ asset('logos/epu-logo.png') }}" alt="EPU Logo" width="64px" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
              <span class="navbar-text">

                   <a class="nav-link aria-current="
                      href="{{ route('home') }}">
                  {{ config('envAccess.COLLEGE_NAME') }}
                  </a>
      </span>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link @if(request()->is('/')) active @endif" aria-current="page"
                       href="{{ route('home') }}">سەرەتا</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('about') }}">دەربارە</a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<div class="container">

    @yield('content')

    @include('pages.footer')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

@livewireScripts

<script>
    window.livewire_app_url = '{{route('home')}}';
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts/>

</body>
</html>
