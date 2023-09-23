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
        <a class="navbar-brand" href="{{ route('home') }}">

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

                @if(auth()->check() && auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link @if(request()->is('/')) active @endif" aria-current="page"
                       href="{{ route('home') }}">Home</a>
                </li>

                @if(config('envAccess.ALLOW_REGISTER'))
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('admissions/create')) active @endif"
                           href="{{ route('admissions.create') }}">Application Form</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('about') }}">About</a>
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
