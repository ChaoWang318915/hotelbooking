<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="format-detection" content="telephone=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Meine Malediven &middot; Hotels, Gästehäuser, Informationen </title>

		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
		<link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/datepicker.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/autocomplete-resorts.css') }}">
		<!-- <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}"> -->
		<link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/frontstyles.css') }}">
	<!--	<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}"> -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="wrapper">
			@include('includes.front-header')
				<main>
					@yield('content')
				</main>
			@include('includes.front-footer')
		</div>

		<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
		<script src="{{ asset('frontend/js/autocomplete-resorts.js') }}"></script>
		<script src="{{ asset('frontend/js/datepicker.js') }}"></script>

		<script src="{{ asset('frontend/js/datepicker-de.js') }}"></script>

		<script src="{{ asset('frontend/js/lazyloader.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.sticky-kit.min.js') }}"></script>
		<script src="{{ asset('frontend/js/lozad.min.js') }}"></script>

		<script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery-ui-touch-punch.min.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.nicescroll.min.js') }}"></script>
		<script src="{{ asset('frontend/js/select2.min.js') }}"></script>
		<script src="{{ asset('frontend/js/scripts.js') }}"></script>

	</body>
</html>
