<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>Meine Malediven</title>
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
<link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
<link rel="stylesheet" href="{{asset('css/autocomplete-resorts.css')}}">
<link rel="stylesheet" href="{{asset('css/styles.css')}}">

<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
<![endif]-->

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/autocomplete-resorts.js')}}"></script>
<script src="{{asset('js/datepicker.js')}}"></script>
<script src="{{asset('js/datepicker-de.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/litepicker-polyfills-ie11/dist/index.js"></script>
<script src="{{asset('js/litepicker.js')}}"></script>
<script src="{{asset('js/moment-with-locales.min.js')}}"></script>

<script src="{{asset('js/lazyloader.js')}}"></script>
<script src="{{asset('js/jquery.sticky-kit.min.js')}}"></script>
<script src="{{asset('js/lozad.min.js')}}"></script>

<script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/jquery-ui-touch-punch.min.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>

<script src="{{asset('js/scripts.js')}}"></script>
</head>



<body>
<div class="wrapper">
<header id="header" class="type2">
<div class="container">
<div class="header-row">
<strong class="logo"><a href="https://www.my-maldives.com">Meine Malediven</a></strong>
<div class="header-body">
<div class="header-search-form">
<form action="#">
<input placeholder="Sag uns wohin du möchtest oder welche Interessen du hast" type="search" class="form-control">
<span class="btn-search">
<input value="Search" type="submit">
</span>
</form>
</div></div></div></div>
</header>

