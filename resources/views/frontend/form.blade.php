<!DOCTYPE html>
<html lang="de">
<head>
<style>
	.review-rating .fa {
  font-size: 18px;
  margin-right: 0 !important;
}

.fa-star,
.fa-star-half {
  color: #f8be15;
  font-size: 25px;
  margin-left: 0.1rem;
}
.fa-star,
.fa-star-half,
.tutorinfo__rating {
  display: inline-block;
  vertical-align: bottom;
}

</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- meta tags -->
	
	<!-- <meta name="language" content="English"> -->
	<!-- meta tags -->

	<title>Form</title>
	<link rel="stylesheet" href="{{asset('css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
	<!-- dev 2 -->
	<link rel="stylesheet" href="{{asset('css/autocomplete-resorts.css')}}">
	<!-- dev 3 -->
	<!-- dev 4 -->
	<!-- dev 5 -->
	<link rel="stylesheet" href="{{ asset('css/frontstyles.css') }}">
	<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
	<![endif]-->
	<script src="{{ asset('js/front/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('js/front/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/front/slick.min.js')}}"></script>
	<script src="{{asset('js/front/autocomplete-resorts.js')}}"></script>
	<script src="{{asset('js/front/datepicker.js')}}"></script>
	<script src="{{asset('js/front/datepicker-de.js')}}"></script>
	<script src="{{asset('js/front/lazyloader.js')}}"></script>
	<script src="{{asset('js/front/jquery.sticky-kit.min.js')}}"></script>
	<script src="{{asset('js/front/lozad.min.js')}}"></script>
	<!-- dev 2 -->
	<script src="{{asset('js/front/jquery.fancybox.min.js')}}"></script>
	<script src="{{asset('js/front/jquery-ui-touch-punch.min.js')}}"></script>
	<script src="{{asset('js/front/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('js/front/select2.min.js')}}"></script>
	<!-- dev 3 -->
	<!-- dev 4 -->
	<!-- dev 5 -->
	<script src="{{asset('js/front/scripts.js')}}"></script>
</head>
<body>
	<div class="wrapper">
		<header id="header">
			<div class="container">
				<div class="header-row">
					<strong class="logo" style="background-size: 299px 66px;width: 289px;height: 54px;"><a href="{{url('/')}}">Meine Malediven</a></strong>
					<nav class="main-nav">
						<ul>
							<li class="color-yellow" title="Alle Hotels der Malediven"><a href="{{url('/teaser-page')}}">Hotels der Malediven</a></li>
							<li class="color-blue"><a href="{{url('/info-page')}}" title="Alle Informationen zu den Malediven">Informationen</a></li>
							<li class="color-red"><a href="{{url('/')}}" title="Stellen Sie Ihre Fragen zu den Malediven hier">Ratgeber</a></li>
							
						</ul>
					</nav><!-- end main-nav -->
					<a href="#" class="btn-menu d-lg-none"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></a>
				</div><!-- end header-row -->
			</div><!-- end container -->
		</header><!-- end header -->
		
		<main class="main">
			<div class="container">
				form
			</div>
		</main>
				
				
		<div id="footer">
		    <div class="top">
		        <div class="container">
		            <div class="row">
		                <div class="col-3">
		                    <strong class="footer-logo"><a href="homepage.html">Meine Malediven hotels</a></strong>
		                </div><!-- end col-3 -->
		                <div class="col-2">
		                    <ul class="footer-links">
		                        <li><a href="#">Hotels der Malediven</a></li>
		                        <li><a href="#">Informationen</a></li>
		                        <li><a href="#">Ratgeber</a></li>
		                    </ul><!-- end footer-links -->
		                </div><!-- end col-2 -->
		                <div class="col-2">
		                    <ul class="footer-links">
		                        <li><a href="#">Kontakt</a></li>
		                        <li><a href="#">Impressum</a></li>
		                        <li><a href="#">Datenschutz</a></li>
		                        <li><a href="#">AGB</a></li>
		                    </ul><!-- end footer-links -->
		                </div><!-- end col-2 -->
		                <div class="col-2">
		                    <ul class="footer-links">
		                        <li><a href="#">Hilfe</a></li>
		                        <li><a href="#">FAQ</a></li>
		                    </ul><!-- end footer-links -->
		                </div><!-- end col-2 -->
		                <div class="col-3">
		                    <h4>Kundenservice</h4>
		                    <ul class="footer-schedule">
		                        <li>
		                            <h5>Mo - Do</h5>
		                            <p>9:00 bis 18:00 Uhr</p>
		                        </li>
		                        <li>
		                            <h5>Fr</h5>
		                            <p>9:00 bis 15:30 Uhr</p>
		                        </li>
		                    </ul><!-- end footer-schedule -->
		                    <ul class="footer-phones">
		                        <li><strong><a href="tel:08005556273">0800 555 62 73</a></strong> (kostenlos aus Deutschland)</li>
		                        <li><small><a href="tel:+4903034357763">+49 (0)30 343 57 763</a> (außerhalb Deutschlands)</small></li>
		                    </ul><!-- end footer-phones -->
		                </div><!-- end col-3 -->
		            </div><!-- end row -->
		        </div><!-- end container -->
		    </div><!-- end top -->
		    <div class="bottom">
		        <div class="container">
		            <div class="row">
		                <div class="col-6">
		                    <ul class="footer-payment">
		                        <li>
		                            <img src="https://www.my-maldives.com/images/front/logo-visa-01.png" alt="image description">
		                        </li>
		                        <li>
		                            <img src="https://www.my-maldives.com/images/front/logo-mastercard-01.png" alt="image description">
		                        </li>
		                    </ul><!-- end footer-payment -->
		                </div><!-- end col-6 -->
		                <div class="col-6 d-flex justify-content-end">
		                    <ul class="social">
		                        <li>
		                            <a href="#" class="facebook">
		                                <img src="https://www.my-maldives.com/images/front/ico-facebook-white-01.svg" alt="image description">
		                            </a>
		                        </li>
		                        <li>
		                            <a href="#" class="twitter">
		                                <img src="https://www.my-maldives.com/images/front/ico-twitter-white-01.svg" alt="image description">
		                            </a>
		                        </li>
		                    </ul><!-- end social -->
		                </div><!-- end col-6 -->
		            </div><!-- end row -->
		        </div><!-- end container -->
		    </div><!-- end bottom -->
		
		</div><!-- end footer -->
		<!-- dev 2 -->
		<!-- dev 3 -->
	</div><!-- end wrapper -->

	<div class="modal" id="modal-002">
		
	</div><!-- end modal -->


	

</body>
</html>