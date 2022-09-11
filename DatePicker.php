<?php namespace Model\DatePicker;

use Model\Core\Module;

class DatePicker extends Module
{
	public function init(array $options)
	{
		\Model\Assets\Assets::enable('jquery');
	}

	/**
	 * Eventual headings for multilang websites
	 */
	public function headings()
	{
		if (class_exists('\\Model\\Multilang\\Dictionary')) {
			?>
			<script>
				var zebraDatePickerMonths = [
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.january'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.february'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.march'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.april'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.may'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.june'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.july'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.august'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.september'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.october'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.november'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.december'))?>'
				];
				var zebraDatePickerDays = [
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.sunday'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.monday'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.tuesday'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.wednesday'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.thursday'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.friday'))?>',
					'<?=entities(\Model\Multilang\Dictionary::get('datepicker.saturday'))?>'
				];
				var zebraDatePickerWeeks = '<?=entities(\Model\Multilang\Dictionary::get('datepicker.weeks'))?>';
				var zebraDatePickerToday = '<?=entities(\Model\Multilang\Dictionary::get('datepicker.today'))?>';
				var zebraDatePickerReset = '<?=entities(\Model\Multilang\Dictionary::get('datepicker.reset'))?>';
			</script>
			<?php
		}
	}
}