<div class="top-area">
<div class="container">
<figure class="main-banner">
<div class="image"><img class="lozad" src="#" data-src="{{asset('images/img-01.jpg')}}" alt="image description"></div>
<figcaption>
<strong>Honeymooner</strong>
<small>finden bei</small>
<span>Meine Malediven</span>
<b>die perfekten Angebote!</b>
<p>Einfach Honeymoon in den Filtern auswählen.</p>
</figcaption>
</figure>
</div></div>




		<main class="main">
			<div class="container">
				<div class="hotel-search-form">
					<form action="#">
						<div class="form-row">
							<div class="form-cell">
								<div class="hotel-search-input">
									<input placeholder="Hotelname" type="search" class="form-control">
									<div class="autocomplete">
										<h3>Hotels</h3>
										<div class="list-hold"></div>
									</div><!-- autocomplete -->
								</div><!-- end hotel-search-input -->
							</div><!-- end form-cell -->
							<div class="form-cell">
								<div class="date-inputs-group">
									<div class="date-inputs-group-cell">
										<div class="date-input-box">
											<label for="datepicker-01">Anreise</label>
											<div class="date-input">
												<input placeholder="Mo, 13.01.2019" type="text" class="form-control datepicker" id="datepicker-01">
												<label for="datepicker-01" class="date-input-label">&nbsp;</label>
											</div><!-- end date-input -->
										</div><!-- end date-input-box -->
									</div><!-- end date-inputs-group-cell -->
									<div class="date-inputs-group-cell">
										<div class="date-input-box">
											<label for="datepicker-02">Abreise</label>
											<div class="date-input">
												<input placeholder="Mo, 23.01.2019" type="text" class="form-control datepicker" id="datepicker-02">
												<label for="datepicker-02" class="date-input-label">&nbsp;</label>
											</div><!-- end date-input -->
										</div><!-- end date-input-box -->
									</div><!-- end date-inputs-group-cell -->
									<div class="hidden-status">
										<div class="status-bar">
											<p class="status-str state1">Check-in Datum wählen.</p>
											<p class="status-str state2">Bitte check-out Datum wählen.</p>
											<a href="#" class="datepicker-reset">Reset</a>
										</div><!-- / status-bar -->
									</div><!-- / hidden-status -->
								</div><!-- end date-inputs-group -->
							</div><!-- end form-cell -->
							<div class="form-cell">
								<div class="guests-box">
									<div class="guests-opener">
										<small>Reisende</small>
										<span><span class="adults-num">2</span> Erwachsene, <span class="childs-num">2</span> Kinder, 1 Baby <span class="rooms-num">1</span> Zimmer</span>
									</div><!-- end guests-opener -->
									<div class="guests-dropdown">
										<div class="guests-dropdown-inner">
											<div class="guests-dropdown-section">
												<div class="guests-dropdown-row">
													<span class="guests-dropdown-title">Erwachsene</span>
													<div class="person-num-hold">
														<div class="num-box">
															<a href="#" class="btn-decrease">decrease</a>
															<input type="text" value="2" class="adults-input">
															<a href="#" class="btn-increase">increase</a>
														</div><!-- end num-box -->
													</div><!-- end person-num-hold -->
												</div><!-- end guests-dropdown-row -->
											</div><!-- end guests-dropdown-section -->
											<div class="guests-dropdown-section">
												<div class="guests-dropdown-row">
													<span class="guests-dropdown-title">Kinder</span>
													<div class="person-num-hold">
														<div class="num-box" data-min="0">
															<a href="#" class="btn-decrease">decrease</a>
															<input type="text" value="2" class="childs-input">
															<a href="#" class="btn-increase">increase</a>
														</div><!-- end num-box -->
													</div><!-- end person-num-hold -->
												</div><!-- end guests-dropdown-row -->
												<ul class="guests-child-list">
													<li>
														<label for="lbl-02">Alter Kind 1</label>
														<div class="guests-child-input-box">
															<input type="text" class="form-control" id="lbl-02">
														</div><!-- end guests-child-input-box -->
														<span>Jahre</span>
													</li>
													<li>
														<label for="lbl-03">Alter Kind 2</label>
														<div class="guests-child-input-box">
															<input type="text" class="form-control" id="lbl-03">
														</div><!-- end guests-child-input-box -->
														<span>Jahre</span>
													</li>
												</ul><!-- end guests-child-list -->
											</div><!-- end guests-dropdown-section -->
											<div class="guests-dropdown-section">
												<div class="guests-dropdown-row">
													<span class="guests-dropdown-title">Zimmer hinzufügen</span>
													<div class="person-num-hold">
														<div class="num-box">
															<a href="#" class="btn-decrease">decrease</a>
															<input type="text" value="1" class="rooms-input">
															<a href="#" class="btn-increase">increase</a>
														</div><!-- end num-box -->
													</div><!-- end person-num-hold -->
												</div><!-- end guests-dropdown-row -->
											</div><!-- end guests-dropdown-section -->
										</div><!-- end guests-dropdown-inner -->
									</div><!-- end guests-dropdown -->
								</div><!-- end guests-box -->
							</div><!-- end form-cell -->
							<div class="form-cell">
								<a href="#" class="btn btn-block btn-md btn-primary">Hotel anzeigen</a>
							</div><!-- end form-cell -->
						</div><!-- end form-row -->
					</form>
				</div><!-- end hotel-search-form -->
				<div class="content-area">
					<div class="row">
						<div class="col-lg-3 col-xl-3">
							<nav class="side-menu">
								<ul>
									<li>
										<h3>Informationen</h3>
										<ul>
											<li class="active"><a href="#">MEINE MALEDIVEN</a></li>
											<li><a href="#">Die wichtigsten Fakten</a></li>
											<li><a href="#">Hochzeiten & Honeymoon</a></li>
											<li>
												<a href="#">Hotel Transfers</a>
												<ul>
													<li><a href="#">Second Level</a></li>
													<li><a href="#">Second Level</a></li>
													<li><a href="#">Second Level</a></li>
													<li><a href="#">Second Level</a></li>
													<li><a href="#">Second Level</a></li>
												</ul>
											</li>
											<li><a href="#">Mit Kinder auf die Malediven</a></li>
											<li><a href="#">Die Hotels auf den Malediven</a></li>
											<li><a href="#">Zimmervarianten</a></li>
											<li><a href="#">Zusatzkosten</a></li>
											<li><a href="#">Verpflegungsmöglichkeiten</a></li>
											<li><a href="#">News</a></li>
										</ul>
									</li>
									<li>
										<h3>Atolle</h3>
										<ul>
											<li><a href="#">Haa Alifu Atoll</a></li>
											<li><a href="#">Alifu Alifu Atoll</a></li>
											<li><a href="#">Alifu Dhaalu Atoll</a></li>
											<li><a href="#">Baa Atoll</a></li>
											<li><a href="#">Dhaalu Atoll</a></li>
											<li><a href="#">Faafu Atoll</a></li>
											<li><a href="#">Gaafu Alifu Atoll</a></li>
											<li><a href="#">Gaafu Dhaalu Atoll</a></li>
											<li><a href="#">Gnaviyani Atoll</a></li>
											<li><a href="#">Haa Dhaalu Atoll</a></li>
											<li><a href="#">Kaafu Atoll</a></li>
											<li><a href="#">Laamu Atoll</a></li>
											<li><a href="#">Lhaviyani Atoll</a></li>
											<li><a href="#">Male Atoll</a></li>
											<li><a href="#">Meemu Atoll</a></li>
											<li><a href="#">Noonu Atoll</a></li>
											<li><a href="#">Raa Atoll</a></li>
										</ul>
									</li>
									<li>
										<h3>Inseln</h3>
										<ul>
											<li><a href="#">DIE INSELN DER MALEDIVEN</a></li>
											<li><a href="#">Insel Karten</a></li>
										</ul>
									</li>
								</ul>
							</nav><!-- end side-menu -->
						</div><!-- end col-xl-3 -->
						<div class="col-lg-9 col-xl-9">
							<header class="heading-block">
								<h1>Mein Urlaub, meine Malediven</h1>
								<p>Tropische Landschaften, glasklares Wasser und ein schneeweißer Sandstrand; die Malediven zu lieben fällt nicht schwer, genau darum tun es so viele. Die Malediven sind eines der letzten Inselparadiese dieser Welt und ein Urlaub dort ist und bleibt etwas ganz Besonderes.Trüben kann diesen Traumurlaub eigentlich nur wenn man sich das falsche Hotel oder die falsche Insel ausgesucht hat.Wir geben Tipps und Anregungen damit man die richtige Insel und das richtige Hotel findet und so seinen Urlaub genießen kann.</p>
							</header><!-- end heading-block -->
							<ul class="info-blocks-list">
								<li>
									<div class="info-block">
										<div class="info-block-body">
											<div class="image">
												<img class="lozad" src="#" data-src="{{asset('images/img-20.jpg')}}" alt="image description">
											</div><!-- end image -->
											<div class="description">
												<h2>Fakten</h2>
												<em class="title">Die wichtigsten Fakten zu den Malediven im Überblick. <br>Informationen zu den Einreisebestimmungen / Visa, Zollvorschriften.</em>
												<p>Bevor Sie Ihren Malediven Urlaub buchen, verschaffen Sie sich einen kurzen Überblick über das, was Sie wissen sollten, was Sie benötigen und worauf Sie achten sollten.</p>
											</div><!-- end description -->
										</div><!-- end info-block-body -->
										<div class="info-block-footer">
											<a href="#" class="btn btn-primary btn-arrow-right-inline">Mehr Informationen</a>
										</div><!-- end info-block-footer -->
									</div><!-- end info-block -->
								</li>
								<li>
									<div class="info-block">
										<div class="info-block-body">
											<div class="image">
												<img class="lozad" src="#" data-src="{{asset('images/img-20.jpg')}}" alt="image description">
											</div><!-- end image -->
											<div class="description">
												<h2>Das Ja-Wort im Paradies</h2>
												<em class="title">Wer träumt nicht davon sich das Ja Wort im Paradies zu geben, <br>umgeben von den weiten des Indischen Ozeans ...</em>
												<p>In allen Hotels auf den Malediven können Sie Heiraten oder das Eheversprechen erneuern. Rechtlich anerkannt ist eine Heirat auf den Malediven nicht, trotzdem ein bleibendes Erlebnis.</p>
											</div><!-- end description -->
										</div><!-- end info-block-body -->
										<div class="info-block-footer">
											<a href="#" class="btn btn-primary btn-arrow-right-inline">Mehr Informationen</a>
										</div><!-- end info-block-footer -->
									</div><!-- end info-block -->
								</li>
								<li>
									<div class="info-block">
										<div class="info-block-body">
											<div class="image">
												<img class="lozad" src="#" data-src="{{asset('images/img-20.jpg')}}" alt="image description">
											</div><!-- end image -->
											<div class="description">
												<h2>Mein Zimmer im Paradies</h2>
												<em class="title">Beach Bungalow oder Waterbungalow?</em>
												<p>Bei den Zimmern scheiden sich die Geister, die einen möchten unbedingt einen Wasserbungalow, die anderen unbedingt ein Beachbungalow. <br>Welches Zimmer ist die bessere Wahl?</p>
											</div><!-- end description -->
										</div><!-- end info-block-body -->
										<div class="info-block-footer">
											<a href="#" class="btn btn-primary btn-arrow-right-inline">Mehr Informationen</a>
										</div><!-- end info-block-footer -->
									</div><!-- end info-block -->
								</li>
								<li>
									<div class="info-block">
										<div class="info-block-body">
											<div class="image">
												<img class="lozad" src="#" data-src="{{asset('images/img-20.jpg')}}" alt="image description">
											</div><!-- end image -->
											<div class="description">
												<h2>Zusatzkosten</h2>
												<em class="title">Wir würden mal behaupten, was Zusatzkosten angeht, <br>sind die Hotels in den Malediven wahre Meister.</em>
												<p>Diese Zusatzkosten dann noch zu verstecken ist die Paradedisziplin vieler Hotels. Dieses Schreckgespenst Namens Zusatzkosten sorgt für viel Ärger. <br>Maledivenurlaub ohne Zusatzkosten?</p>
											</div><!-- end description -->
										</div><!-- end info-block-body -->
										<div class="info-block-footer">
											<a href="#" class="btn btn-primary btn-arrow-right-inline">Mehr Informationen</a>
										</div><!-- end info-block-footer -->
									</div><!-- end info-block -->
								</li>
							</ul><!-- end info-blocks-list -->
						</div><!-- end col-xl-9 -->
					</div><!-- end row -->
				</div><!-- end content-area -->
			</div><!-- end container -->
		</main><!-- end main -->




