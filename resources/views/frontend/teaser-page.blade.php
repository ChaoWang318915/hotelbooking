<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Hotels und Gästehäuser auf den Malediven</title>

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
	<link rel="stylesheet" href="{{asset('css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/autocomplete-resorts.css')}}">
	<link rel="stylesheet" href="{{asset('css/frontstyles.css') }}">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
	<![endif]-->
	<script src="{{asset('js/front/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('js/front/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/front/slick.min.js')}}"></script>
	<script src="{{asset('js/front/autocomplete-resorts.js')}}"></script>
	<script src="{{asset('js/front/datepicker.js')}}"></script>
	<script src="{{asset('js/front/datepicker-de.js')}}"></script>
	<script src="{{asset('js/front/lazyloader.js')}}"></script>
	<script src="{{asset('js/front/jquery.sticky-kit.min.js')}}"></script>
	<script src="{{asset('js/front/lozad.min.js')}}"></script>
	<script src="{{asset('js/front/jquery.fancybox.min.js')}}"></script>
	<script src="{{asset('js/front/jquery-ui-touch-punch.min.js')}}"></script>
	<script src="{{asset('js/front/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('js/front/select2.min.js')}}"></script>


	<style>
	.loadinggif{position:fixed;top: 40%;left: 55%;z-index: 9999;height:40px;width:40px;}
	.stars li label.shiv{background: red}
	.review-rating .fa {font-size: 18px;margin-right: 0 !important;}

	.fa-star,
	.fa-star-half,.fa-star-half-o {color: #f8be15;font-size: 25px;margin-left: 0.1rem;}
	.fa-star,
	.fa-star-half,
	.tutorinfo__rating {display: inline-block;vertical-align: bottom;}
	.capitol {text-transform: capitalize;}
	.hotel-item .hotel-item-label > span {font-size: 14px;}

	@media (max-width: 767px) {
	.hotel-item {width: 100%}}

	@media only screen and (max-width: 480px) {
	.searchbx11{margin-left: 0;}
	.search-sec{position: relative;}
	.has-search .form-control-feedback{position: absolute;right: 2px;top: -5px;}
	.logo{background-position: 11px 0 !important}}
	</style>

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

	var ajax_image = "<img class='loadinggif' src='{{url('/images/')}}/ajax-loader.gif' alt='Loading...' />";
	var urlLike = '{{ url('teaser-filter') }}';

	function saveAsBookmark(hotelid){
		// alert(hotelid);
		var bookmarks = JSON.parse(localStorage.getItem("hotelBookmark")) || [];

		if(bookmarks.length ==10){
			bookmarks.shift();
		}
		if(!bookmarks.includes(hotelid)){
			bookmarks.push(hotelid);
			localStorage.setItem("hotelBookmark", JSON.stringify(bookmarks));
			$('#addBookmark'+hotelid).hide();
			$('#removeBookmark'+hotelid).show();
		}

		checkBookmarks();
	}

	function clearBookmark() {
		localStorage.removeItem("hotelBookmark");
		location.reload();

	}

	function removeAsBookmark(hotelid){

		// $(this).toggleClass('active');
		// 	e.preventDefault();
		// 	return false;
		// alert(hotelid);
		var bookmarks = JSON.parse(localStorage.getItem("hotelBookmark")) || [];
		if(bookmarks.length){
			var index = bookmarks.indexOf(hotelid);
			bookmarks.splice(index, 1);
			localStorage.setItem("hotelBookmark", JSON.stringify(bookmarks));
			$('#addBookmark'+hotelid).show();
			$('#removeBookmark'+hotelid).hide();
		}
		checkBookmarks();
	}


	function checkBookmarks(){
		var bookmarks = JSON.parse(localStorage.getItem("hotelBookmark")) || [];
		// console.log(bookmarks[0]);
		if(bookmarks.length){
			var bookmarkHtml = '';
			var bookmarkHotelCount = 0;
			var hotels = allHotel;
			// hotels = hotels.replace(/(\r\n|\n|\r)/gm,"");

			 // hotels = hotels.replace("\r","\\r");
			 // hotels = JSON.parse(hotels);
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


		function get_filter(class_name)
		{


			var filter = [];
			$('.'+class_name+':checked').each(function(){
				filter.push($(this).val());
			});
			return filter;
		}

		$(function(){
			$('input[name="filter_hotel_category"]').click(function(){
				var $radio = $(this);

				if(this.value ==1){
					console.log("diver clicked");
					if ($radio.data('waschecked') == true){
						$radio.siblings('input[name="filter_diving_bases"]').data('waschecked', false);
						$('#divers_li').hide();
					}else{
						$radio.siblings('input[name="filter_diving_bases"]').data('waschecked', true);
						$('#divers_li').show();
					}
				}else {
					$('.filter_diving_bases').prop('checked',false);

		        	// $radio.siblings('input[name="filter_diving_bases"]').data('waschecked', false);
		        	$('#divers_li').hide();
		        }

		        // if this was previously checked
		        if ($radio.data('waschecked') == true)
		        {
		        	$radio.prop('checked', false);
		        	$radio.data('waschecked', false);
		        }
		        else
		        	$radio.data('waschecked', true);

		        // remove was checked from other radios
		        $radio.siblings('input[name="filter_hotel_category"]').data('waschecked', false);
		    });

			$('#first_star').click(function(){
				var $radio = $(this);

		        // if this was previously checked
		        if ($radio.data('waschecked') == true)
		        {
		        	$radio.prop('checked', false);
		        	$radio.data('waschecked', false);
		        	startone
		        	$('#startone').removeClass("active");
		        }
		        else
		        	$radio.data('waschecked', true);

		        // remove was checked from other radios
		        $radio.siblings('#first_star').data('waschecked', false);
		    });

		});

		function clearCheckbox(){
			$('.filter_chbx').prop("checked", false);

			filter_data();
	    	// location.reload();
	    }

	    var urlLike2 = '{{ url('teaser-filter-bookmark') }}';

	    function showBookmarkedHotelOnTeaser(){
	    	$('.filter_chbx').prop("checked", false);
	    	var bookmarks = JSON.parse(localStorage.getItem("hotelBookmark")) || [];
	    	if(bookmarks.length ==0){
	    		return;
	    	}else{
				// bookmarks = bookmarks.join(',');
			}

			console.log("bookmarkersdsad",bookmarks);
			$.ajax({
				url: urlLike2,
				method:"GET",
				data:{hotelIDs:bookmarks},
				success:function(data){
					var countAjaxHotels = 0;
					var countLoop = 0;
                // $('.filter_data').html(data);
                //console.log('data',data);
                var html = '';
                if(jQuery.isEmptyObject(data.hotels)){
                	html = `<div class="well">
                	<h2 class="text-center" style="text-align: center;">Keine Hotels gefunden! Bitte ändern Sie Ihre Auswahl.</h2>
                	</div>`;
                	if(getHotelCat == 1){
						$('#category_header').html(data.teaser_header[0].diver);
					}
					if(getHotelCat == 2){
						$('#category_header').html(data.teaser_header[0].family);
					}
					if(getHotelCat == 3){
						$('#category_header').html(data.teaser_header[0].luxury);
					}
					if(getHotelCat == 4){
						$('#category_header').html(data.teaser_header[0].honeymoon);
					}
					if(getHotelCat == 5){
						$('#category_header').html(data.teaser_header[0].recreation);
					}
					if(getHotelCat == 7){
						$('#category_header').html(data.teaser_header[0].adults_only);
					}
					if(getHotelCat ==""){
						$('#category_header').html(data.teaser_header[0].packages);
					}
                	$('#hotel_list').html(html);
                }else{
                	//console.log('data.hotels.length',Object.keys(data.hotels).length);
                	//console.log('data.hotels',data.hotels);
                	//console.log('type',typeof data.hotels);
                	countAjaxHotels = Object.keys(data.hotels).length;

                	$.each(data.hotels, function(key,value){
                		countLoop++;
                		html +=`<li>

                		<div class="hotel-item" style="min-height: 300px;">
                		<div class="hotel-item-body">
                		<div class="hotel-item-description">
                		<div class="image-block">
                		<div class="image">
                		`;
                		if(jQuery.isEmptyObject(value.hotel_images)){
                			html +=`<img class="img-responsive" style="max-height:192px" src="{{url('/images/template/no_image_available.png')}}" data-src="{{url('/images/template/no_image_available.png')}}" alt="image description">`;

                		}else{
             			<!--		html +=`<img class="" src="{{url('/images/hotel/')}}/`+value.hotel_images[0].h_image+`" data-src="{{url('/images/hotel/')}}/`+value.hotel_images[0].h_image+`" alt="`+value.hotel_name+`">`; -->
											html +=`<img class="" src="{{url('/images/hotel-galleries/`+value.hid+`/others/')}}/`+value.hotel_images[0].h_image+`" data-src="{{url('/images/hotel-galleries/`+value.hid+`/others/')}}/`+value.hotel_images[0].h_image+`" alt="`+value.hotel_name+`">`;
                		}

                		if(!jQuery.isEmptyObject(value.tag_manger)){
                			$.each(value.tag_manger, function(tagkey,tagvalue){
                				if(tagvalue.tag_code_for == 'Discount' && tagvalue.page_on_frontend == "Teaser Page" && tagvalue.tag_status ==1){
                					html +=`<span class="discount-label">`+tagvalue.tag_name+` </span>`;
                				}
                			})
                		}

                		html +=`
                		</div><!-- end image -->
                		<div class="bookmark-block">
                		<div class="row">
                		<div class="col-8">
                		<a id="removeBookmark`+value.hid+`" style="display:none" href="javascript:void(0)" onclick="removeAsBookmark(`+value.hid+`)" class="bookmark-link active"><span>Hotel auf der Merkliste</span><em>Hotel auf die Merkliste setzen</em></a>

                		<a id="addBookmark`+value.hid+`" href="javascript:void(0)" onclick="saveAsBookmark(`+value.hid+`)" class="bookmark-link "><span>Hotel auf die Merkliste setzen</span><em>Hotel auf die Merkliste setzen</em></a>
                		</div><!-- end col-8 -->
                		<div class="col-4 d-flex justify-content-end">
                		<div class="logo-item">`;
                		if(!jQuery.isEmptyObject(value.tag_manger)){
                			$.each(value.tag_manger, function(tagkey,tagvalue){
                				if(tagvalue.tag_code_for == 'Recommendation' && tagvalue.page_on_frontend == "Teaser Page" && tagvalue.tag_status==1){
                					html+=`<img class="" src="https://www.my-maldives.com/images/template/icon-recommended-by-us.png" data-src="https://www.my-maldives.com/images/template/icon-recommended-by-us.png" alt="Icon: Recommended by us">`;
                				}
                			})
                		}


                		html+=`</div> <!-- end logo-item -->
                		</div> <!-- end col-4 -->
                		</div> <!-- end row -->
                		</div> <!-- end bookmark-block -->
                		</div> <!-- end image-block -->
                		<div class="description">
                		<header class="hotel-item-heading">
                		<a href="{{url('/hotel-page')}}/`+value.url_key+`" class="hotel-title">`+value.hotel_name+`</a>

                		<!-- stars added -->

                		<div class="review-rating tl mb-2">`;
                		if(value.stars ==1){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			</ul>
                			`;
                		}else if(value.stars ==2){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>

                			</ul>
                			`;
                		}else if(value.stars ==3){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>

                			</ul>`
                			;
                		}else if(value.stars ==3.5){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li class="half">3.5</li>

                			</ul>
                			`;
                		}else if(value.stars ==4){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>

                			</ul>
                			`;
                		}else if(value.stars ==4.5){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>
                			<li class="half">4.5</li>

                			</ul>
                			`;
                		}else if(value.stars ==5){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>
                			<li>5</li>
                			</ul>
                			`;
                		}else if(value.stars ==5.5){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>
                			<li>5</li>
                			<li class="half">5.5</li>
                			</ul>`;
                		}else if(value.stars ==6){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>
                			<li>5</li>
                			<li>6</li>
                			</ul>`;
                		}

                		html +=`</div>
                		<!--half star-->

                		</header><!-- end hotel-item-heading -->


                		`;

                		if(value.island_name !== null && value.island_name !== ""){
                			html +=`<div class="hotel-location">
                			<br>{{url('/images/template/no_image_available.png')}}
                			<div class="ico">
                			<img class="" src="{{url('/images/template/ico-marker-red.png')}}" data-src="{{url('/images/template/ico-marker-red.png')}}" alt="Icon: Location">
                			</div><!-- end ico -->
                			<p>`+value.island_name.island_name;
                			if(value.atoll !=''){

                				html+=`, `+value.atoll.atoll_name;
                			}
                			html+=`</p>
                			</div><!-- end hotel-location -->`;
                		}

                		@if(isset($hotel_special))
                		var hotelsp = '{{$hotel_special}}';
                		html +=`<div class="description-box">`+value[hotelsp]+`</div><!-- end description-box -->`;

                		@else
                		var getHotelCat = null;
                		if(getHotelCat == 1){
								        			// $('#category_header').html(value.diver);
								        			html +=`<div class="description-box">`+value.diver+`</div><!-- end description-box -->`;
								        		}
								        		else if(getHotelCat == 2){
								        			// $('#category_header').html(value.family);
								        			html +=`<div class="description-box">`+value.family+`</div><!-- end description-box -->`;
								        		}
								        		else if(getHotelCat == 3){
								        			// $('#category_header').html(value.luxury);
								        			html +=`<div class="description-box">`+value.luxury+`</div><!-- end description-box -->`;
								        		}
								        		else if(getHotelCat == 4){
								        			// $('#category_header').html(value.honeymoon);
								        			html +=`<div class="description-box">`+value.honeymoon+`</div><!-- end description-box -->`;
								        		}
								        		else if(getHotelCat == 5){
								        			// $('#category_header').html(value.recreation);
								        			html +=`<div class="description-box">`+value.recreation+`</div><!-- end description-box -->`;
								        		}else{
								        			html +=`<div class="description-box" style="background:#fff;color:#7f8284;">`+value.standard_teaser_text+`</div><!-- end description-box -->`;
								        		}




								        		@endif
								        		html +=`<span style=" color: #175890;" class="stay-label">Mindestaufenthalt `+value.minimum_stay+` Nächte</span>
								        		</div><!-- end description -->
								        		</div><!-- end hotel-item-description -->
								        		<div class="hotel-item-bottom">
								        		<ul class="hotel-features">`;
								        		if(value.waterplane_distance !== null && value.waterplane_distance  >0){

								        			if(value.waterplane_recom ==1){

								        				html += `<li><mark>Wasserflugzeug</mark> `+value.waterplane_distance+` km - `+value.waterplane_duration+` Min.</li>`;
								        			}else{
								        				html += `<li>Wasserflugzeug `+value.waterplane_distance+` km - `+value.waterplane_duration+` Min.</li>`;
								        			}

								        		}
								        		if(value.vip_lounge =="1"){
								        			html +='<li>VIP Lounge</li>';
								        		}
								        		if(value.domestic_distance !== null){

								        			if(value.domestic_recom ==1){

								        				html +=`<li><mark>Inlandsflug  </mark> `+value.domestic_distance+` km - `+value.domestic_duration+` Min.</li>`;
								        			}else{
								        				html +=`<li>Inlandsflug   `+value.domestic_distance+` km - `+value.domestic_duration+` Min.</li>`;
								        			}

								        		}
								        		if(value.speedboat_distance !== null){

								        			if(value.speedboat_recom ==1){

								        				html +=`<li><mark>Schnellboot  </mark> `+value.speedboat_distance+` km - `+value.speedboat_duration+` Min.</li>`;
								        			}else{
								        				html +=`<li>Schnellboot   `+value.speedboat_distance+` km - `+value.speedboat_duration+` Min.</li>`;
								        			}

								        		}
								        		if(value.ferry_distance !== null){

								        			if(value.ferry_recom ==1){

								        				html +=`<li><mark>Fähre </mark> `+value.ferry_distance+` km - `+value.ferry_duration+` Min.</li>`;
								        			}else{
								        				html +=`<li>Fähre `+value.ferry_distance+` km - `+value.ferry_duration+` Min.</li>`;
								        			}

								        		}

								        		html +=`</ul><!-- end hotel-features -->
								        		</div><!-- end hotel-item-bottom -->
								        		</div><!-- end hotel-item-body -->
								        		<div class="hotel-item-footer">
								        		<div class="hotel-item-footer-top">
								        		<span class="hotel-item-label">`;
								//console.log("boardddddd==",value.min_meal_plan);
								if(value.min_meal_plan == "all inclusive"){

									html+=`<span> All Inclusive</span>`;

								}else if(value.min_meal_plan == "breakfast"){

									html +=`<span> Frühstück inklusive</span>`;
								}else if(value.min_meal_plan == "halfboard"){

									html +=`<span> Halbpension inklusive</span>`;
								}else if(value.min_meal_plan == "fullboard"){

									html +=`<span> Vollpension inklusive</span>`;
								}else {

									html +=`<span> `+ value.min_meal_plan+`</span>`;
								}

								html +=`</span>`;

								if(value.online_bookable ==1 && value.min_rate >0){

									html+= `<h4>Zimmerpreis p. Nacht</h4>`;
								}
								html+=`</div><!-- end hotel-item-footer-top -->
								<div class="hotel-item-footer-middle">`;
								if(value.online_bookable==1 && value.min_rate >0){
									if(value.is_discount > 0){
										console.log(value)
										html+= `<span class="hotel-old-price"><del><span>ab</span> <strong>`+value.before_discount+ ' €</strong></del></span>';
									// if(value.invoice_currency =="usd"){

									// 	html += ` $</strong></del></span>`;
									// }else{
									// 	html += ` €</strong></del></span>`;
									// }

								}
							}

							if(value.online_bookable==0){
								html += `<span class="hotel-price-note">Dieses Hotel ist zur Zeit <strong>nur auf Anfrage</strong> buchbar. <br>Bitte stellen Sie eine Anfragasdadae.</span>`;
							}else{
								if(value.hasOwnProperty('min_rate')){
									if(value.min_rate > 0){
										html += `<span class="hotel-price"><span>ab</span><strong> `+ value.min_rate+' €</strong></span>';
											// if(value.invoice_currency =="usd"){

											// 	html += ` $</strong></span>`;
											// }else{
											// 	html += ` €</strong></span>`;
											// }

										}else{
											html += `<span class="hotel-price-note">Dieses Hotel ist zur Zeit <strong>nur auf Anfrage</strong> buchbar. <br>Bitte stellen Sie eine Anfrage.</span>`;
										}
									}else{
										html += `<span class="hotel-price-note">Dieses Hotel ist zur Zeit <strong>nur auf Anfrage</strong> buchbar. <br>Bitte stellen Sie eine Anfrage.</span>`;
									}
								}


								if(value.online_bookable ==1 && value.min_rate >0){

									html+= `<span class="hotel-price-sub-text">`+value.hotel_room_min.room_name+`</span>`;
								}
								html +=`
								</div><!-- end hotel-item-footer-middle -->
								<div class="hotel-item-footer-bottom">
								<a href="{{url('/hotel-page/')}}/`+value.url_key+`" class="btn btn-rounded btn-primary">Hotel anzeigen</a>
								</div><!-- end hotel-item-footer-bottom -->
								</div><!-- end hotel-item-footer -->
								</div><!-- end hotel-item -->

								</li>`;

								if (countLoop === countAjaxHotels) {
									console.log("getHotelCat",getHotelCat);
									if(getHotelCat == 1){
										$('#category_header').html(data.teaser_header[0].diver);
									}
									if(getHotelCat == 2){
										$('#category_header').html(data.teaser_header[0].family);
									}
									if(getHotelCat == 3){
										$('#category_header').html(data.teaser_header[0].luxury);
									}
									if(getHotelCat == 4){
										$('#category_header').html(data.teaser_header[0].honeymoon);
									}
									if(getHotelCat == 5){
										$('#category_header').html(data.teaser_header[0].recreation);
									}
									if(getHotelCat == 7){
										$('#category_header').html(data.teaser_header[0].adults_only);
									}
									if(getHotelCat ==""){
										$('#category_header').html(data.teaser_header[0].packages);
									}
									$('#hotel_list').html(html);
									checkBookmarks();
								}

							});


}

}
});


}

function filter_data() {
	$('#hotel_list').html(ajax_image);
	var getHotelCat = get_filter("filter_hotel_category");
	var getCatering = get_filter("filter_hotel_catering");
	var getMinStay = get_filter("filter_hotel_minimum_stay");
	var getTransfer = get_filter("filter_hotel_transfer");
	var getDiB = get_filter("filter_diving_bases");
	var getstars = get_filter("filter_stars");
	console.log("getstars",getstars);
	var hwd = get_filter("filter_hotel_with_discounts");
	var recom = get_filter("filter_hotel_recom");
	var hotel_price = $('#slider_value').val();

	console.log("hotel_price",hotel_price);

	$.ajax({
		url: urlLike,
		method:"GET",
		data:{hotelcategory:getHotelCat, catering:getCatering, minstay:getMinStay, transfer:getTransfer, divingbases:getDiB,hotelPrice:hotel_price,discount:hwd,recom:recom,stars:getstars},
		success:function(data){
			var countAjaxHotels = 0;
			var countLoop = 0;
                // $('.filter_data').html(data);
                //console.log('data',data);
                var html = '';
                if(jQuery.isEmptyObject(data.hotels)){
                	html = `<div class="well">
                	<h2 class="text-center" style="text-align: center;">Keine Hotels gefunden! Bitte ändern Sie Ihre Auswahl.</h2>
                	</div>`;
                	console.log("new teasdre header",getHotelCat);
                	if(getHotelCat == 1){
						$('#category_header').html(data.teaser_header[0].diver);
					}
					if(getHotelCat == 2){
						$('#category_header').html(data.teaser_header[0].family);
					}
					if(getHotelCat == 3){
						$('#category_header').html(data.teaser_header[0].luxury);
					}
					if(getHotelCat == 4){
						$('#category_header').html(data.teaser_header[0].honeymoon);
					}
					if(getHotelCat == 5){
						$('#category_header').html(data.teaser_header[0].recreation);
					}
					if(getHotelCat == 7){
						$('#category_header').html(data.teaser_header[0].adults_only);
					}
					if(getHotelCat ==""){
						$('#category_header').html(data.teaser_header[0].packages);
					}
                	$('#hotel_list').html(html);
                }else{
                	//console.log('data.hotels.length',Object.keys(data.hotels).length);
                	//console.log('data.hotels',data.hotels);
                	//console.log('type',typeof data.hotels);
                	countAjaxHotels = Object.keys(data.hotels).length;

                	$.each(data.hotels, function(key,value){
                		countLoop++;
                		html +=`<li>

                		<div class="hotel-item" style="min-height: 300px;">
                		<div class="hotel-item-body">
                		<div class="hotel-item-description">
                		<div class="image-block">
                		<div class="image">
                		`;
                		if(jQuery.isEmptyObject(value.hotel_images)){
                			html +=`<img class="img-responsive" style="max-height:192px" src="{{url('/images/template/no_image_available.png')}}" data-src="{{url('/images/template/no_image_available.png')}}" alt="image description">`;

                		}else{
                	<!--		html +=`<img class="" src="{{url('/images/hotel/')}}/`+value.hotel_images[0].h_image+`" data-src="{{url('/images/hotel/')}}/`+value.hotel_images[0].h_image+`" alt="`+value.hotel_name+`">`; -->
											html +=`<img class="" src="{{url('/images/hotel-galleries/`+value.hid+`/others/')}}/`+value.hotel_images[0].h_image+`" data-src="{{url('/images/hotel-galleries/`+value.hid+`/others/')}}/`+value.hotel_images[0].h_image+`" alt="`+value.hotel_name+`">`;
										}

                		if(!jQuery.isEmptyObject(value.tag_manger)){
                			$.each(value.tag_manger, function(tagkey,tagvalue){
                				if(tagvalue.tag_code_for == 'Discount' && tagvalue.page_on_frontend == "Teaser Page" && tagvalue.tag_status ==1){
                					html +=`<span class="discount-label">`+tagvalue.tag_name+` </span>`;
                				}
                			})
                		}

                		html +=`
                		</div><!-- end image -->
                		<div class="bookmark-block">
                		<div class="row">
                		<div class="col-12">
                		<a id="removeBookmark`+value.hid+`" style="display:none" href="javascript:void(0)" onclick="removeAsBookmark(`+value.hid+`)" class="bookmark-link active"><span>Hotel ist auf der Merkliste</span><em>Hotel auf die Merkliste setzen</em></a>

                		<a id="addBookmark`+value.hid+`" href="javascript:void(0)" onclick="saveAsBookmark(`+value.hid+`)" class="bookmark-link "><span>Hotel auf die Merkliste setzen</span><em>Hotel auf die Merkliste setzen</em></a>
                		</div><!-- end col-8 -->
                		<div class="col-4 d-flex justify-content-end">
                		<div class="logo-item">`;
                		if(!jQuery.isEmptyObject(value.tag_manger)){
                			$.each(value.tag_manger, function(tagkey,tagvalue){
                				if(tagvalue.tag_code_for == 'Recommendation' && tagvalue.page_on_frontend == "Teaser Page" && tagvalue.tag_status ==1){
                					html+=`<img class="" src="https://www.my-maldives.com/images/template/icon-recommended-by-us.png" data-src="https://www.my-maldives.com/images/template/icon-recommended-by-us.png" alt="image description">`;
                				}
                			})
                		}


                		html+=`</div><!-- end logo-item -->
                		</div><!-- end col-4 -->
                		</div><!-- end row -->
                		</div><!-- end bookmark-block -->
                		</div><!-- end image-block -->
                		<div class="description">
                		<header class="hotel-item-heading">
                		<a href="{{url('/hotel-page')}}/`+value.url_key+`" class="hotel-title">`+value.hotel_name+`</a>

                		<!-- stars added -->

                		<div class="review-rating tl mb-2">`;
                		if(value.stars ==1){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			</ul>
                			`;
                		}else if(value.stars ==2){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>

                			</ul>
                			`;
                		}else if(value.stars ==3){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>

                			</ul>`
                			;
                		}else if(value.stars ==3.5){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li class="half">3.5</li>

                			</ul>
                			`;
                		}else if(value.stars ==4){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>

                			</ul>
                			`;
                		}else if(value.stars ==4.5){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>
                			<li class="half">4.5</li>

                			</ul>
                			`;
                		}else if(value.stars ==5){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>
                			<li>5</li>
                			</ul>
                			`;
                		}else if(value.stars ==5.5){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>
                			<li>5</li>
                			<li class="half">5.5</li>
                			</ul>`;
                		}else if(value.stars ==6){
                			html+=`<ul class="rating-widget rating-widget-md">
                			<li>1</li>
                			<li>2</li>
                			<li>3</li>
                			<li>4</li>
                			<li>5</li>
                			<li>6</li>
                			</ul>`;
                		}

                		html +=`</div>
                		<!--half star-->

                		</header><!-- end hotel-item-heading -->


                		`;

                		if(value.island_name !== null && value.island_name !== ""){
                			html +=`<div class="hotel-location">
                			<br>
                			<div class="ico">
                			<img class="" src="https://www.my-maldives.com/images/template/ico-marker-red.png" data-src="https://www.my-maldives.com/images/template/ico-marker-red.png" alt="Icon: Location">
                			</div><!-- end ico -->
                			<p>`+value.island_name.island_name;
                			if(value.atoll !=''){

                				html+=`, `+value.atoll.atoll_name;
                			}
                			html+=`</p>
                			</div><!-- end hotel-location -->`;
                		}

                		@if(isset($hotel_special))
                		var hotelsp = '{{$hotel_special}}';
                		html +=`<div class="description-box">`+value[hotelsp]+`</div><!-- end description-box -->`;

                		@else
                		if(getHotelCat == 1){
								        			// $('#category_header').html(value.diver);
								        			html +=`<div class="description-box">`+value.diver+`</div><!-- end description-box -->`;
								        		}
								        		else if(getHotelCat == 2){
								        			// $('#category_header').html(value.family);
								        			html +=`<div class="description-box">`+value.family+`</div><!-- end description-box -->`;
								        		}
								        		else if(getHotelCat == 3){
								        			// $('#category_header').html(value.luxury);
								        			html +=`<div class="description-box">`+value.luxury+`</div><!-- end description-box -->`;
								        		}
								        		else if(getHotelCat == 4){
								        			// $('#category_header').html(value.honeymoon);
								        			html +=`<div class="description-box">`+value.honeymoon+`</div><!-- end description-box -->`;
								        		}
								        		else if(getHotelCat == 5){
								        			// $('#category_header').html(value.recreation);
								        			html +=`<div class="description-box">`+value.recreation+`</div><!-- end description-box -->`;
								        		}else{
								        			html +=`<div class="description-box" style="background:#fff;color:#7f8284;">`+value.standard_teaser_text+`</div><!-- end description-box -->`;
								        		}




								        		@endif
								        		html +=`<span style=" color: #175890;" class="stay-label">Mindestaufenthalt `+value.minimum_stay+` Nächte</span>
								        		</div><!-- end description -->
								        		</div><!-- end hotel-item-description -->
								        		<div class="hotel-item-bottom">
								        		<ul class="hotel-features">`;
								        		if(value.waterplane_distance !== null && value.waterplane_distance  >0){

								        			if(value.waterplane_recom ==1){

								        				html += `<li><mark>Wasserflugzeug</mark> `+value.waterplane_distance+` km - `+value.waterplane_duration+` Min.</li>`;
								        			}else{
								        				html += `<li>Wasserflugzeug `+value.waterplane_distance+` km - `+value.waterplane_duration+` Min.</li>`;
								        			}

								        		}
								        		if(value.vip_lounge =="1"){
								        			html +='<li>VIP Lounge</li>';
								        		}
								        		if(value.domestic_distance !== null){

								        			if(value.domestic_recom ==1){

								        				html +=`<li><mark>Inlandsflug  </mark> `+value.domestic_distance+` km - `+value.domestic_duration+` Min.</li>`;
								        			}else{
								        				html +=`<li>Inlandsflug   `+value.domestic_distance+` km - `+value.domestic_duration+` Min.</li>`;
								        			}

								        		}
								        		if(value.speedboat_distance !== null){

								        			if(value.speedboat_recom ==1){

								        				html +=`<li><mark>Schnellboot  </mark> `+value.speedboat_distance+` km - `+value.speedboat_duration+` Min.</li>`;
								        			}else{
								        				html +=`<li>Schnellboot   `+value.speedboat_distance+` km - `+value.speedboat_duration+` Min.</li>`;
								        			}

								        		}
								        		if(value.ferry_distance !== null){

								        			if(value.ferry_recom ==1){

								        				html +=`<li><mark>Fähre </mark> `+value.ferry_distance+` km - `+value.ferry_duration+` Min.</li>`;
								        			}else{
								        				html +=`<li>Fähre `+value.ferry_distance+` km - `+value.ferry_duration+` Min.</li>`;
								        			}

								        		}

								        		html +=`</ul><!-- end hotel-features -->
								        		</div><!-- end hotel-item-bottom -->
								        		</div><!-- end hotel-item-body -->
								        		<div class="hotel-item-footer">
								        		<div class="hotel-item-footer-top">
								        		<span class="hotel-item-label">`;
								//console.log("boardddddd==",value.min_meal_plan);
								if(value.min_meal_plan == "all inclusive"){

									html+=`<span> All Inclusive</span>`;

								}else if(value.min_meal_plan == "breakfast"){

									html +=`<span> Frühstück inklusive</span>`;
								}else if(value.min_meal_plan == "halfboard"){

									html +=`<span> Halbpension inklusive</span>`;
								}else if(value.min_meal_plan == "fullboard"){

									html +=`<span> Vollpension inklusive</span>`;
								}else {

									html +=`<span> `+ value.min_meal_plan+`</span>`;
								}

								html +=`</span>`;

								if(value.online_bookable ==1 && value.min_rate >0){

									html+= `<h4>Zimmerpreis p. Nacht</h4>`;
								}
								html+=`</div><!-- end hotel-item-footer-top -->
								<div class="hotel-item-footer-middle">`;
								if(value.online_bookable ==1 && value.min_rate >0){
									if(value.is_discount > 0){
									//console.log(value)
									html+= `<span class="hotel-old-price"><del><span>ab</span> <strong>`+value.before_discount+' €</strong></del></span>';

									// if(value.invoice_currency =="usd"){

									// 	html += ` $</strong></del></span>`;
									// }else{
									// 	html += ` €</strong></del></span>`;
									// }

								}
							}

							if(value.online_bookable==0){
								html += `<span class="hotel-price-note">Dieses Hotel ist zur Zeit <strong>nur auf Anfrage</strong> buchbar. <br>Bitte stellen Sie eine Anfrage.</span>`;
							}else{
								if(value.hasOwnProperty('min_rate')){
									if(value.min_rate > 0){
										html += `<span class="hotel-price"><span>ab</span><strong> `+ value.min_rate+' €</strong></span>';
											// if(value.invoice_currency =="usd"){

											// 	html += ` $</strong></span>`;
											// }else{
											// 	html += ` €</strong></span>`;
											// }

										}else{
											html += `<span class="hotel-price-note">Dieses Hotel ist zur Zeit <strong>nur auf Anfrage</strong> buchbar. <br>Bitte stellen Sie eine Anfrage.</span>`;
										}
									}else{
										html += `<span class="hotel-price-note">Dieses Hotel ist zur Zeit <strong>nur auf Anfrage</strong> buchbar. <br>Bitte stellen Sie eine Anfrage.</span>`;
									}
								}


								if(value.online_bookable ==1 && value.min_rate >0){

									html+= `<span class="hotel-price-sub-text">`+value.hotel_room_min.room_name+`</span>`;
								}
								html +=`
								</div><!-- end hotel-item-footer-middle -->
								<div class="hotel-item-footer-bottom">
								<a href="{{url('/hotel-page/')}}/`+value.url_key+`" class="btn btn-rounded btn-primary">Hotel anzeigen</a>
								</div><!-- end hotel-item-footer-bottom -->
								</div><!-- end hotel-item-footer -->
								</div><!-- end hotel-item -->

								</li>`;

								if (countLoop === countAjaxHotels) {
									console.log("getHotelCat",getHotelCat);
									if(getHotelCat == 1){
										$('#category_header').html(data.teaser_header[0].diver);
									}
									if(getHotelCat == 2){
										$('#category_header').html(data.teaser_header[0].family);
									}
									if(getHotelCat == 3){
										$('#category_header').html(data.teaser_header[0].luxury);
									}
									if(getHotelCat == 4){
										$('#category_header').html(data.teaser_header[0].honeymoon);
									}
									if(getHotelCat == 5){
										$('#category_header').html(data.teaser_header[0].recreation);
									}
									if(getHotelCat == 7){
										$('#category_header').html(data.teaser_header[0].adults_only);
									}
									if(getHotelCat ==""){
										$('#category_header').html(data.teaser_header[0].packages);
									}


									$('#hotel_list').html(html);
									checkBookmarks();
								}

							});


}

}
});

        // console.log('getHotelCat',getHotelCat);

    }
</script>



</head>
@include('includes.front-header')

<div class="top-area">
<div class="container">

<figure class="main-banner">
<div class="image"><img class="lozad" src="#" data-src="{{url('/images/front/img-01.jpg')}}" alt="image description"></div>
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

<div class="content-area">
<div class="row">
<div class="col-lg-3 col-xl-3">

<form action="{{url('teaser-filter')}}" method="get">
@csrf
<div class="filter">
<header class="title"><h3>Passen Sie Ihre Ergebnisse an</h3></header>

<ul class="options">

<div style="text-align: end; margin-top: 5px; cursor: pointer;"><span onclick="clearCheckbox()" style="text-decoration: underline; color: #175890;">Auswahl aufheben</span></div>

										<li>
											<h4>Hotelname</h4>
											<div class="hotel-search-input">
												<form action="#">
													<select id="hotel_selection"  class="form-control js-example-basic-single2" required>
														<option></option>

														@php

														$hotels1 = \App\Hotel::all();
														@endphp
														@foreach($hotels1 as $hotel)
														<option value="{{$hotel->url_key}}" >{{$hotel->hotel_name}}</option>
														@endforeach
													</select>
													<div class="autocomplete">
														<h3>Hotels</h3>
														<div class="list-hold"></div>
													</div>

												</form>
											</div>
										</li>


										<li>
											<h4>Sterne</h4>
											<ul class="stars">
												<li id="startone"><label><input type="radio" id="first_star" class="filter_chbx filter_stars" value="1" name="star"></label></li>
												<li><label><input type="radio" class="filter_chbx filter_stars" value="2" name="star"></label></li>
												<li><label><input type="radio" class="filter_chbx filter_stars" value="3" name="star"></label></li>
												<li><label><input type="radio" class="filter_chbx filter_stars" value="4" name="star"></label></li>
												<li><label><input type="radio" class="filter_chbx filter_stars" value="5" name="star"></label></li>
												<li><label><input type="radio" class="filter_chbx filter_stars" value="6" name="star"></label></li>
											</ul>
										</li>

										<li>
											<h4>Preiskategorie</h4>
											<div data-value="10000" data-values="false" data-max="10000" data-min="100" data-range="min" class="range-slider"></div>
											<!-- <span class="slider-note">bis <span class="val">10000</span> € p. Nacht</span> -->
											<span class="slider-note">Hotels von 1 € bis <span class="val">10000</span> € p. Nacht</span>
											<input type="hidden" id="slider_value" value="10000" class="sliderOnChange">
										</li>

										<li>
											<h4>Interessen</h4>
											<p>Suchen Sie Ihr Hotel nach bestimmten Interessen aus.</p>
											<ul class="check-list">

												<li>
													<div class="check-box">
														<label>
															<input type="radio" @if(isset($hotel_special) && $hotel_special == 'honeymoon')) checked="true" @endif class="filter_chbx filter_hotel_category" value="4" name="filter_hotel_category">
															<span class="text">Honeymoon</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input name="filter_hotel_category" type="radio" @if(isset($hotel_special) && $hotel_special == 'diver')) checked="true" @endif class="filter_chbx filter_hotel_category" value="1">
															<span class="text">Tauchen</span>

														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input name="filter_hotel_category" type="radio" @if(isset($hotel_special) && $hotel_special == 'luxury')) checked="true" @endif class="filter_chbx filter_hotel_category" value="3">
															<span class="text">Luxury</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input name="filter_hotel_category" type="radio" class="filter_chbx filter_hotel_category" @if(isset($hotel_special) && $hotel_special == 'family')) checked="true" @endif value="2">
															<span class="text">Familienfreundlich</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input name="filter_hotel_category" type="radio" class="filter_chbx filter_hotel_category" @if(isset($hotel_special) && $hotel_special == 'guesthouse')) checked="true" @endif value="8">
															<span class="text">Gästehäuser</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input name="filter_hotel_category" type="radio" class="filter_chbx filter_hotel_category" @if(isset($hotel_special) && $hotel_special == 'resortinseln')) checked="true" @endif value="9">
															<span class="text">Resortinseln</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input name="filter_hotel_category" type="radio" @if(isset($hotel_special) && $hotel_special == 'recreation')) checked="true" @endif class="filter_chbx filter_hotel_category" value="5">
															<span class="text">Die besten All Inclusive Resorts</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="radio" @if(isset($hotel_special) && $hotel_special == 'adultonly')) checked="true" @endif class="filter_chbx filter_hotel_category" value="7" name="filter_hotel_category">
															<span class="text">Adults Only</span>
														</label>
													</div>
												</li>

											</ul>
										</li>

										<li>
											<h4>Verpflegung</h4>
											<p>Wählen Sie, welcher Menüplan im Aufenthaltspreis enthalten sein soll.</p>
											<ul class="check-list">
												<li>
													<div class="check-box">
														<label>

															<input type="checkbox" class="filter_chbx filter_hotel_catering" value="breakfast">
															<span class="text">Frühstück</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_catering" value="halfboard">
															<span class="text">Halbpension</span>
														</label>
													</div>
												</li>


												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_catering" value="fullboard">
															<span class="text">Vollpension</span>
														</label>
													</div>
												</li>


												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_catering" value="all inclusive">
															<span class="text">All Inklusive</span>
														</label>
													</div>
												</li>


												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_catering" value="dine_around">
															<span class="text">Dine Around</span>
														</label>
													</div>
												</li>
											</ul>
										</li>

										<li>
											<h4>Mindestaufenthalt</h4>
											<p>Honeymoon Angebote sind mit unterschiedlichen Mindestaufenthalten verbunden.</p>
											<ul class="check-list">

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_minimum_stay" name="filter_hotel_minimum_stay" value="3">
															<span class="text">3 Nächte</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_minimum_stay" name="filter_hotel_minimum_stay" value="4">
															<span class="text">4 Nächte</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_minimum_stay" name="filter_hotel_minimum_stay" value="7">
															<span class="text">7 Nächte</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_minimum_stay" name="filter_hotel_minimum_stay" value="10">
															<span class="text">10 Nächte +</span>
														</label>
													</div>
												</li>

											</ul>
										</li>



										<li>
											<h4>Hoteltransfers</h4>
											<ul class="check-list">
												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" name="filter_hotel_transfer" class="filter_chbx filter_hotel_transfer" value="ferry_aval">
															<span class="text">Fähre</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" name="filter_hotel_transfer" class="filter_chbx filter_hotel_transfer" value="speedboat_aval">
															<span class="text">Schnellboot</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" name="filter_hotel_transfer" class="filter_chbx filter_hotel_transfer" value="waterplane_aval">
															<span class="text">Wasserflugzeug</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" name="filter_hotel_transfer" class="filter_chbx filter_hotel_transfer" value="domestic_aval">
															<span class="text">Inlandsflug (Domestic Flight)</span>
														</label>
													</div>
												</li>

											</ul>
										</li>

										<li>
											<h4>Empfehlungen</h4>
											<p>Nur Resorts anzeigen die von <mark>Meine Malediven</mark> empfohlen werden.</p>
											<div class="btn-row">
												<div class="check-btn">
													<label>
														<input type="checkbox" class="filter_chbx filter_hotel_recom" value="1">
														<span class="text">Empfehlung</span>
													</label>
												</div>
											</div>
										</li>

										<li>
											<h4>Rabatte</h4>
											<p>Lassen Sie sich nur die Hotels anzeigen, die Rabatte anbieten.</p>
											<ul class="check-list">

												<li>
													<div class="check-box">
														<label>
															<input type="checkbox" class="filter_chbx filter_hotel_with_discounts" value="1">
															<span class="text">Hotels mit Rabatten</span>
														</label>
													</div>
												</li>

											</ul>
										</li>

										<li id="divers_li" style="display: none;">
											<h4>Taucherbasen</h4>
											<ul class="check-list">
												<li>
													<div class="check-box">
														<label>
															<input type="radio" name="filter_diving_bases" class="filter_chbx filter_diving_bases" value="1">
															<span class="text">Euro Divers</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="radio" name="filter_diving_bases" class="filter_chbx filter_diving_bases" value="2">
															<span class="text">Werner Lau</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="radio" name="filter_diving_bases" class="filter_chbx filter_diving_bases" value="3">
															<span class="text">Ocean Dimensions</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="radio" name="filter_diving_bases" class="filter_chbx filter_diving_bases" value="4">
															<span class="text">Joy Dive Maldives</span>
														</label>
													</div>
												</li>

												<li>
													<div class="check-box">
														<label>
															<input type="radio" name="filter_diving_bases" class="filter_chbx filter_diving_bases" value="5">
															<span class="text">Providers Maledives</span>
														</label>
													</div>
												</li>

											</ul>
										</li>

								</ul><!-- options -->


								<div class="bookmarks-box">
									<h4>Merkliste <small style="opacity: 50%">(max. 10 Hotels)</small></h4>
									<span class="amount"><a href="javascript:void(0)" onclick="showBookmarkedHotelOnTeaser()" data-toggle="collapse" data-target="#bookmarkDiv"><span class="val" id="bookmarkNumber">0</span> Hotels</a></span>
									<div id="bookmarkDiv" class="collapse">
										<ul class="check-list" id="bookmarkList" style="display: none">

										</ul>
									</div>
								</div>
							</div>
						</form>
						<div style="text-align: center; margin-top: 15px;">	<a href="#" onclick="clearCheckbox()" class="btn btn-rounded btn-primary">Auswahl aufheben</a></div>
					</div><!-- end col-xl-3 -->
					<div class="col-lg-9 col-xl-9">
						<header class="heading-block" id="category_header">
							@php
							$teaser_text = App\Teaser::where('id',1)->get();

							@endphp

							@if(isset($hotel_special))

							{!!$teaser_text[0]->$hotel_special!!}

							@else
							{!!$teaser_text[0]->packages!!}

							@endif
</header>

<!-- end search-results-titles -->
<ul class="hotels-list hotels-list-load-js1" id="hotel_list">

</ul>

</div></div></div></div>

<div id="footer">
<div class="top">
<div class="container">
<div class="row">
<div class="col-3"><strong class="footer-logo"><a href="https://www.my-maldives.com">Meine Malediven Hotels</a></strong></div>
<div class="col-2">
<ul class="footer-links">
<li><a href="https://www.my-maldives.com/teaser-page">Hotels der Malediven</a></li>
<li><a href="https://www.my-maldives.com/informationen">Informationen</a></li>
<li><a href="https://www.my-maldives.com/atolle">Atolle</a></li>
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
<li><img src="https://www.my-maldives.com/images/front/logo-visa-01.png" alt="image description"></li>
<li><img src="https://www.my-maldives.com/images/front/logo-mastercard-01.png" alt="image description"></li>
</ul>
</div></div></div></div></div>


</div>
</div>

<script>

	$(document).ready(function(){
	//http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif

//$('.stars li label').addClass('fistact');
	$("#hotel_id").select2().val(null)


$('.filter_chbx').click(function(){
	filter_data();
});
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

$( "#hotel_selection" ).change(function() {
	var url_key = $('#hotel_selection').val();
	window.location.href = "{{url('/hotel-page')}}/"+url_key;
});
});

</script>

<script src="{{asset('js/front/scripts.js')}}" ></script>

<script defer>
	$(document).ready(function(){
		console.log("local==",localStorage.getItem("is_show_bookmarked"));
		if(localStorage.getItem("is_show_bookmarked") == 'true'){
			showBookmarkedHotelOnTeaser();
			localStorage.setItem("is_show_bookmarked",'false');
			console.log("inside if getitem");
		}else{
			console.log("inside else getitem");
			filter_data();
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
</script>
</body>

</html>
