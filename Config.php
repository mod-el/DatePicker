<?php namespace Model\DatePicker;

use Model\Core\Module_Config;

class Config extends Module_Config
{
	/**
	 * @return bool
	 */
	public function makeCache(): bool
	{
		if ($this->model->moduleExists('Multilang')) {
			$this->model->_Multilang->checkAndInsertWords('datepicker', [
				'january' => [
					'it' => 'Gennaio',
					'en' => 'January',
				],
				'february' => [
					'it' => 'Febbraio',
					'en' => 'February',
				],
				'march' => [
					'it' => 'Marzo',
					'en' => 'March',
				],
				'april' => [
					'it' => 'Aprile',
					'en' => 'April',
				],
				'may' => [
					'it' => 'Maggio',
					'en' => 'May',
				],
				'june' => [
					'it' => 'Giugno',
					'en' => 'June',
				],
				'july' => [
					'it' => 'Luglio',
					'en' => 'July',
				],
				'august' => [
					'it' => 'Agosto',
					'en' => 'August',
				],
				'september' => [
					'it' => 'Settembre',
					'en' => 'September',
				],
				'october' => [
					'it' => 'Ottobre',
					'en' => 'October',
				],
				'november' => [
					'it' => 'Novembre',
					'en' => 'November',
				],
				'december' => [
					'it' => 'Dicembre',
					'en' => 'December',
				],
				'sunday' => [
					'it' => 'Domenica',
					'en' => 'Sunday',
				],
				'monday' => [
					'it' => 'Lunedì',
					'en' => 'Monday',
				],
				'tuesday' => [
					'it' => 'Martedì',
					'en' => 'Tuesday',
				],
				'wednesday' => [
					'it' => 'Mercoledì',
					'en' => 'Wednesday',
				],
				'thursday' => [
					'it' => 'Giovedì',
					'en' => 'Thursday',
				],
				'friday' => [
					'it' => 'Venerdì',
					'en' => 'Friday',
				],
				'saturday' => [
					'it' => 'Sabato',
					'en' => 'Saturday',
				],
				'weeks' => [
					'it' => 'Sett.',
					'en' => 'Weeks',
				],
				'today' => [
					'it' => 'Oggi',
					'en' => 'Today',
				],
				'reset' => [
					'it' => 'Reimposta',
					'en' => 'Reset',
				],
			]);
		}
		return true;
	}
}
