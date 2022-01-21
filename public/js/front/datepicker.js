(function($) {
	'use strict';

	$(document).ready(function() {
		initDatepicker();
	});

	// init datepicker
	function initDatepicker() {
		// disabled today + next 3 days
		let minDate = moment().add(3, 'd').toDate();

		moment.locale('de');

		$('.date-inputs-group').each(function() {
			const CLASS_STATE_2 = 'is-state2';
			const CLASS_STATE_3 = 'is-state3';
			const DATE_FORMAT = 'DD.MM.YYYY';
			let $group = $(this);
			let $inputStart = $group.find('.datepicker').eq(0);
			let $inputEnd = $group.find('.datepicker').eq(1);

			let picker = new Litepicker({
				element: $inputStart[0],
				elementEnd: $inputEnd[0],
				singleMode: false,
				firstDay: 1,
				selectForward: true,
				minDate: minDate,
				lang: 'de-DE',
				tooltipText: {
					"one": "tag",
					"other": "tage",
				},
				// lockDaysFilter: function(date1, date2, pickedDates) {
				// 	return !allowedDates.includes(date1.format('YYYY-MM-DD'));
				// },
				resetButton: function() {
					// append custom elements
					let $statusBar = $group.find('.hidden-status .status-bar');
					return $statusBar.length ? $statusBar.clone()[0] : null;
				},
			});

			let $litepickerBox = $(picker.ui);
			let pickedDates = {
				start: null,
				end: null,
			};

			$(document).on('click', '.litepicker .datepicker-reset', function(e) {
				e.preventDefault();
				let $resetBtn = $(this);

				if (picker) {
					if ($litepickerBox === $resetBtn.closest('.litepicker')) {
						picker.clearSelection();
					}
				}
			});

			picker.on('clear:selection', function() {
				// reset
				$litepickerBox.removeClass(CLASS_STATE_2);
				$litepickerBox.removeClass(CLASS_STATE_3);
				pickedDates.start = null;
				pickedDates.end = null;
			});

			picker.on('preselect', function(date1, date2) {
				// select start date
				if (date1 && !date2) {
					$litepickerBox.removeClass(CLASS_STATE_3);
					$litepickerBox.addClass(CLASS_STATE_2);
				}

				// select end date
				if (date1 && date2) {
					$litepickerBox.removeClass(CLASS_STATE_2);
					$litepickerBox.addClass(CLASS_STATE_3);
				}
			});

			picker.on('selected', function(date1, date2) {
				pickedDates.start = date1.dateInstance;
				pickedDates.end = date2.dateInstance;
			});

			picker.on('hide', function() {
				if (pickedDates.start && pickedDates.end) {
					$inputStart.val( moment(pickedDates.start).format(DATE_FORMAT) );
					$inputEnd.val( moment(pickedDates.end).format(DATE_FORMAT) );
				}
			});
		});
	}
	// end init datepicker
})(this.jQuery);
