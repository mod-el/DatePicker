function checkDatePicker() {
	return new Promise(function (resolve) {
		var arr = [];
		if (window.innerWidth >= 480) { // For smaller screen (aka smartphone) use only the default date plugin
			var arr2 = document.querySelectorAll('input[type="date"]');
			for (var i in arr2)
				arr.push(arr2[i]);
		}

		for (var i in arr) {
			if (typeof arr[i] != 'object') continue;
			if (arr[i].offsetParent === null) continue;

			if (arr[i].getAttribute('type') == 'date') {
				if (isEdge()) {
					var v = arr[i].getValue(true);
					arr[i].setAttribute('type', 'text');
					arr[i].setValue(v, false);
				}

				if (isDateSupported() && !isEdge()) {
					var format = 'Y-m-d';
				} else {
					var format = 'd-m-Y';

					var d = arr[i].getValue(true);
					if (d) {
						d = new Date(d);
						if (!isNaN(d.getTime())) {
							var day = d.getDate();
							var month = d.getMonth() + 1;
							if (day < 10) day = '0' + day;
							if (month < 10) month = '0' + month;
							arr[i].value = day + '-' + month + '-' + d.getFullYear();
						}
					}
				}
			} else {
				var format = 'd-m-Y';
			}
			if (arr[i].readOnly) continue;

			attachDatePicker(arr[i], format);
		}
		resolve();
	});
}

function attachDatePicker(el, format) {
	if (typeof format === 'undefined')
		format = 'Y-m-d';

	var obj = $(el);
	var old_datepicker = obj.data('Zebra_DatePicker');
	if (typeof old_datepicker === 'undefined') {
		el.setAttribute('autocomplete', 'off');
		el.addEventListener('click', ev => ev.preventDefault());
		var options = {
			show_icon: false,
			format: format,
			months: (typeof zebraDatePickerMonths !== 'undefined') ? zebraDatePickerMonths : ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
			readonly_element: false,
			select_other_months: true,
			show_week_number: (typeof zebraDatePickerWeeks !== 'undefined') ? zebraDatePickerWeeks : 'St.',
			lang_clear_date: (typeof zebraDatePickerReset !== 'undefined') ? zebraDatePickerReset : 'Cancella',
			show_select_today: (typeof zebraDatePickerToday !== 'undefined') ? zebraDatePickerToday : 'Oggi',
			days: (typeof zebraDatePickerDays !== 'undefined') ? zebraDatePickerDays : ['Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'],
			offset: [-el.offsetWidth, el.offsetHeight + 255],
			onSelect: function () {
				if ("createEvent" in document) {
					if (typeof this[0].dispatchEvent !== 'undefined') {
						var evt = new Event('change', {"bubbles": false, "cancelable": true});
						this[0].dispatchEvent(evt);
					}
				} else {
					this[0].fireEvent("onchange");
				}
			},
			onClear: function () {
				if ("createEvent" in document) {
					if (typeof this[0].dispatchEvent !== 'undefined') {
						var evt = new Event('change', {"bubbles": false, "cancelable": true});
						this[0].dispatchEvent(evt);
					}
				} else {
					this[0].fireEvent("onchange");
				}
			}
		};
		var fine = false;
		if (el.getAttribute('data-datepicker_end'))
			fine = el.getAttribute('data-datepicker_end');
		if (fine) {
			if (document.getElementById(fine))
				options['pair'] = $('#' + fine);
			else if (typeof el.form !== 'undefined' && typeof el.form[fine] !== 'undefined')
				options['pair'] = $(el.form[fine]);
		}
		obj.Zebra_DatePicker(options);
	}
}

function isEdge() {
	return /Edge\/\d./i.test(navigator.appVersion);
}

window.addEventListener('load', function () {
	onHtmlChange(checkDatePicker);
});