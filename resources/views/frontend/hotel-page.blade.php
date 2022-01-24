<?php
if ($search_data['date1'] && $search_data['date2']) {
	echo "<script>
			window.dateStartDate = '".$search_data['date1']."'
			window.dateEndDate = '".$search_data['date2']."'
		</script>";
}
?>
<!DOCTYPE html>
<html lang="de">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">


	<meta name="title" content="{{$hotels->meta_title}}">
	<meta name="description" content="{{$hotels->meta_description}}">
	<meta name="keywords" content="{{$hotels->meta_keyword}}">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


	<title>{{$hotels->meta_title}}</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
	<link rel="stylesheet" href="{{asset('css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('css/datepicker.css')}}">

	<link rel="stylesheet" href="{{asset('css/autocomplete-resorts.css')}}">

	<link rel="stylesheet" href="{{ asset('css/frontstyles.css')}}">
	<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css"/>

<!--
<style type="text/css">
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
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none!important;
  margin: 0!important;
}
input[type=number] {
    -moz-appearance:textfield;
}
.calender-sec .mbsc-ios.mbsc-textfield{
  font-size: 13px;
      padding: 0 9px;
}
.calender-sec .mbsc-label{
	text-overflow: unset;
    width: 100%;
    position: absolute;
     padding-left: 9px !important;
}
.calender-sec img.cald{
position: absolute;
    right: 9px;
    top: 50%;
    width: 18px;
    transform: translateY(-50%);
}
.calender-sec small{
	    position: relative;
    top: -12px;
}
@media (max-width: 767px){
	.main-banner.description-left figcaption{
		margin-top: 0 !important;
	}
}
	.litepicker,
body .litepicker {
  font-size: 14px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  margin-left: -13px;
}

.litepicker .container__months,
body .litepicker .container__months {
  width: 299px;
  border-radius: 0;
  background: #fff;
  -webkit-box-shadow: 0 0 0 1px blue;
          box-shadow: 0 0 0 1px blue;
}

.litepicker .container__months .month-item-header,
body .litepicker .container__months .month-item-header {
  color: #36648b;
  font-size: 14px;
  line-height: 1.429;
}

.litepicker .container__months .month-item-header .button-previous-month,
.litepicker .container__months .month-item-header .button-next-month,
body .litepicker .container__months .month-item-header .button-previous-month,
body .litepicker .container__months .month-item-header .button-next-month {
  cursor: pointer;
}

.litepicker .container__months .month-item-header .button-previous-month > svg,
.litepicker .container__months .month-item-header .button-next-month > svg,
body .litepicker .container__months .month-item-header .button-previous-month > svg,
body .litepicker .container__months .month-item-header .button-next-month > svg {
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  fill: #36648b;
}

.litepicker .container__months .month-item-header .month-item-year,
body .litepicker .container__months .month-item-header .month-item-year {
  font-weight: 700;
}

.litepicker .container__months .month-item-weekdays-row,
body .litepicker .container__months .month-item-weekdays-row {
  color: #36648b;
  font-weight: 700;
  padding-top: 5px;
  padding-bottom: 4px;
}

.litepicker .container__months .month-item,
body .litepicker .container__months .month-item {
  padding-left: 0;
  padding-right: 0;
  padding-bottom: 79px;
  width: 100%;
}

.litepicker .container__months .month-item .status-bar,
body .litepicker .container__months .month-item .status-bar {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  text-align: center;
  font-size: 13px;
  line-height: 1.231;
  padding-bottom: 8px;
}

.litepicker .container__months .month-item .status-bar .status-str,
body .litepicker .container__months .month-item .status-bar .status-str {
  min-height: 2.462em;
  margin-bottom: 12px;
  font-weight: 700;
  color: #39769f;
  display: none;
}

.litepicker .container__months .month-item .status-bar .status-str.state1,
body .litepicker .container__months .month-item .status-bar .status-str.state1 {
  display: block;
}

.litepicker .container__months .month-item .status-bar .datepicker-reset,
body .litepicker .container__months .month-item .status-bar .datepicker-reset {
  display: inline-block;
  vertical-align: top;
  font-size: 14px;
  line-height: 1.215;
  color: #36648b;
  text-decoration: none;
}

.litepicker .container__months .month-item .status-bar .datepicker-reset:hover,
body .litepicker .container__months .month-item .status-bar .datepicker-reset:hover {
  text-decoration: underline;
}

.litepicker .container__days,
body .litepicker .container__days {
  width: 100%;
}

.litepicker .container__days > div,
.litepicker .container__days > a,
body .litepicker .container__days > div,
body .litepicker .container__days > a {
  width: 14.28%;
}

.litepicker .container__days .day-item,
body .litepicker .container__days .day-item {
  color: #6d7681;
  position: relative;
  z-index: 0;
  margin-top: 6px;
  margin-bottom: 6px;
}

.litepicker .container__days .day-item::before,
body .litepicker .container__days .day-item::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: -1;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  width: 29px;
  height: 29px;
  border-radius: 50%;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  opacity: 0;
  background: #5985b8;
}

.litepicker .container__days .day-item::after,
body .litepicker .container__days .day-item::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  z-index: -2;
  height: 25px;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  background: #f2f6f8;
  -webkit-transition: opacity 0.3s ease;
  transition: opacity 0.3s ease;
  opacity: 0;
}

.litepicker .container__days .day-item:hover,
body .litepicker .container__days .day-item:hover {
  -webkit-box-shadow: none;
          box-shadow: none;
}

.litepicker .container__days .day-item:not(.is-locked):hover,
body .litepicker .container__days .day-item:not(.is-locked):hover {
  color: #fff;
}

.litepicker .container__days .day-item:not(.is-locked):hover::before,
body .litepicker .container__days .day-item:not(.is-locked):hover::before {
  opacity: 1;
}

.litepicker .container__days .day-item.is-locked, .litepicker .container__days .day-item.is-locked:hover,
body .litepicker .container__days .day-item.is-locked,
body .litepicker .container__days .day-item.is-locked:hover {
  color: #ccc;
}

.litepicker .container__days .day-item.is-today, .litepicker .container__days .day-item.is-today:hover,
body .litepicker .container__days .day-item.is-today,
body .litepicker .container__days .day-item.is-today:hover {
  color: #fff;
  background: none;
}

.litepicker .container__days .day-item.is-today::before,
body .litepicker .container__days .day-item.is-today::before {
  background: #fae177;
  opacity: 1;
}

.litepicker .container__days .day-item.is-in-range,
body .litepicker .container__days .day-item.is-in-range {
  background: none;
}

.litepicker .container__days .day-item.is-in-range::after,
body .litepicker .container__days .day-item.is-in-range::after {
  opacity: 1;
}

.litepicker .container__days .day-item.is-start-date,
body .litepicker .container__days .day-item.is-start-date {
  color: #fff;
  background: none;
}

.litepicker .container__days .day-item.is-start-date::before,
body .litepicker .container__days .day-item.is-start-date::before {
  background: #5985b8;
  opacity: 1;
}

.litepicker .container__days .day-item.is-start-date::after,
body .litepicker .container__days .day-item.is-start-date::after {
  left: 50%;
  opacity: 1;
}

.litepicker .container__days .day-item.is-end-date,
body .litepicker .container__days .day-item.is-end-date {
  color: #fff;
  background: none;
}

.litepicker .container__days .day-item.is-end-date::before,
body .litepicker .container__days .day-item.is-end-date::before {
  background: #5985b8;
  opacity: 1;
}

