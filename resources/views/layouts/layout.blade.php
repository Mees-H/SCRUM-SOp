<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Special Golf Haverleij</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- boostrap required voor slider -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"
            defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('/css/slider.css') }} ">
    <link rel="stylesheet" href="{{ asset('/css/dropdown.css') }} ">
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <script src="{{ asset('/js/dropdown.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500&display=swap');
    </style>
</head>

        @if (auth()->guest() || Auth::user()->role != 'admin')
            @if($agent->isMobile())
                <div id="guest_mobile_navbar">
                    @include('layouts.Guest_navbar.guest_mobile_navbar')
                </div>
            @else
                <div id="guest_navbar">
                    @include('layouts.Guest_navbar.guest_navbar')
                </div>
            @endif
        @else
            @if($agent->isMobile())
                <div id="admin_mobile_navbar">
                @include('layouts.Admin_navbar.admin_mobile_navbar')
                </div>
            @else
                <div id="admin_navbar">
                @include('layouts.Admin_navbar.admin_navbar')
                </div>
            @endif
       @endif

<body>
@if (Auth::user() != null)
<div class="container-fluid mb-3">
    <div class="container">
        @yield('content')
    </div>
</div>
@else
    @yield('content')
@endif
</body>
    @include('layouts.footer')
</html>