<div id="footer">

<div class="top">
<div class="container">
<div class="row">

<div class="col-3">
<strong class="footer-logo"><a href="https://www.my-maldives.com">Meine Malediven hotels</a></strong>
</div>

<div class="col-2">
<ul class="footer-links">
<li><a href="https://www.my-maldives.com/hotels-der-malediven.html">Hotels der Malediven</a></li>
<li><a href="https://www.my-maldives.com/informationen.html">Informationen</a></li>
</ul>
</div>

<div class="col-2">
<ul class="footer-links">
<li><a href="https://www.my-maldives.com/kontakt.html">Kontakt</a></li>
<li><a href="https://www.my-maldives.com/impressum.html">Impressum</a></li>
<li><a href="https://www.my-maldives.com/datenschutz.html">Datenschutz</a></li>
<li><a href="https://www.my-maldives.com/agb.html">AGB</a></li>
</ul>
</div>

<div class="col-2">
<ul class="footer-links">
<li><a href="https://www.my-maldives.com/faq.html">FAQ</a></li>
</ul>
</div>

<div class="col-3">
<h4>Kundenservice</h4>
<ul class="footer-schedule">
<li>
<h5>Mo - Do</h5>
<p>9:00 bis 18:00 Uhr</p>
</li>
<li>
<h5>Fr</h5>
<p>9:00 bis 15:00 Uhr</p>
</li>
</ul>
<ul class="footer-phones">
<li><strong><a href="tel:08005556273">0800 555 62 73</a></strong> (kostenlos aus Deutschland)</li>
<li><small><a href="tel:+4903034357763">+49 (0)30 343 57 763</a> (außerhalb Deutschlands)</small></li>
</ul>
</div></div></div></div>

<div class="bottom">
<div class="container">
<div class="row">

<div class="col-6">
<ul class="footer-payment">
<li><img src="{{asset('images/logo-visa-01.png')}}" alt="image description"></li>
<li><img src="{{asset('images/logo-mastercard-01.png')}}" alt="image description"></li>
</ul>
</div>

<div class="col-6 d-flex justify-content-end">
<ul class="social">
<li><a href="#" class="facebook"><img src="{{asset('images/ico-facebook-white-01.svg')}}" alt="image description"></a></li>
<li> <a href="#" class="twitter"><img src="{{asset('images/ico-twitter-white-01.svg')}}" alt="image description"></a></li>
</ul>
</div></div></div></div></div></div>

</body>
</html>