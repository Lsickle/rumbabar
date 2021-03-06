<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="/img/favicon.png">

	<title>@yield('pagename')</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Styles -->
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
	<link rel="stylesheet" href="{{asset('css/datatables.css')}}">
	<link rel="stylesheet" href="{{asset('css/select2.css')}}">

	@yield('styles')

</head>

<body>
	<div id="app">
		<main class="content min-vh-90 bg-light">
			@yield('header')
			@yield('container')
		</main>
	</div>
	<script src="{{asset('js/app.js')}}"></script>
	@stack('scripts')
</body>

</html>