.litepicker .container__days .day-item.is-end-date::after,
body .litepicker .container__days .day-item.is-end-date::after {
  right: 50%;
  opacity: 1;
}

.litepicker.is-state2 .container__months .month-item .status-bar .status-str.state1,
body .litepicker.is-state2 .container__months .month-item .status-bar .status-str.state1 {
  display: none;
}

.litepicker.is-state2 .container__months .month-item .status-bar .status-str.state2,
body .litepicker.is-state2 .container__months .month-item .status-bar .status-str.state2 {
  display: block;
}

.litepicker.is-state3 .container__months .month-item .status-bar .status-str.state1,
body .litepicker.is-state3 .container__months .month-item .status-bar .status-str.state1 {
  display: none;
}

.litepicker.is-state3 .container__months .month-item .status-bar .status-str.state3,
body .litepicker.is-state3 .container__months .month-item .status-bar .status-str.state3 {
  display: block;
}
.date-inputs-group .hidden-status {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    visibility: hidden;
}
.month-item-header .button-next-month{display: block;}
.month-item-header .button-previous-month{display: block;}

</style>
-->

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
	<![endif]-->

</head>


@include('includes.front-header')
		<div class="top-area">
			<div class="container">
				<figure class="main-banner description-left">
					<div class="image">						 
						@if(!empty($Hotel_detail_image))
	 		 				<img class="lozad" src="#" data-src="{{url('/images/hotel-galleries/'.$Hotel_detail_image->hotel_id.'/others/hoteldetail/'.$Hotel_detail_image->h_image)}}" alt="Header Image">																	 
						@endif
 
					</div>

		<!--			<figcaption>
						<strong>Honeymooner</strong>
						<small>finden bei</small>
						<span>Meine Malediven</span>
						<b>die perfekten Angebote!</b>
						<p>Einfach Honeymoon in den Filtern auswählen.</p>
					</figcaption> -->

				</figure>
			</div>
		</div>



		<main class="main">
			<div class="container">

	<!--			<ul class="breadcrumbs" style="margin: 5px 0 5px 0;">
					<li><a href="{{url('/')}}">Startseite</a></li>
					<li><a href="#">Hotelsuche</a></li>
					<li>{{$hotels->hotel_name}}</li>
				</ul> -->

				<div class="content-area">
					<div class="row">
						<div class="col-lg-3 col-xl-3">
							<div class="hotel-search-form side-search-form">
								<form action="{{route('hotel-search')}}" method="post">
									@csrf
									<h3>Suche</h3>
									<div class="hotel-search-input">
										<!-- <input placeholder="Hotels" type="search" class="form-control samefld"> -->
										<select id="hotel_selection" name="hotel_id"  class="form-control js-example-basic-single2" required>
											<option></option>

											@php

											$hotels1 = \App\Hotel::where('status',1)->get();
											@endphp
						                    @foreach($hotels1 as $hotel)
						                      <option alt="{{$hotel->url_key}}" value="{{$hotel->id}}" @if($search_data['hotel_id']==$hotel->id) selected @endif @if($hotels->ids==$hotel->id) selected @endif >{{$hotel->hotel_name}}</option>
						                    @endforeach
										</select>
										<div style="height: 10px"></div>
										<select required class="form-control samefld js-example-basic-single3" name="room_id" id="room_id" aria-label="Default select example">
										  <option value="0"></option>

										</select>


										<div class="autocomplete">
											<h3>Hotels</h3>
											<div class="list-hold"></div>
										</div><!-- autocomplete -->
									</div><!-- end hotel-search-input -->

									<!-- <div style="display:none" id="date_selection" class="t-datepicker" style="margin-bottom: 15px;">
									  <div class="date-input-box t-check-in">
									  	<span>Anreise</span>
									  </div>
									  <div class="date-input-box t-check-out"></div>
									</div>
									<div style="clear:both"></div> -->


									<!-- <div class="mbsc-grid">
										<div class="mbsc-form-group">
											<div class="mbsc-row">
												<div class="mbsc-col-12" style="padding: 0px">
													<label class="md-mobile-picker-box-label" style="margin: 0px">
														<input id="demo-mobile-picker-mobiscroll" mbsc-input data-label-style="stacked" data-input-style="box" placeholder="Start & End Date" />
													</label>
												</div>
											</div>
										</div>
									</div> -->

									<div class="date-inputs-group">
										<div class="date-inputs-group-cell">
											<div class="date-input-box">
												<label for="datepicker-01">Anreise</label>
												<div class="date-input">
													<input placeholder="Anreise" name="start_date" type="text" class="form-control datepicker" id="datepicker-01">
													<label for="datepicker-01" class="date-input-label">&nbsp;</label>
												</div><!-- end date-input -->
											</div><!-- end date-input-box -->
										</div><!-- end date-inputs-group-cell -->
										<div class="date-inputs-group-cell">
											<div class="date-input-box">
												<label for="datepicker-02">Abreise</label>
												<div class="date-input">
													<input placeholder="Abreise" name="end_date" type="text" class="form-control datepicker" id="datepicker-02">
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


									<div class="guests-box" style="margin-top: 10px;">
										<div class="guests-opener">
											<small>Reisende</small>
											<span><span class="adults-num">{{ $search_data['erwachsene'] }}</span> Erwachsene, <span class="childs-num">{{ $search_data['kinder'] }}</span> Kinder, <span class="rooms-num">{{ $search_data['zimmer'] }}</span> Kleinkinder</span>
										</div><!-- end guests-opener -->
										<div class="guests-dropdown">
											<div class="guests-dropdown-inner">

												<div class="guests-dropdown-section">
													<div class="guests-dropdown-row">
														<span class="guests-dropdown-title">Erwachsene <small>
														{{$hotels->cpfr_adult_min}} - {{$hotels->cpfr_adult_max}} Jahre sadas</small></span>
														<div class="person-num-hold">
															<div class="num-box num-box-adult" data-max="6" data-min="1">
																<a href="#" class="btn-decrease">decrease</a>
																<input name="erwachsene" type="text" value="{{$search_data['erwachsene'] ?? 2}}" class="adults-input">
																<a href="#" class="btn-increase inc-adults">increase</a>
															</div><!-- end num-box -->
														</div><!-- end person-num-hold -->
													</div><!-- end guests-dropdown-row -->
												</div><!-- end guests-dropdown-section -->

												@if($hotels->cpfr_child_min >0)
												<div class="guests-dropdown-section">
													<div class="guests-dropdown-row">
														<span class="guests-dropdown-title">Kinder <small>{{$hotels->cpfr_child_min}} - {{$hotels->cpfr_child_max}} Jahre</small></span>





														<div class="person-num-hold">
															<div class="num-box num-box-kinder" data-min="0" data-max="4">
																<a href="#" class="btn-decrease dec-children">decrease</a>
																<input name="kinder" type="text" value="{{$search_data['kinder'] ?? 0}}" class="childs-input" id="kinder_input">
																<a href="#" class="btn-increase inc-children">increase</a>
															</div><!-- end num-box -->
														</div><!-- end person-num-hold -->
													</div><!-- end guests-dropdown-row -->


													<ul class="guests-child-list" id="kinder_input-li">


													</ul><!-- end guests-child-list -->
												</div><!-- end guests-dropdown-section -->
												@endif
												@if($hotels->cpfr_baby_min >0)
												<div class="guests-dropdown-section">
													<div class="guests-dropdown-row">
														<span class="guests-dropdown-title">Kleinkinder <small>{{$hotels->cpfr_baby_min}} - {{$hotels->cpfr_baby_max}} Jahre</small></span>
														<div class="person-num-hold">
															<div class="num-box" data-max="4" data-min="1">
																<a href="#" class="btn-decrease">decrease</a>
																<input name="kleinkinder" type="text" class="rooms-input" value="{{$search_data['kleinkinder'] ?? 1}}">
																<a href="#" class="btn-increase">increase</a>
															</div><!-- end num-box -->
														</div><!-- end person-num-hold -->
													</div><!-- end guests-dropdown-row -->
												</div><!-- end guests-dropdown-section -->
												@endif


												<div class="guests-dropdown-section">
													<div class="guests-dropdown-row">
														<span class="guests-dropdown-title">Zimmer hinzufügen</span>
														<div class="person-num-hold">
															<div class="num-box">
																<a href="#" class="btn-decrease">decrease</a>
																<input type="text" name="zimmer"  value="{{$search_data['zimmer'] ?? 1}}" class="rooms-input">
																<a href="#" class="btn-increase">increase</a>
															</div><!-- end num-box -->
														</div><!-- end person-num-hold -->
													</div><!-- end guests-dropdown-row -->
												</div><!-- end guests-dropdown-section -->
											</div><!-- end guests-dropdown-inner -->
										</div><!-- end guests-dropdown -->
									</div><!-- end guests-box -->

									<div class="btn-row">
										<button type="submit" class="btn btn-md btn-primary submit_booking">Auswahl ändern</button>

									</div><!-- end btn-row -->
								</form>
							</div><!-- end hotel-search-form -->


