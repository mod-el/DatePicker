async function checkDatePicker() {
	let arr = [];
	if (window.innerWidth >= 480) { // For smaller screen (aka smartphone) use only the default date plugin
		let arr2 = document.querySelectorAll('input[type="date"]');
		for (let el of arr2)
			arr.push(el);
	}

	for (let el of arr) {
		if (el.offsetParent === null)
			continue;

		let format = 'd-m-Y';
		if (el.getAttribute('type') === 'date') {
			if (isEdge()) {
				let v = el.getValue(true);
				el.setAttribute('type', 'text');
				el.setValue(v, false);
			}

			if (isDateSupported() && !isEdge()) {
				format = 'Y-m-d';
			} else {
				let d = el.getValue(true);
				if (d) {
					d = new Date(d);
					if (!isNaN(d.getTime())) {
						let day = d.getDate();
						let month = d.getMonth() + 1;
						if (day < 10) day = '0' + day;
						if (month < 10) month = '0' + month;
						el.value = day + '-' + month + '-' + d.getFullYear();
					}
				}
			}
		}

		if (el.readOnly)
			continue;

		await attachDatePicker(el, {format});
	}
}

async function attachDatePicker(el, custom_options) {
	let obj = $(el);
	let old_datepicker = obj.data('Zebra_DatePicker');

	let options = {
		show_icon: false,
		format: 'Y-m-d',
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
					let evt = new Event('change', {"bubbles": false, "cancelable": true});
					this[0].dispatchEvent(evt);
				}
			} else {
				this[0].fireEvent("onchange");
			}
		},
		onClear: function () {
			if ("createEvent" in document) {
				if (typeof this[0].dispatchEvent !== 'undefined') {
					let evt = new Event('change', {"bubbles": false, "cancelable": true});
					this[0].dispatchEvent(evt);
				}
			} else {
				this[0].fireEvent("onchange");
			}
		}
	};
	let end = false;
	if (el.getAttribute('data-datepicker_end'))
		end = el.getAttribute('data-datepicker_end');

	if (end) {
		if (document.getElementById(end))
			options.pair = $('#' + end);
		else if (typeof el.form !== 'undefined' && typeof el.form[end] !== 'undefined')
			options.pair = $(el.form[end]);
	}

	options = {...options, ...custom_options};

	if (typeof old_datepicker === 'undefined') {
		el.setAttribute('autocomplete', 'off');
		el.addEventListener('click', function (ev) {
			ev.preventDefault();
		});
		obj.Zebra_DatePicker(options);
	} else {
		old_datepicker.update(options);
	}
}

function isEdge() {
	return /Edge\/\d./i.test(navigator.appVersion);
}

window.addEventListener('load', function () {
	onHtmlChange(checkDatePicker);
});
