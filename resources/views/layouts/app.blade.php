<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forum</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    @yield('head')
</head>

<body class="font-sans bg-grey-lighter">
    <div id="app">
        @include ('layouts.nav')

        <div class="container mx-auto">
            <div class="flex">
                @section('sidebar')
                    @include('sidebar')
                @show

                <div class="px-10 bg-white flex-1">
                    @yield('content')
                </div>

                 @include('channels-sidebar')
            </div>
        </div>

        <flash  class="animated fadeInRight" message="{{ session('flash') }}"></flash>
<div v-cloak>
        @include('modals.all')
</div>
    
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