<!-- Aside Hotel Detail Page Island -->

							<div class="side-info">
									@if(isset($hotels->island_name->island_name))
								<div class="block">
									<figure>
										@php

											$island_images = App\Island_image::where('island_id',$hotels->island)->orderBy('id','desc')->get();
											//dd($island_images);
										@endphp
										@if(count($island_images)>0)
											<img class="lozad" src="#" data-src="{{url('/images/island/'.$island_images[0]->image_name)}}" alt="#">


										@else
											<img class="lozad" src="#" style="max-height:192px" data-src="{{url('/images/template/no_image_available.png')}}" alt="#">
										@endif

										<figcaption>{{ @$hotels->island_name->island_name }} </figcaption>
									</figure>
									<div class="text-hold">
										<h3>Insel</h3>
										<ul>
											@php

												$hotell = App\Hotel::findorfail($hotels->ids);
											@endphp
											{!!$hotell->islandd->description!!}
										</ul>
									</div>
									<div class="btn-hold">
										<a href="{{route('islands-view',$hotels->island)}}" class="btn btn-sm btn-outline-primary">Mehr Infos zur Insel</a>
									</div>
								</div><!-- block -->
									@endif
									 
									 
									@if(@$booking_text_regular_prices->free_container != "")
										<div class="block">
											<div class="text-hold">
												<h3>Child Policy</h3>
												<ul>
													<p>
														{!!@$booking_text_regular_prices->free_container!!}
													</p>

												</ul>
											</div>
										</div><!-- block -->
									@endif
									 
								@php

									$transferData = App\Transfer::where('hotel_id',$HotelID)->get();
									//dd($transferData);
								@endphp
								@if(count($transferData))

								@if($transferData[0]->description)
									<div class="block">
										<div class="text-hold">
											<h3>Transfer</h3>
											<ul>
												{!! $transferData[0]->description !!}

											</ul>
										</div>
									</div><!-- block -->
								@endif
								@if($hotels->child_policy_for_rates)
									<!-- Child Policy -->
									<div class="block">
										<div class="text-hold">
											<h3>Kinder Regelung</h3>
											<ul>
												<p>{!! $hotels->child_policy_for_rates !!}</p>
											</ul>
											<ul>
												@if($hotels->cpfr_baby_min || $hotels->cpfr_baby_max)
													<li>													
														Baby = {{$hotels->cpfr_baby_min}} bis {{$hotels->cpfr_baby_max}} Jahre													
													</li>
												@endif
												@if($hotels->cpfr_child_min || $hotels->cpfr_child_max)
													<li>														
														Kind  = {{$hotels->cpfr_child_min}} bis {{$hotels->cpfr_child_max}} Jahre													
													</li>
												@endif
												@if($hotels->cpfr_teen_min || $hotels->cpfr_teen_max)
													<li>													
														Teen  = {{$hotels->cpfr_teen_min}} bis {{$hotels->cpfr_teen_max}} Jahre													
													</li>
												@endif
												@if($hotels->cpfr_adult_min || $hotels->cpfr_adult_max)
													<li>													
														Erwachsene  = {{$hotels->cpfr_adult_min}} ab {{$hotels->cpfr_adult_max}} Jahre													
													</li>
												@endif
											</ul>
										</div>
									</div><!-- block -->
								@endif
								@endif
								<div class="block">
									<div class="text-hold">
										<h3>Hotel auf Karte anzeigen</h3>
									</div>
									<div class="map-hold">
										@php

										@endphp
										<a data-fancybox data-options='{"iframe" : {"css" : {"width" : "100%", "height" : "100%"}}}' href="https://www.google.com/maps/search/?api=1&query={{$hotels->hotel_google_coordinates}}"><img class="lozad" src="#" data-src="https://www.my-maldives.com/images/front/img-007.jpg" alt="#"></a>
									</div>
								</div><!-- block -->

								@if(count($gallery_images)>0)
								@php
									$imageCount = 1;
								@endphp

								<div class="block">
									<div class="text-hold">
										<h3>Bildergalerie</h3>
									</div>
									<ul class="gallery-list">
										@foreach($gallery_images as $gallery_image)
										<?php
										$galleryext = explode(".", $gallery_image);
										$path = "https://www.my-maldives.com/images/hotel-galleries/".$hotels->ids."/".$hotels->ids."-".$imageCount.".".$galleryext[1];
										$rel_path = public_path('images/hotel-galleries/'.$hotels->ids."/".$hotels->ids."-".$imageCount.".".$galleryext[1]);
										// print_r($path);

										// print_r(file_exists($path));

										 ?>
										 	@if(file_exists($rel_path))
												@if($imageCount < 10)

													<li><a data-fancybox="gallery" href="{{$path}}"><img class="lozad" src="{{$path}}" data-src="{{$path}}" alt="#"></a></li>
												@else
													<li style="display: none"><a data-fancybox="gallery" href="{{$path}}"><img class="lozad" src="{{$path}}" data-src="{{$path}}" alt="#"></a></li>

												@endif
												@php
													$imageCount++;
												@endphp
											@endif
										@endforeach
									</ul>
								</div><!-- block -->

								@endif
								<div class="bookmarks-box">
									<h4>Merkliste <small style="opacity: 50%">(Max 10)</small></h4>
									<span class="amount"><a href="javascript:void(0)" onclick="gotoTeaserAndShowBookmarkded()" data-toggle="collapse" data-target="#bookmarkDiv"><span class="val" id="bookmarkNumber">0</span> Hotels</a></span>
									<!-- <a href="#" class="btn-close" onclick="clearBookmark()"></a> -->
									<div id="bookmarkDiv" class="collapse">

										 	<ul class="check-list" id="bookmarkList" style="display: none">


											</ul>
									</div>
								</div><!-- bookmarks-box -->
							</div><!-- side-info -->
						</div><!-- end col-xl-3 -->


						<div class="col-lg-9 col-xl-9">
							<div class="intro-block">
								<div class="heading-row">

								<h1>{{$hotels->hotel_name}} </h1>
									@if($hotels->stars ==1)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>

									</ul><!-- end rating-widget -->


								@elseif($hotels->stars ==2)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>
										<li>2</li>

									</ul><!-- end rating-widget -->


								@elseif($hotels->stars ==3)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>
										<li>2</li>
										<li>3</li>

									</ul><!-- end rating-widget -->


								@elseif($hotels->stars ==3.5)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>
										<li>2</li>
										<li>3</li>

									</ul><!-- end rating-widget -->


								@elseif($hotels->stars ==4)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>

									</ul><!-- end rating-widget -->


								@elseif($hotels->stars ==4.5)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>

									</ul><!-- end rating-widget -->


								@elseif($hotels->stars ==5)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul><!-- end rating-widget -->


								@elseif($hotels->stars ==5.5)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
									</ul>

								@elseif($hotels->stars ==6)

									<ul class="rating-widget rating-widget-md">
										<li>1</li>
										<li>2</li>
										<li>3</li>
										<li>4</li>
										<li>5</li>
										<li>6</li>
									</ul>
								</li>
								@endif
								</div>

								<!-- <div class="review-rating tl mb-2"><span class='fa fa-star'></span><span class='fa fa-star'></span></div>
							 -->
								<ul class="room-meta-items">
								<!--Stars added-->

								<!-- <span class='fa fa-star-half-o'> -->
									@if(isset($hotels->island_name->island_name))
									<li>{{@$hotels->island_name->island_name}}, {{@$hotels->atoll->atoll_name}}</li>
									@endif
									<li><a data-fancybox data-options='{"iframe" : {"css" : {"width" : "100%", "height" : "100%"}}}' href="https://www.google.com/maps/search/?api=1&query={{$hotels->hotel_google_coordinates}}">Hotel auf der Karte anzeigen</a></li>
								</ul><!-- end room-meta-items -->
								@php
									//dd($hotels);
								@endphp
								<p>{!!$hotels->hotel_detail_page!!}</p>
							</div><!-- end intro-block -->
							 
							@if($hotels->hotel_name && $search_data['date1'] && $search_data['date2'])
								<ul class="search-results-titles " style="z-index: 12;">								
									<li>Ihre Auswahl</li>
									<li>{{$search_data['date1']}} -   {{$search_data['date2']}}</li>
									<li> {{$search_data['days']}} Nächte</li>
									<li>
									{{ $search_data['erwachsene']}} Erwachsene, {{ $search_data['kinder']}} Kinder, {{ $search_data['zimmer']}} Zimmer 
									</li>
									<li>
									 {{ $hotels->hotel_name }}
									</li>
								</ul>
								<!-- end search-results-titles -->
							@endif
							@if($rooms)
							<ul class="rooms-list">
								
								@foreach($rooms as $room)
								<li>
									<div class="room-item">
										<div class="room-item-body">
											<div class="room-item-description">
												@php
													$room_imgs = App\Room_image::where('room_id',$room->id)->get();
												@endphp

												<div class="image">
													<a href="#">
														@if(count($room_imgs)>0)
															<img class="lozad" src="#" data-src="{{url('/images/room/'.$room_imgs[0]->room_image)}}" alt="image description">
														@else
															<img class="lozad" style="max-height: 122px;max-width: 188px" src="#" data-src="{{url('/images/template/no_image_available.png')}}" alt="image description">
														@endif
													</a>
												</div>

												<div class="description">
													<div class="description-top">
														<h2>{{$room->room_name}} <small>({{$room->room_size}} m²)</small></h2>
														<p>
															Max. 
															@if($room->occupancy_adults1 || $room->occupancy_childs1 || $room->occupancy_adults2 || $room->occupancy_childs2)
																{{$room->occupancy_adults1}}
																@if($room->occupancy_adults1 == 1 )
																Erwachsener
																@else 
																Erwachsene 
																@endif
																  
																@if($room->occupancy_childs1)
																 + {{$room->occupancy_childs1}} 
																	@if($room->occupancy_childs1 == 1)
																		Kind 
																	@else 
																		Kinder 
																	@endif
																@endif
																oder 
																@if($room->occupancy_adults2) {{$room->occupancy_adults2}}
																	@if($room->occupancy_adults2 == 1 )
																		Erwachsener
																	@else 
																		Erwachsene 
																	@endif
																@endif
																
																@if($room->occupancy_childs2)
																+ {{$room->occupancy_childs2}} 
																	@if($room->occupancy_childs2 == 1)
																		Kind 
																	@else 
																		Kinder 
																	@endif
																@endif 
															@else 
																Zimmerbelegung = {{$room->max_room_occupancy}} 
																@if($room->max_room_occupancy == 1) 
																Person 
																@else Personen 
																@endif
															@endif
														</p>
													</div>
												</div>


												<div class="label-box">
													<span class="room-item-label">All Inclusive Verpflegung</span>
												</div><!-- end label-box -->
											</div><!-- end room-item-description -->

												<div class="room-item-bottom">
													<a data-options='{"touch" : false}' data-fancybox data-src="#modal-{{$room->id}}" href="#" class="room-details-opener">Zimmerbeschreibung und Bilder</a>
												</div><!-- end room-item-bottom -->

										</div><!-- end room-item-body -->
										<div class="room-item-footer">
											@php

											@endphp
						      			<script type="text/javascript">
						      				$(".adults-num").text(<?= $search_data['erwachsene'] ?>)
						      				$(".childs-num").text(<?= $search_data['kinder'] ?>)
						      				$(".adults-input").val(<?= $search_data['erwachsene'] ?>)
						      				$(".childs-input").val(<?= $search_data['kinder'] ?>)
						      				if ($(".childs-input").val() == 0) {
					      						$(".guests-child-list").html(null)
						      				}
						      			</script>
						      			@php
												$room_rates = App\HotelSessionPrice::where('RoomId','=',$room->id)->get();
												// dd($search_data['date1'],$room_rates);
											      if(count($room_rates) && $search_data['date1']){
											      	// dd("hello123");
											      	$start_date = $search_data['date1'];
											      	// $start_date = explode(".", $start_date);
        										// 	$start_date = $start_date[2] . "-" . $start_date[1] . "-" . $start_date[0];

											      	$end_date = $search_data['date1'];
											      	$end_date = explode(".", $end_date);
        											$end_date = $end_date[2] . "-" . $end_date[1] . "-" . $end_date[0];
											      	$hotel_id = $hotels->ids;

											      	$session_id = DB::table("hotel_sessions")
										                ->select('id')
										                ->where('HotelId', '=', $hotel_id)
										                ->where('Start', '<=', $start_date)
										                ->where('End', '>=', $end_date)
										                ->orderBy('id', "DESC")
										                ->first();

										                if (isset($session_id->id)) {
											      	$room_data =   \DB::table('hotel_session_prices')->where('RoomId','=',$room->id)->where('SessionId', '=', $session_id->id)->orderBy('id', "DESC")->first();
											      	// dd($room_data);
											      		}else{
											      			$room_data = null;
											      		}
											      	$roomExtraPax = $room->getChilredAdults($search_data, $room->policy_child, $room->policy_baby);
											      	// dd($search_data,$roomExtraPax);
											      	$room_price = 0;
											      	// dd($price_type,$roomExtraPax);
											      	if (isset($room_data->$price_type)) {


											      		if($price_type == "PriceRoom"){
											      			$extrapax = $search_data['erwachsene'] - $room_data->ShowPricePerson;
											      			$roomExtraPax['extra'] = $extrapax;
											      			$room_price = $room_data->$price_type;
											      			// dd($room_price);
											      		}else {
											      			$room_price = $room_data->$price_type;
												      		// dd($room_price,$roomExtraPax['extra']);

											      		}
											      		// if ($roomExtraPax['extra']) {
											      		if (false) {

											      			@endphp
												      			<script type="text/javascript">
												      				$(".adults-num").text(<?= $roomExtraPax['erwachsene'] ?>)
												      				$(".childs-num").text(<?= $roomExtraPax['kinder'] ?>)
												      				$(".adults-input").val(<?= $roomExtraPax['erwachsene'] ?>)
												      				$(".childs-input").val(<?= $roomExtraPax['kinder'] ?>)
												      				if ($(".childs-input").val() == 0) {
											      						$(".guests-child-list").html(null)
												      				}
												      			</script>
												      			@php
												      			$room_price += ($room_data->PriceExtraPax * $roomExtraPax['extra']);
												      			// dd($room_price);
												      		}else{
												      			$room_price += ($room_data->PriceExtraPax * $roomExtraPax['extra']);
												      			// $room_price = $room_price * $roomExtraPax['erwachsene'];
												      		}
												      		// dd($room_price,$roomExtraPax['extra'],);
											      		if($search_data['kinder'] > 0){
											      			$kinderPriceTotal = $search_data['kinder'] * $room_data->PriceKind2;
											      		}else{
											      			$kinderPriceTotal = 0;
											      		}
											      		$room_price += $kinderPriceTotal;
											      	} else {
											      		$room_price = 0;
											      	}
											      	// dd($room_price);
											      	if ($room_price > 0) {
											      		if ($search_data['date1']) {

												      		$start_date = $search_data['date1'];
												      		$end_date = $search_data['date2'];
												      		// $start_date = explode(".",$search_data['date1']);
												      		// $end_date = explode(".",$search_data['date2']);
												      		// $start_date = $start_date[2] . "-" . $start_date[1] . "-" . $start_date[0];
												      		// $end_date = $end_date[2] . "-" . $end_date[1] . "-" . $end_date[0];

												      		$discount = App\Discount::where('hotel_id', "=", $hotels->ids)->where("room_id", "=", $room->room_name)->where("booking_period_from", "<=", $start_date)->where("booking_period_to", ">=", $end_date)->first();

												      		if ($discount) {
												      			if ($discount->discount_type == "Fix Amount") {
												      				$room_price -= $discount->reduction;
												      			} else {
												      				$room_price = $room_price - ($room_price * ($discount->reduction / 100));
												      			}
												      		}
												      	}

												      	$euro_value = App\Currency::where('id',2)->get();

												      	$room_price_euro = round($room_price * 0.845);
												      	// dd($room_price_euro);
											      		$zimmer = (int)$search_data['zimmer'];
												      	$euro_value = App\Currency::find(1);
												      	if($hotels->invoice_currency =="euro"){
												      		$room_price = $room_price;
												      	}else{
												      		$room_price = round($room_price * $euro_value->exchange_value);
												      	}
												      	// dd($room_price);
											      	} else {
											      		$room_price = 0;
											      	}
											      }else{
											      	$room_price = 0;
											  	  }

											@endphp
											@if ($search_data['date1'] && $search_data['date2'])
												@if ($room_price != 0)
													<h3>Gesamtaufenthaltspreis</h3>
												@endif
											@else
												@if ($room_price != 0)
													<h3>Zimmerpreis p. Nacht</h3>
												@endif
											@endif
											@if($room_price ==0)
												{{-- $room_price ==0 --}}
												<span class="hotel-price-note">Dieses Hotel ist zur Zeit <strong>nur auf Anfrage</strong> buchbar. <!-- <br>Bitte stellen Sie eine Anfrage. --></span>
												 <a href="javascript:void(0)" style="margin-top: 15px"class="btn btn-block btn-md btn-primary">Anfrage stellen</a>
											@else
												<?php
													$nights = !empty($search_data['days']) ? $search_data['days'] : 1;
												?>
												@if(false)
													<span class="room-price"><small><!-- ab --></small> {{$room_price * $nights }} <span class="€">$</span></span>
													<span class="room-price-note">Geben Sie Ihre Reisedaten ein um sich den Aufenthaltspreis anzeigen zu lassen.</span>
												@else
													<span class="room-price"><small><!-- ab --></small> {{$room_price_euro * $nights }} <span class="€">€</span></span>
													@if ($search_data['date1'] && $search_data['date2'])
													<div class="btn-row">
														From room rates
														{{-- <a href="javascript::void(0)" class="btn btn-block btn-md btn-primary">weiter zur Buchung</a> --}}
													</div>
													@else
													<span class="room-price-note">Geben Sie Ihre Reisedaten ein um sich den Aufenthaltspreis anzeigen zu lassen.</span>
													@endif
												@endif
											@endif

										</div><!-- end room-item-footer -->
									</div><!-- end room-item -->
									


										<div class="modal" id="modal-{{$room->id}}">
											<div class="d-md-flex">
												<div class="gallery">
													<div class="slider">
														@if(count($room_imgs)>0)
															@foreach($room_imgs as $room_img)
														<div class="slide">
															<figure>
																<img src="#"   data-lazy="{{url('/images/room/'.$room_img->room_image)}}" alt="#">
															</figure>
														</div>
															@endforeach
														@else
															<div class="slide">
																<figure>
																	<img src="#" style="max-height: 414px;max-width: 618px" data-lazy="{{url('/images/template/no_image_available.png')}}" alt="#">
																</figure>
															</div>
														@endif

													</div><!-- slider -->
													<div class="thumbs">
														@if(count($room_imgs)>0)
															@foreach($room_imgs as $room_img)
														<div class="slide">
															<figure>
																<img src="#" data-lazy="{{url('/images/room/'.$room_img->room_image)}}" alt="#">
															</figure>
														</div>
															@endforeach
														@else
															<div class="slide">
																<figure>
																	<img src="#" data-lazy="{{url('/images/template/no_image_available.png')}}" alt="#">
																</figure>
															</div>

														@endif

													</div><!-- thumbs -->
												</div>

												<!-- Occupancy Room Box -->
												<div class="descr">

													<div class="block">
														<h3>{{$room->room_name}}</h3>
														 
													</div>


													<div class="block">
														{!!$room->description!!}
													</div><!-- block -->
												</div><!-- descr -->
											</div>
											<div class="extra-info">
												<div class="row">
													<div class="col-md-12">
														<div class="row">
														{!!$room->room_amenities!!}

														</div>
													</div>

												</div>
											</div><!-- extra-info -->
										</div><!-- end modal -->


								</li>
								@endforeach

							</ul><!-- end rooms-list -->
							@endif
							<div> <p><small>Eventuell sind weitere Zimmerkategorien vorhanden. Bitte fragen Sie gesondert an: <b>Tel: 0800 555 62 73</b></small></p></div>
							@php

							$hotel_includes = App\Hotelinclude::where('hotel_id',$hotels->ids)->where('status',1)->orderBy('position')->get();

							@endphp
							@if(count($hotel_includes) > 0)
							<div class="services-block">
								<?php if ($room_price != 0) : ?>
									<h3>Im Zimmerpreis enthalten</h3>
								<?php endif; ?>
								<ul class="services-list">
									@foreach($hotel_includes as $hotel_include)
									<li>
										<div class="service-box">
											<div class="ico"><img class="lozad" src="#" data-src="{{url('/images/include/',$hotel_include['include_icon'])}}" alt="{{$hotel_include['include_name']}}"></div>
											<p>{{$hotel_include['include_name']}}</p>
										</div><!-- end service-box -->
									</li>
									@endforeach
								</ul><!-- end services-list -->
							</div><!-- end services-block -->
							@endif

							@if($hotels->inclusive)
							<div class="services-info">
								<h2>Im Zimmerpreis enthalten</h2>
								<div class="row">
									<div class="col-md-12">
										<ul class="inclusive-info">
										{!!$hotels->inclusive!!}
										</ul>
									</div>
								</div>
							</div>
							@endif

							<div class="services-info">
								<h2>Hotelausstattung &amp; Services</h2>
								<div class="row">
									<div class="col-md-6">
										@if($hotels->text_hotel)
											<h3>Hotel</h3>
											<ul>{!!$hotels->text_hotel!!}</ul>
										@endif
										@if($hotels->hotel_features)
											<h3>Hotelausstattung</h3>
											<ul>{!!$hotels->hotel_features!!}</ul>
										@endif
										@if($hotels->catering)
											<h3>Verpflegung</h3>
											<ul>{!!$hotels->catering!!}</ul>
										@endif
										@if($hotels->guestservice)
											<h3>Gästeservice</h3>
											<ul>{!!$hotels->guestservice!!}</ul>
										@endif
										<h3><i class="ico-wi-fi"><img class="lozad" src="#" data-src="https://www.my-maldives.com/images/template/ico-wi-fi-gray.png" alt="image description"></i>Wi-Fi / Internet</h3>
										{!!$hotels->wifi!!}
										<div class="icon-block">
											@if($hotels->accessible =="yes")
												<div class="ico"><img class="lozad" src="#" data-src="https://www.my-maldives.com/images/template/wheel-chair-yes.svg" alt="image description"></div>
											@else
												<div class="ico"><img class="lozad" src="#" data-src="https://www.my-maldives.com/images/template/wheel-chair-no.svg" alt="image description"></div>

											@endif
											<div class="block">
												<h3>Personen mit eingeschränkter Mobilität</h3>
												@if($hotels->accessible =="yes")
													<p>Das Resort ist für Personen mit eingeschränkter Mobilität geeignet</p>
												@elseif($hotels->accessible =="no")
													<p>Das Resort ist nicht für Personen mit eingeschränkter Mobilität geeignet</p>
												@else
													<p>Das Resort ist teilweise für Personen mit eingeschränkter Mobilität geeignet</p>
												@endif
											</div>

										</div>
									</div>

									<div class="col-md-6">
										@if($hotels->spa_wellnaess)
										<h3>Spa und Wellness Angebote</h3>
										<ul>
											{!!$hotels->spa_wellnaess!!}

										</ul>
										@endif
										@if($hotels->sport_recreation)
										<h3>Sport &amp; Freizeitaktivitäten</h3>
										<ul>
											{!!$hotels->sport_recreation!!}
										</ul>
										@endif
										@if($hotels->entertainment)
										<h3>Unterhaltung</h3>
										<ul>
											{!!$hotels->entertainment!!}
										</ul>
										@endif
										<!-- Credit Cards -->
										<h3>Kreditkarten</h3>
										<p>Das Hotel akzeptiert die folgenden Kreditkarten:</p>
										<ul class="payment-list">
											@if(!empty($hotels->credit_cards))
													@php
														$cards = explode(";", $hotels->credit_cards);

													@endphp
													@if($cards)
														@foreach($cards as $card)
															@if($card == "visa")
																<li>
																	<img class="lozad" src="#" data-src="{{url('/images/template/logo-visa.png')}}" width="67" height="22" alt="Logo: Visa">

																</li>
															@elseif($card == "mc")
																<li>
																	<img class="lozad" src="#" data-src="{{url('/images/template/logo-mastercard.png')}}" width="53" height="32" alt="Logo: Mastercard">
																</li>
															@elseif($card == "ae")
																<li>
																	<img class="lozad" src="#" data-src="{{url('/images/template/logo-american-express.png')}}" width="39" height="39" alt="Logo: American Express">
																</li>
															@elseif($card == "up")

															@elseif($card == "dc")
																<li>
																	<img class="lozad" src="#" data-src="{{url('/images/template/logo-diners-club.png')}}" width="48" height="38" alt="Logo: Diners Club">
																</li>
															@endif
														@endforeach
													@endif

												@endif




										</ul>
									</div>
								</div>
							</div>


							<div class="arrival-departure-info">
								<h2>Anreise &amp; Abreise</h2>
								@php
								$bookingTextOnReq = App\Booking_text_regular_price::where('hotel_id',$HotelID)->first();
								//dd($bookingTextOnReq);
								@endphp
								@if(!empty($bookingTextOnReq))
								<ul class="time-info">
									<li>
										<h4>Check-in</h4>
										<p>{{$bookingTextOnReq->check_in}}</p>
									</li>
									<li>
										<h4>Check-out</h4>
										<p>{{$bookingTextOnReq->check_out}}</p>
										<!-- <p>bis 12:00 Uhr</p> -->
									</li>
								</ul><!-- end time-info -->
								@endif
								<p><span>Bei Check-in unbedingt erforderlich: Kreditkarte für Kautionshinterlegung</span></p>
								<div class="alert-box">
									<p>- Keine An- oder Abreise vom 30. Dezember bis 01. Januar möglich!</p>
								</div><!-- end alert-box -->
								<h3>Hinweise zum Check-in / Check-out</h3>
								<p>{!!@$bookingTextOnReq->info_check_in!!}</p>
								<h3>Mindestaufenthalt</h3>
								{!! $hotels->minimum_text !!}
							</div><!-- end arrival-departure-info -->
							<div class="testimonials-block">
								<h2>Kundenbewertungen</h2>
								<div class="row align-items-md-center">
									<div class="col-md-4">
										<div class="testimonials-info">
											<h3>2 Kundenbewertungen</h3>
											<ul class="rating-widget type2">
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li class="inactive">5</li>
											</ul><!-- end rating-widget -->
											<p>Empfehlungsrate 4 von 5 Sternen</p>
										</div><!-- end testimonials-info -->
									</div><!-- end col-md-4 -->
									<div class="col-md-8">
										<div class="testimonials-carousel">
											<div class="slides">
												<div class="slide">
													<h4>Peter M. <small>(35 J. aus Deutschland, reiste mit Familie)</small></h4>
													<ul class="testimonials-list">
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-01.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-02.png" alt="image description">
																	</li>
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-03.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-04.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
													</ul><!-- end testimonials-list -->
												</div><!-- end slide -->
												<div class="slide">
													<h4>Peter M. <small>(35 J. aus Deutschland, reiste mit Familie)</small></h4>
													<ul class="testimonials-list">
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-01.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-02.png" alt="image description">
																	</li>
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-03.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-04.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
													</ul><!-- end testimonials-list -->
												</div><!-- end slide -->
												<div class="slide">
													<h4>Peter M. <small>(35 J. aus Deutschland, reiste mit Familie)</small></h4>
													<ul class="testimonials-list">
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-01.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-02.png" alt="image description">
																	</li>
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-03.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
														<li>
															<div class="question-block">
																<div class="block">
																	<p><a href="#">Wie wurden Sie bei Meine Malediven beraten?</a></p>
																</div><!-- end block -->
																<ul class="smiles">
																	<li>
																		<img src="https://www.my-maldives.com/images/front/ico-smile-04.png" alt="image description">
																	</li>
																</ul><!-- end smiles -->
															</div><!-- end question-block -->
														</li>
													</ul><!-- end testimonials-list -->
												</div><!-- end slide -->
											</div><!-- end slides -->
										</div><!-- end testimonials-carousel -->
									</div><!-- end col-md-8 -->
								</div><!-- end row -->
							</div><!-- end testimonials-block -->

							<ul class="posts-list">

								<li>
									<figure class="post-card">
										<div class="post-card-image">
											<img class="lozad" src="#" data-src="https://www.my-maldives.com/images/front/img-17.jpg" alt="image description">
										</div><!-- end post-card-image -->
										<figcaption>
											<div class="post-card-body">
												<h3>Honeymoon im Huafen Fushi Resort</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do ei</p>
											</div><!-- end post-card-body -->
											<div class="post-card-footer">
												<a href="#" class="btn btn-circle btn-primary">Infos</a>
											</div><!-- end post-card-footer -->
										</figcaption>
									</figure><!-- end post-card -->
								</li>


								<li>
									<figure class="post-card">
										<div class="post-card-image">
											<img class="lozad" src="#" data-src="https://www.my-maldives.com/images/front/img-17.jpg" alt="image description">
										</div><!-- end post-card-image -->
										<figcaption>
											<div class="post-card-body">
												<h3>Honeymoon im Huafen Fushi Resort</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do ei</p>
											</div><!-- end post-card-body -->
											<div class="post-card-footer">
												<a href="#" class="btn btn-circle btn-primary">Infos</a>
											</div><!-- end post-card-footer -->
										</figcaption>
									</figure><!-- end post-card -->
								</li>


								<li>
									<figure class="post-card">
										<div class="post-card-image">
											<img class="lozad" src="#" data-src="https://www.my-maldives.com/images/front/img-18.jpg" alt="image description">
										</div><!-- end post-card-image -->
										<figcaption>
											<div class="post-card-body">
												<h3>Honeymoon im Huafen Fushi Resort</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do ei</p>
											</div><!-- end post-card-body -->
											<div class="post-card-footer">
												<a href="#" class="btn btn-circle btn-primary">Infos</a>
											</div><!-- end post-card-footer -->
										</figcaption>
									</figure><!-- end post-card -->
								</li>

							</ul>



						</div><!-- end col-xl-9 -->
					</div><!-- end row -->
				</div><!-- end content-area -->
			</div><!-- end container -->
		</main>
	</div>





	<div id="footer">
	<div class="top">
	<div class="container">
	<div class="row">
	<div class="col-3"><strong class="footer-logo"><a href="https://www.my-maldives.com">Meine Malediven Hotels</a></strong></div>
	<div class="col-2">
	<ul class="footer-links">
	<li><a href="https://www.my-maldives.com/teaser-page">Hotels der Malediven</a></li>
	<li><a href="https://www.my-maldives.com/informationen">Informationen</a></li>
	<li><a herf="https://www.my-maldives.com/atolle">Atolle</a></li>
	</ul>
	</div>
	<div class="col-2">
	<ul class="footer-links">
	<li><a href="https://www.my-maldives.com/kontakt">Kontakt</a></li>
	<li><a href="https://www.my-maldives.com/impressum">Impressum</a></li>
	<li><a href="https://www.my-maldives.com/datenschutz">Datenschutz</a></li>
	<li><a href="https://www.my-maldives.com/agb">AGB</a></li>
	</ul>
	</div>
	<div class="col-2">
	<ul class="footer-links">
	<li><a href="https://www.my-maldives.com/faq">FAQ/Hilfe</a></li>
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
<li><img src="https://www.my-maldives.com/images/template/logo-visa.png" alt="image description"></li>
<li><img src="https://www.my-maldives.com/images/template/logo-mastercard.png" alt="image description"></li>
</ul>
</div>

