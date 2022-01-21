(function($) {
	'use strict';

	$(document).ready(function() {
		initHotelSearchAutocomplete();
	});

	// init hotel search autocomplete
	function initHotelSearchAutocomplete() {
		$('.hotel-search-input').each(function() {
			var $searchInputWrap = $(this);
			var	$searchInput = $searchInputWrap.find('.form-control');
			var $autocomplete = $searchInputWrap.find('.autocomplete');
			var $list = $autocomplete.find('.list-hold');

			$(function() {
				var data = [
					{
						label: "Niyama Private Island",
						descr: "Inselname, Atollname",
						img: "img-022.jpg",
					},
					{
						label: "Summer Island Resort",
						descr: "Inselname, Atollname",
						img: "img-023.jpg",
					},
					{
						label: "HuavenFushi Resort",
						descr: "Inselname, Atollname",
						img: "img-023.jpg",
					},
					{
						label: "Summer Island Resort",
						descr: "Inselname, Atollname",
						img: "img-023.jpg",
					},
					{
						label: "Niyama Private Island",
						descr: "Inselname, Atollname",
						img: "img-022.jpg",
					},
					{
						label: "Summer Island Resort",
						descr: "Inselname, Atollname",
						img: "img-023.jpg",
					},
					{
						label: "HuavenFushi Resort",
						descr: "Inselname, Atollname",
						img: "img-023.jpg",
					},
					{
						label: "Summer Island Resort",
						descr: "Inselname, Atollname",
						img: "img-023.jpg",
					},
				];
				$searchInput.each(function(){
					$(this).autocomplete({
						delay: 0,
						source: data,
						appendTo: $list,
						open: function(event,ui){
							$searchInputWrap.addClass('open-autocomplete');
						},
						close: function( event, ui ) {
							setTimeout(function() {
								$searchInputWrap.removeClass('open-autocomplete');
							}, 100);
						},
						response: function(event, ui) {
							if (ui.content.length === 0) {
								$searchInputWrap.removeClass('open-autocomplete');
							} else {
								$searchInputWrap.addClass('open-autocomplete');
							}
						},
						create: function() {
							$(this).data('ui-autocomplete')._renderItem = function (ul, item) {
								var $searchItem = $('<figure>');
								var $ttl = $('<h4>');
								var $descr = $('<p>');
								var $img = $('<img>');
								var $imgHold = $('<div class="img">');
								var $textHold = $('<figcaption>');

								$ttl.append(item.label);
								$descr.append(item.descr);
								$img.attr({
									src: 'images/' + item.img,
									alt: item.label
								});

								$imgHold.append($img)
								$textHold.append($ttl).append($descr);

								$searchItem.append($imgHold).append($textHold);

								return $('<li></li>')
									.data("item.autocomplete", item)
									.append($searchItem)
									.appendTo(ul);
							};
						}
					});
				});
			});
			$list.niceScroll({
				autohidemode: false,
				cursorwidth: 12,
				cursorcolor: "#dae6ef",
				cursorborder: "0",
				cursorborderradius: "4px"
			});
		});
	}
	// end init hotel search autocomplete
})(this.jQuery);
