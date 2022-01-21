<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Meine Malediven</title>
		<!-- Scripts -->
		<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->

		<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
		<!-- Fonts -->
		<script src="{{ asset('backend/js/app.js') }}" ></script>
		<link rel="stylesheet" href="{{ asset('backend/css/fontloader.css') }}">
{{-- 		<link rel="dns-prefetch" href="//fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
 --}}
		<!-- Styles -->

		<link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}"> <!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
		<!-- favicon-icon -->
		<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}"> 
		<link rel="stylesheet" href="{{ asset('backend/font-awesome/css/font-awesome.min.css') }}"> <!-- Font Awesome -->
		{{-- <link rel="stylesheet" href="{{ asset('css/fontawesome-iconpicker.min.css') }}"> --}}
		<link rel="stylesheet" href="{{ asset('backend/css/jquery-ui.css') }}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="{{ asset('backend/ionicons/css/ionicons.min.css') }}">
		<!-- DataTables -->
		<link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap.min.css') }}"> <!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-datepicker.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/css/pace.min.css') }}"> 

		<link href="{{asset('backend/css/bootstrap-toggle.min.css')}}">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

		<link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
		<link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet">

		 <!-- jQuery 3 -->
		<script src="{{ asset('backend/js/select2.min.js')}}"></script>
		<!-- Bootstrap 3.3.7 -->

		<!-- DataTables -->
		<script src="{{ asset('backend/js/jquery.dataTables.min.js') }}" defer></script>
		<script src="{{ asset('backend/js/dataTables.bootstrap.min.js') }}" defer></script> <!-- SlimScroll -->
		<script src="{{ asset('backend/js/jquery.slimscroll.min.js') }}" defer></script> <!-- FastClick -->
		<script src="{{ asset('backend/js/fastclick.js') }}"></script>

		<script src="{{ asset('backend/js/pace.min.js') }}"></script> 
		<!-- PACE -->
		<script src="{{ asset('backend/js/ckeditor.js') }}"></script>
		<!-- CK Editor -->
		<script src="{{ asset('backend/js/bootstrap-datepicker.min.js')}}" defer></script> <!-- bootstrap datepicker -->
		<script src="{{ asset('backend/js/jquery-ui.js')}}"></script>


		<script src="{{ asset('backend/js/tinymce.min.js')}}" defer></script>
		<script src="{{ asset('backend/js/moment.js') }}"></script>


		<script src="{{ asset('backend/js/dataTables.buttons.min.js')}}" defer></script> 
		<script src="{{ asset('backend/js/buttons.flash.min.js')}}" defer></script> 
		<script src="{{ asset('backend/js/jszip.min.js')}}" defer></script>
		<script src="{{ asset('backend/js/pdfmake.min.js')}}" defer></script>
		<script src="{{ asset('backend/js/vfs_fonts.js')}}"></script>
		<script src="{{ asset('backend/js/buttons.html5.min.js')}}" defer></script>
		<script src="{{ asset('backend/js/buttons.print.min.js')}}" defer></script>
		<script src="{{ asset('backend/js/scripts.js') }}" defer></script>

		<!-- page script -->
		<script>
			$(document).ready(function(){

				$('.js-example-basic-single1').select2();
				tinymce.init({
				  mode : "specific_textareas",
				  editor_selector : "myTextEditor",
				  plugins: 'table,textcolor,image,lists,link,code,wordcount,advlist, autosave',
				  theme: 'modern',
				  menubar: 'none',
				  height : '300',
				  toolbar: 'restoredraft,bold italic underline | fontselect |  fontsizeselect | forecolor backcolor |alignleft aligncenter alignright alignjustify| bullist,numlist | link image'
				});
			});
		</script>

	</head>
<body>
    <div id="app">

	@include('includes.header')
	<main>
	  @yield('content')
	</main>

  @include('includes.footer')