<div class="col-6 d-flex justify-content-end">
</div>

</div></div></div></div>





	</div><!-- end wrapper -->

	<div class="modal" id="modal-002">

	</div><!-- end modal -->


<script src="{{asset('js/front/moment-with-locales.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker-polyfills-ie11/dist/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>

<script src="{{ asset('js/front/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/front/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/front/slick.min.js')}}"></script>
<script src="{{asset('js/front/autocomplete-resorts.js')}}"></script>
<script src="{{asset('js/front/datepicker.js')}}"></script>
<script src="{{asset('js/front/datepicker-de.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/litepicker-polyfills-ie11/dist/index.js"></script>
<script src="{{asset('js/front/litepicker.js')}}"></script>
<script src="{{asset('js/front/moment-with-locales.min.js')}}"></script>


<script src="{{asset('js/front/lazyloader.js')}}"></script>
<script src="{{asset('js/front/jquery.sticky-kit.min.js')}}"></script>
<script src="{{asset('js/front/lozad.min.js')}}"></script>

<script src="{{asset('js/front/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/front/jquery-ui-touch-punch.min.js')}}"></script>
<script src="{{asset('js/front/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('js/front/select2.min.js')}}"></script>

	<!-- <script src="{{asset('js/front/moment.min.js')}}"></script> -->
	<!-- <script src="{{asset('js/front/mobiscroll.jquery.min.js')}}"></script>
	<link rel="stylesheet" href="{{ asset('css/mobiscroll.jquery.min.css') }}"> -->

	<script src="{{asset('js/front/scripts.js')}}"></script>

	<!-- new datepicker imports issue -->
	<!-- <script src="{{asset('js/front/moment.min.js')}}"></script>
	<script src="{{asset('js/front/jquery.daterangepicker.min.js')}}"></script>
	<link rel="stylesheet" href="{{ asset('css/daterangepicker.min.css') }}"> -->


	<script>

