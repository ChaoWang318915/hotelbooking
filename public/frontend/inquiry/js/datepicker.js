(function($) {
	'use strict';

	$(document).ready(function() {
		initDatepicker();
	});

	// init datepicker
	function initDatepicker() {
		$(function() {
			var dateToday = new Date();

			$('.datepicker').datepicker({
				showOtherMonths: true,
				dateFormat: 'D, dd.mm.yy',
				minDate: dateToday,
				beforeShow: function () {

				},
				onChangeMonthYear : function () {
					
				}
			});
		});
	}
	// end init datepicker
})(this.jQuery);
