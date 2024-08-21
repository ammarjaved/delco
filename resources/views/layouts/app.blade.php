<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('layouts.shared.meta-title')

    


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.shared.nav-bar')

        @if(Auth::user()->type==true)
        @include('layouts.shared.side-bar')
        @endif

        @if(Auth::user()->type==true)
        <div class="content-wrapper">
        @else
        <div class="content-wrapper" style="margin-left:5px;!important">
        @endif     

            <div id="overlay">
                <div class="loading-spinner"></div>
            </div>

            @yield('content')
        </div>

        @include('layouts.shared.footer')
    </div>
</body>

</html>