var urlLike3 = '{{ url('allHotels') }}';
		var allHotel;
		$.ajax({
				url: urlLike3,
				method:"GET",
				success:function(data){
					allHotel = data.allHotel;
				}
		})

function matchStart(params, data) {
    params.term = params.term || '';
    if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
        return data;
    }
    return false;
}


$('.js-example-basic-single2').select2({
	placeholder: "Suche Hotel",
	matcher: function(params, data) {
        return matchStart(params, data);
    },
});



$('.js-example-basic-single3').select2({
	    minimumResultsForSearch: -1,
	    placeholder: "Bitte wählen Sie",
});

@php
		$allHotel = \App\Hotel::all();
		$allHotel = json_encode($allHotel,true);
	// var hotelUrl = {{{{url('/hotel-page/')}}/`+value.url_key+`}}
	@endphp


function checkBookmarks(){
		var bookmarks = JSON.parse(localStorage.getItem("hotelBookmark")) || [];
		// console.log(bookmarks[0]);
		if(bookmarks.length){
			var bookmarkHtml = '';
			var bookmarkHotelCount = 0;
			var hotels = allHotel;
			 // hotels = hotels.replace(/(\r\n|\n|\r)/gm,"");

			 // hotels = hotels.replace("\r","\\r");
        	 hotels = JSON.parse(hotels);
        	var countBookmark = bookmarks.length;
			$.each(bookmarks, function(key,value){
	            var hotelid = value;
	            $('#addBookmark'+hotelid).hide();
        		$('#removeBookmark'+hotelid).show();
        		// console.log('hotels1233',hotels);

        		if (hotels.filter(function(e) { return e.id === value; }).length > 0) {

        			$.each(hotels, function(hotelkey,hotelvalue){
	        			if(hotelvalue.id == value){
	        				console.log("helohelo",value);
	        				bookmarkHtml += `<li><a target="_blank" href="{{url('/hotel-page/')}}/`+hotelvalue.url_key+`" class="list-group-item list-group-item-action">`+hotelvalue.hotel_name+`</a></li>`;
        					bookmarkHotelCount++;
	        			}
	        		})

        		}
        		if (key+1 === countBookmark) {
	        		$('#bookmarkList').html(bookmarkHtml);
	        		$('#bookmarkNumber').html(bookmarkHotelCount);

			    }
	        })

			console.log("bookmarkHotelCount",bookmarkHotelCount);

		}
	}


