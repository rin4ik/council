<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/img/img10.png">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Forum</title>
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">


	<script>
		window.App={!!json_encode(['csrfToken'=>csrf_token(),
      'user'=>Auth::user(),
      'signedIn'=>Auth::check()
      ])!!};
	</script>
	@yield('header')

</head>

<body>
	
	<div id="app">
		@include('layouts.nav') @yield('content')
		<flash message="{{session('flash')}}"></flash>

	</div>

	<!-- Scripts -->


	<script src="{{ asset('js/app.js') }}"></script>
</body>
@include('layouts.footer')

</html>