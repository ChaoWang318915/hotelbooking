<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title>Meine Malediven</title>
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/datepicker.css">
	<!-- dev 2 -->
	<link rel="stylesheet" href="css/autocomplete-resorts.css">
	<!-- dev 3 -->
	<!-- dev 4 -->
	<!-- dev 5 -->
	<link rel="stylesheet" href="css/styles.css">
	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
	<![endif]-->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/autocomplete-resorts.js"></script>
	<script src="js/datepicker.js"></script>
	<script src="js/datepicker-de.js"></script>
	<script src="js/lazyloader.js"></script>
	<script src="js/jquery.sticky-kit.min.js"></script>
	<script src="js/lozad.min.js"></script>
	<!-- dev 2 -->
	<script src="js/jquery.fancybox.min.js"></script>
	<script src="js/jquery-ui-touch-punch.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<!-- dev 3 -->
	<!-- dev 4 -->
	<!-- dev 5 -->
	<script src="js/scripts.js"></script>
</head>
<h1>asdasdas</h1>
<body>
	<div class="wrapper">
		<header id="header">
			<div class="container">
				<div class="header-row">
					<strong class="logo"><a href="homepage.html">Meine Malediven</a></strong>
					<nav class="main-nav">
						<ul>
							<li class="color-yellow" title="Alle Hotels der Malediven"><a href="#">Hotels der Malediven</a></li>
							<li class="color-blue"><a href="#" title="Alle Informationen zu den Malediven">Informationen</a></li>
							<li class="color-red"><a href="#" title="Stellen Sie Ihre Fragen zu den Malediven hier">Ratgeber</a></li>
						</ul>
					</nav><!-- end main-nav -->
					<a href="#" class="btn-menu d-lg-none"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></a>
				</div><!-- end header-row -->
			</div><!-- end container -->
		</header><!-- end header -->
		<div class="top-area">
			<div class="container">
				<figure class="main-banner">
					<div class="image">
						<img class="lozad" src="#" data-src="images/img-01.jpg" alt="image description">
					</div><!-- end image -->
					<figcaption>
						<strong>Honeymooner</strong>
						<small>finden bei</small>
						<span>Meine Malediven</span>
						<b>die perfekten Angebote!</b>
						<p>Einfach Honeymoon in den Filtern auswählen.</p>
					</figcaption>
				</figure><!-- end main-banner -->
			</div><!-- end container -->
		</div><!-- end top-area -->
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
				<section class="intro-section">
					<div class="intro-box">
						<h1>Meine Malediven ...</h1>
						<p>Wenn das Paradies auf der Erde zu finden ist, dann hier, <br>im Indischen Ozean.</p>
						<p>Die Malediven sind ein Ort, an dem Zeit keine Rolle zu spielen scheint, an dem allein der Blick auf die menschenleeren Traumstrände und das in allen Blautönen strahlende Wasser genügt, um Entspannung zu finden; an dem Erholung plötzlich nicht mehr nur ein Wort ist, sondern ein Zustand wird.</p>
						<p>Kein anderer Ort auf der Welt birgt diesen Zauber <br>- wir wissen, wovon wir sprechen: <br>Wir haben schon viele Orte auf der Welt gesehen. <br>Doch nichts hat uns mehr berührt, als die Malediven. Deshalb möchten wir Ihnen die Schönheit und Exklusivität dieses Reiseziels näher bringen.</p>
						<p>Kommen Sie mit und begleiten Sie uns auf eine Reise voller magischer Momente in den schönsten Hotels der Welt!</p>
					</div><!-- end intro-box -->
					<div class="boxes-block">
						<div class="row">
							<div class="col-md-6 d-flex">
								<figure class="info-box">
									<div class="image">
										<a href="#">
											<img class="lozad" src="#" data-src="images/img-03.jpg" alt="image description">
										</a>
									</div><!-- end image -->
									<figcaption>
										<div class="box-body">
											<h2><a href="#">Hotels auf den Malediven</a></h2>
											<p>Vom Luxushotel bis zu den noch ursprünglichen Hotels, die Malediven bieten Hotels für jeden Geschmack auf über 154 Hotelinseln</p>
										</div><!-- end box-body -->
										<div class="box-footer">
											<a href="#" class="btn btn-sm btn-primary btn-arrow-right">mehr Infos</a>
										</div><!-- end box-footer -->
									</figcaption>
								</figure><!-- end info-box -->
							</div><!-- end col-md-6 -->
							<div class="col-md-6 d-flex">
								<figure class="info-box">
									<div class="image">
										<a href="#">
											<img class="lozad" src="#" data-src="images/img-04.jpg" alt="image description">
										</a>
									</div><!-- end image -->
									<figcaption>
										<div class="box-body">
											<h2><a href="#">Hoteltransfers</a></h2>
											<p>Welcher Transfer ist der richtige für mein Aufenthalt auf den Malediven und welche Transfers werden angeboten?</p>
										</div><!-- end box-body -->
										<div class="box-footer">
											<a href="#" class="btn btn-sm btn-primary btn-arrow-right">mehr Infos</a>
										</div><!-- end box-footer -->
									</figcaption>
								</figure><!-- end info-box -->
							</div><!-- end col-md-6 -->
						</div><!-- end row -->
					</div><!-- end boxes-block -->
				</section><!-- end intro-section -->
				<section class="offers-section">
					<div class="offers-block">
						<h2>Die neuesten Angebote</h2>
						<ul class="offers-list">
							<li>
								<a href="#">
									<figure class="offer-card">
										<div class="image">
											<img class="lozad" src="#" data-src="images/img-05.jpg" alt="image description">
											<span class="price"><span>ab</span> <strong>349 Euro</strong></span>
										</div><!-- end image -->
										<figcaption>
											<h3>Olhuveli Beach Resort</h3>
											<ul class="rating-widget">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul><!-- end rating-widget -->
										</figcaption>
									</figure><!-- end offer-card -->
								</a>
							</li>
							<li>
								<a href="#">
									<figure class="offer-card">
										<div class="image">
											<img class="lozad" src="#" data-src="images/img-06.jpg" alt="image description">
											<span class="price"><span>ab</span> <strong>649 Euro</strong></span>
										</div><!-- end image -->
										<figcaption>
											<h3>Kanuhura</h3>
											<ul class="rating-widget">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul><!-- end rating-widget -->
										</figcaption>
									</figure><!-- end offer-card -->
								</a>
							</li>
							<li>
								<a href="#">
									<figure class="offer-card">
										<div class="image">
											<img src="images/img-07.jpg" alt="image description">
											<span class="price"><span>ab</span> <strong>549 Euro</strong></span>
										</div><!-- end image -->
										<figcaption>
											<h3>Kurumba Maldives</h3>
											<ul class="rating-widget">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul><!-- end rating-widget -->
										</figcaption>
									</figure><!-- end offer-card -->
								</a>
							</li>
							<li>
								<a href="#">
									<figure class="offer-card">
										<div class="image">
											<img src="images/img-08.jpg" alt="image description">
											<span class="price"><span>ab</span> <strong>549 Euro</strong></span>
										</div><!-- end image -->
										<figcaption>
											<h3>Reethi Beach Resort</h3>
											<ul class="rating-widget">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul><!-- end rating-widget -->
										</figcaption>
									</figure><!-- end offer-card -->
								</a>
							</li>
							<li>
								<a href="#">
									<figure class="offer-card">
										<div class="image">
											<img class="lozad" src="#" data-src="images/img-05.jpg" alt="image description">
											<span class="price"><span>ab</span> <strong>349 Euro</strong></span>
										</div><!-- end image -->
										<figcaption>
											<h3>Olhuveli Beach Resort</h3>
											<ul class="rating-widget">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul><!-- end rating-widget -->
										</figcaption>
									</figure><!-- end offer-card -->
								</a>
							</li>
							<li>
								<a href="#">
									<figure class="offer-card">
										<div class="image">
											<img src="images/img-06.jpg" alt="image description">
											<span class="price"><span>ab</span> <strong>649 Euro</strong></span>
										</div><!-- end image -->
										<figcaption>
											<h3>Kanuhura</h3>
											<ul class="rating-widget">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul><!-- end rating-widget -->
										</figcaption>
									</figure><!-- end offer-card -->
								</a>
							</li>
							<li>
								<a href="#">
									<figure class="offer-card">
										<div class="image">
											<img class="lozad" src="#" data-src="images/img-07.jpg" alt="image description">
											<span class="price"><span>ab</span> <strong>549 Euro</strong></span>
										</div><!-- end image -->
										<figcaption>
											<h3>Kurumba Maldives</h3>
											<ul class="rating-widget">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul><!-- end rating-widget -->
										</figcaption>
									</figure><!-- end offer-card -->
								</a>
							</li>
							<li>
								<a href="#">
									<figure class="offer-card">
										<div class="image">
											<img class="lozad" src="#" data-src="images/img-08.jpg" alt="image description">
											<span class="price"><span>ab</span> <strong>549 Euro</strong></span>
										</div><!-- end image -->
										<figcaption>
											<h3>Reethi Beach Resort</h3>
											<ul class="rating-widget">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul><!-- end rating-widget -->
										</figcaption>
									</figure><!-- end offer-card -->
								</a>
							</li>
						</ul><!-- end offers-list -->
					</div><!-- end offers-block -->
					<div class="atolls-box">
						<div class="atolls-links-box">
							<h2>Die Atolle</h2>
							<p>Die Malediven bestehen aus 26 geographischen Atollen, eingeteilt in 19 Verwaltungsatolle.</p>
							<ul class="atolls-links">
								<li><a href="#atoll-image-tab-01">Haa Alifu</a></li>
								<li><a href="#atoll-image-tab-02">Haa Dhaalu</a></li>
								<li><a href="#atoll-image-tab-03">Shaviyani</a></li>
								<li><a href="#atoll-image-tab-04">Noonu</a></li>
								<li><a href="#atoll-image-tab-05">Raa</a></li>
								<li><a href="#atoll-image-tab-06">Baa</a></li>
								<li><a href="#atoll-image-tab-07">Lhaviyani</a></li>
								<li><a href="#atoll-image-tab-08">Malé (<small>Hauptstadt Insel</small>)</a></li>
								<li><a href="#atoll-image-tab-09">Kaafu</a></li>
								<li><a href="#atoll-image-tab-10">Alifu Alifu</a></li>
								<li><a href="#atoll-image-tab-11">Alifu Dhaalu</a></li>
								<li><a href="#atoll-image-tab-12">Vaavu</a></li>
								<li><a href="#atoll-image-tab-13">Meemu</a></li>
								<li><a href="#atoll-image-tab-14">Faafu</a></li>
								<li><a href="#atoll-image-tab-15">Dhaalu</a></li>
								<li><a href="#atoll-image-tab-16">Thaa</a></li>
								<li><a href="#atoll-image-tab-17">Laamu</a></li>
								<li><a href="#atoll-image-tab-18">Gaafu Alifu</a></li>
								<li><a href="#atoll-image-tab-19">Gaafu Dhaalu</a></li>
								<li><a href="#atoll-image-tab-20">Gnaviyani</a></li>
								<li><a href="#atoll-image-tab-21">Seenu</a></li>
							</ul><!-- end atolls-links -->
						</div><!-- end atolls-links-box -->
						<div class="atolls-image-box">
							<div class="atolls-map-image">
								<img class="lozad" src="#" data-src="images/img-atolls-01.png" alt="image description">
							</div><!-- end atolls-map-image -->
							<div class="atolls-image-tab" id="atoll-image-tab-01">
								<img class="lozad" src="#" data-src="images/img-atoll-01.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-02">
								<img class="lozad" src="#" data-src="images/img-atoll-02.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-03">
								<img class="lozad" src="#" data-src="images/img-atoll-03.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-04">
								<img class="lozad" src="#" data-src="images/img-atoll-04.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-05">
								<img class="lozad" src="#" data-src="images/img-atoll-05.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-06">
								<img class="lozad" src="#" data-src="images/img-atoll-06.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-07">
								<img class="lozad" src="#" data-src="images/img-atoll-07.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-08">
								<img class="lozad" src="#" data-src="images/img-atoll-08.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-09">
								<img class="lozad" src="#" data-src="images/img-atoll-09.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-10">
								<img class="lozad" src="#" data-src="images/img-atoll-10.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-11">
								<img class="lozad" src="#" data-src="images/img-atoll-11.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-12">
								<img class="lozad" src="#" data-src="images/img-atoll-12.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-13">
								<img class="lozad" src="#" data-src="images/img-atoll-13.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-14">
								<img class="lozad" src="#" data-src="images/img-atoll-14.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-15">
								<img class="lozad" src="#" data-src="images/img-atoll-15.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-16">
								<img class="lozad" src="#" data-src="images/img-atoll-16.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-17">
								<img class="lozad" src="#" data-src="images/img-atoll-17.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-18">
								<img class="lozad" src="#" data-src="images/img-atoll-18.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-19">
								<img class="lozad" src="#" data-src="images/img-atoll-19.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-20">
								<img class="lozad" src="#" data-src="images/img-atoll-20.png" alt="image description">
							</div><!-- end atolls-image-tab -->
							<div class="atolls-image-tab" id="atoll-image-tab-21">
								<img class="lozad" src="#" data-src="images/img-atoll-21.png" alt="image description">
							</div><!-- end atolls-image-tab -->
						</div><!-- end atolls-image-box -->
					</div><!-- end atolls-box -->
				</section><!-- end offers-section -->
				<section class="special-offers-section">
					<h2>Ausgesuchte Hotels für spezielle Interessen</h2>
					<ul class="special-offers-list">
						<li>
							<figure class="special-offer-card">
								<div class="image">
									<img class="lozad" src="#" data-src="images/img-11.jpg" alt="image description">
								</div><!-- end image -->
								<figcaption>
									<div class="special-offer-card-body">
										<h2>Hochzeiten &amp; Honeymoon</h2>
									</div><!-- end special-offer-card-body -->
									<div class="special-offer-card-footer">
										<a href="#" class="btn btn-primary btn-arrow-right-inline">Hotel finden</a>
									</div><!-- end special-offer-card-footer -->
								</figcaption>
							</figure><!-- end special-offer-card -->
						</li>
						<li>
							<figure class="special-offer-card">
								<div class="image">
									<img class="lozad" src="#" data-src="images/img-12.jpg" alt="image description">
								</div><!-- end image -->
								<figcaption>
									<div class="special-offer-card-body">
										<h2>Familienurlaub</h2>
									</div><!-- end special-offer-card-body -->
									<div class="special-offer-card-footer">
										<a href="#" class="btn btn-primary btn-arrow-right-inline">Hotel finden</a>
									</div><!-- end special-offer-card-footer -->
								</figcaption>
							</figure><!-- end special-offer-card -->
						</li>
						<li>
							<figure class="special-offer-card">
								<div class="image">
									<img class="lozad" src="#" data-src="images/img-13.jpg" alt="image description">
								</div><!-- end image -->
								<figcaption>
									<div class="special-offer-card-body">
										<h2>Taucher</h2>
									</div><!-- end special-offer-card-body -->
									<div class="special-offer-card-footer">
										<a href="#" class="btn btn-primary btn-arrow-right-inline">Hotel finden</a>
									</div><!-- end special-offer-card-footer -->
								</figcaption>
							</figure><!-- end special-offer-card -->
						</li>
					</ul><!-- end special-offers-list -->
				</section><!-- end special-offers-section -->
				<section class="info-section">
					<div class="newsletter-box">
						<div class="coupon-block">
							<b>20</b>
							<div class="block">
								<em>€</em>
								<strong>Gutschein</strong>
								<small>für Ihre</small>
							</div><!-- end block -->
						</div><!-- end coupon-block -->
						<h3>NEWSLETTERANMELDUNG</h3>
						<a href="#" class="btn btn-primary btn-arrow-right-inline">Zur Newsletteranmeldung</a>
					</div><!-- end newsletter-box -->
					<ul class="info-list">
						<li>
							<h3>Sicher Bezahlen</h3>
							<div class="ico">
								<img class="lozad" src="#" data-src="images/ico-card-blue-01.png" alt="image description">
							</div><!-- end ico -->
							<p>Sicher, einfach und schnell bezahlen. <br>Mit Kreditkarte (Visa oder Mastercard) oder bequem auf Rechnung.</p>
						</li>
						<li>
							<h3>SSL Verschlüsselung</h3>
							<div class="ico">
								<img class="lozad" src="#" data-src="images/ico-encryption-blue-01.png" alt="image description">
							</div><!-- end ico -->
							<p>Ihre Daten sind bei uns sicher. <br>Daten die von Ihren Browser zu unserem Server übertragen werden sind mit einer 256 bit SSL-Verschlüsselung geschützt.</p>
						</li>
						<li>
							<h3>Kundenservice</h3>
							<div class="ico">
								<img class="lozad" src="#" data-src="images/ico-people-blue-01.png" alt="image description">
							</div><!-- end ico -->
							<p>Ihre Daten werden mit mit einer SSL Verschlüsselung übertragen. So sind Ihre Daten sicher.</p>
						</li>
					</ul><!-- end info-list -->
				</section><!-- end info-section -->
				<ul class="info-cards">
					<li>
						<div class="info-card">
							<a href="#">
								<div class="image">
									<img class="lozad" src="#" data-src="images/img-14.jpg" alt="image description">
								</div><!-- end image -->
								<h3>Die wichtigsten Fakten</h3>
							</a>
						</div><!-- end info-card -->
					</li>
					<li>
						<div class="info-card">
							<a href="#">
								<div class="image">
									<img class="lozad" src="#" data-src="images/img-15.jpg" alt="image description">
								</div><!-- end image -->
								<h3>Flora &amp; Fauna</h3>
							</a>
						</div><!-- end info-card -->
					</li>
					<li>
						<div class="info-card">
							<a href="#">
								<div class="image">
									<img class="lozad" src="#" data-src="images/img-16.jpg" alt="image description">
								</div><!-- end image -->
								<h3>News aus den Malediven</h3>
							</a>
						</div><!-- end info-card -->
					</li>
				</ul><!-- end info-cards -->
			</div><!-- end container -->
		</main><!-- end main -->
		<div class="pre-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<h4>Lassen Sie uns in Verbindung bleiben</h4>
						<ul class="social">
							<li>
								<a href="#" class="facebook">
									<img src="images/ico-facebook-white-01.svg" alt="image description">
								</a>
							</li>
							<li>
								<a href="#" class="twitter">
									<img src="images/ico-twitter-white-01.svg" alt="image description">
								</a>
							</li>
						</ul><!-- end social -->
					</div><!-- end col-lg-6 -->
					<div class="col-md-4 col-lg-2">
						<h4>So buchen Sie bei uns</h4>
						<ul class="pre-footer-links">
							<li><a href="#">Buchungen</a></li>
							<li><a href="#">Zahlungen</a></li>
							<li><a href="#">Stornierungen</a></li>
						</ul><!-- end pre-footer-links -->
					</div><!-- end col-lg-2 -->
					<div class="col-md-4 col-lg-2">
						<h4>Kundenservice</h4>
						<ul class="pre-footer-links">
							<li><a href="#">Bonuspunkte</a></li>
							<li><a href="#">Hotelbewertungen</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul><!-- end pre-footer-links -->
					</div><!-- end col-lg-2 -->
					<div class="col-md-4 col-lg-2">
						<h4>Kundenservice</h4>
						<ul class="pre-footer-links">
							<li><a href="#">Bonuspunkte</a></li>
							<li><a href="#">Hotelbewertungen</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul><!-- end pre-footer-links -->
					</div><!-- end col-lg-2 -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end pre-footer -->
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
		                            <img src="images/logo-visa-01.png" alt="image description">
		                        </li>
		                        <li>
		                            <img src="images/logo-mastercard-01.png" alt="image description">
		                        </li>
		                    </ul><!-- end footer-payment -->
		                </div><!-- end col-6 -->
		                <div class="col-6 d-flex justify-content-end">
		                    <ul class="social">
		                        <li>
		                            <a href="#" class="facebook">
		                                <img src="images/ico-facebook-white-01.svg" alt="image description">
		                            </a>
		                        </li>
		                        <li>
		                            <a href="#" class="twitter">
		                                <img src="images/ico-twitter-white-01.svg" alt="image description">
		                            </a>
		                        </li>
		                    </ul><!-- end social -->
		                </div><!-- end col-6 -->
		            </div><!-- end row -->
		        </div><!-- end container -->
		    </div><!-- end bottom -->
		
		</div><!-- end footer -->
	</div><!-- end wrapper -->
</body>
</html>