checkBookmarks();

function gotoTeaserAndShowBookmarkded(){
	localStorage.setItem("is_show_bookmarked",true);
	window.location.href = "{{ url('/teaser-page') }}";
}

function clearBookmark() {
	localStorage.removeItem("hotelBookmark");
	location.reload();

}

window.hotelMinStay = '{{ $hotels->minimum_stay }}';

function get_rooms(){
	var hotelID = $('#hotel_selection').val();
var urlLike4 = '{{ url('api/get_room_by_hotel') }}';
var room_html='';
	// var allHotel;
	$.ajax({
			url: urlLike4,
			method:"GET",
			data:{hotelID:hotelID},
			success:function(data){
				console.log("datarooms",data);
				hotel_rooms = data;
				room_html = '';
				room_html = '<option>Zimmername</option>';

				$.each(hotel_rooms, function(roomkey,roomvalue){
					// console.log("roomvalue",roomvalue);
        			room_html +='<option value="'+roomvalue.id+'" data-occupancy_adults1="'+roomvalue.occupancy_adults1+'" data-occupancy_adults2="'+roomvalue.occupancy_adults2+'" data-occupancy_childs1="'+roomvalue.occupancy_childs1+'" data-occupancy_childs2="'+roomvalue.occupancy_childs2+'" value="'+roomvalue.id+'">'+roomvalue.room_name+'<option>';
        		})

        		console.log("roomhtml",room_html);
        		$('#room_id').html(room_html);
			}
	})
}

$( "#hotel_selection" ).change(function() {
	var element = $(this).find('option:selected');
  var url_key = element.attr("alt");

  // $('#setMyTag').val(myTag);
	// var url_key = $('#hotel_selection').attr('alt');
	console.log("hotel val==",$('#hotel_selection').val());
	if($('#hotel_selection').val() == 'Suche Hotel' || $('#hotel_selection').val() == null){
		console.log("inside if--------------");
		setTimeout(500,function(){

			$('#date_selection').hide();
		})
	}else{

	window.location.href = "{{url('/hotel-page')}}/"+url_key;
	}
});

$( "#room_id" ).change(function() {
	console.log("roomvalue=",$('#room_id').val());
	if($('#room_id').val() != 0 && $('#room_id').val() !='Bitte wählen' && $('#room_id').val() != null){

		console.log("insideeeeeif");
    	$('#date_selection').show();
    }else{
    	console.log("insideeeeeelse");
    	$('#date_selection').hide();
    }
});

// $('#hotel_selection').on('change', function() {

// var hotelID = $('#hotel_selection').val();
// var urlLike4 = '{{ url('api/get_room_by_hotel') }}';
// var room_html='';
// 	// var allHotel;
// 	$.ajax({
// 			url: urlLike4,
// 			method:"GET",
// 			data:{hotelID:hotelID},
// 			success:function(data){
// 				console.log("datarooms",data);
// 				hotel_rooms = data;
// 				room_html = '';
// 				room_html = '<option>Bitte wählen</option>';

// 				$.each(hotel_rooms, function(roomkey,roomvalue){
//         			room_html +='<option value="'+roomvalue.id+'">'+roomvalue.room_name+'<option>';
//         		})

//         		console.log("roomhtml",room_html);
//         		$('#room_id').html(room_html);
// 			}
// 	})
// // alert( this.value );
// });

$(document).on('mouseup touchend ', function (e) {

	var container = $('.guests-box');
	if (!container.is(e.target) && container.has(e.target).length === 0) {
		$('.guests-box').removeClass('opened');
	}
});
</script>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#eaf7f7",
      "text": "#5c7291"
    },
    "button": {
      "background": "#56cbdb",
      "text": "#ffffff"
    }
  },
  "theme": "edgeless"
});


$( document ).ready(function() {
    get_rooms();
    setKinderInput();


    if($('#room_id').val() != 0){
    	$('#date_selection').show();
    }else{
    	$('#date_selection').hide();
    }



});


 function ClearFields() {
   document.getElementById("textfield1").value = "";
   document.getElementById("textfield2").value = "";
	}
$(function() {
   $('#textfield1').keypress(function(event) {
       event.preventDefault();
       return false;
   });
   $('#textfield2').keypress(function(event) {
       event.preventDefault();
       return false;
   });
});
function setKinderInput(){
		    var kinderCount = $('#kinder_input').val();
		    console.log("guests-child-input-box",kinderCount);
		    var kinderLi='';
		    var count = 1;
		    for (var i = 0; i < kinderCount; i++) {

		    	kinderLi += `<li>
												<label for="lbl-0>">Alter Kind `+count+`</label>
												<div class="guests-child-input-box">
													<input class="child-age-input" required name="alter_kind_`+kinderCount[i+1]+`" type="number" max="17" onkeyup="if(this.value > 18) this.value = 17;" min="1" class="form-control" value="" id="lbl-0`+kinderCount[i+1]+`">
												</div>
												<span>Jahre</span>
											</li>`;
											count++;
		    }
		    $('#kinder_input-li').html(kinderLi);
 		}
 $(function() {


 		$('#kinder_input').change(function(){
		    var kinderCount = $('#kinder_input').val();
		    console.log("guests-child-input-box on change",kinderCount);
		    var kinderLi='';
		    var count = 1;
		    for (var i = 0; i < kinderCount; i++) {

		    	kinderLi += `<li>
												<label for="lbl-0>">Alter Kind `+count+`</label>
												<div class="guests-child-input-box">
													<input class="child-age-input" required name="alter_kind_1" type="number" max="17" onkeyup="if(this.value > 18) this.value = 17;" min="1" class="form-control" value="" id="lbl-0`+kinderCount[i+1]+`">
												</div>
												<span>Jahre</span>
											</li>`;
											count++;
		    }
		    $('#kinder_input-li').html(kinderLi);
		  });

		});

//   $(function() {
//  	$('.guests-box').hide();

//  $(".date-picker-wrapper").click(function () {
//             $('.guests-box').show();
//         });

//  $("#reset_calendar").click(function () {
//             $('.guests-box').hide();
//         });




// 		});


$('form').submit(function () {

    // Get the Login Name value and trim it
    //var name = $.trim($('#log').val());

    // Check if empty of not
    // if (name === '') {
    //     alert('Text-field is empty.');
    //     return false;
    // }

    var rooms = $('#room_id');
        if (rooms.val() === '') {
            alert("Please select an item from the list and then proceed!");
            //$('#room_id').focus();

            return false;
        }
   });


</script>
</body>
</html>
