<?php namespace Model\DatePicker;

use Model\Core\Module;

class DatePicker extends Module
{
	/** @var array */
	protected $options = [
		'multilang' => false,
	];

	/**
	 * @param array $options
	 * @throws \Model\Core\Exception
	 */
	public function init($options)
	{
		if (!$this->model->isLoaded('JQuery'))
			$this->model->load('JQuery');
		$this->options = array_merge($this->options, $options);
	}

	/**
	 * Eventual headings for multilang websites
	 */
	public function headings()
	{
		if ($this->options['multilang']) {
			?>
            <script>
				var zebraDatePickerMonths = [
					'<?=entities($this->model->_Multilang->word('datepicker.january'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.february'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.march'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.april'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.may'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.june'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.july'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.august'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.september'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.october'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.november'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.december'))?>'
				];
				var zebraDatePickerDays = [
					'<?=entities($this->model->_Multilang->word('datepicker.sunday'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.monday'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.tuesday'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.wednesday'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.thursday'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.friday'))?>',
					'<?=entities($this->model->_Multilang->word('datepicker.saturday'))?>'
				];
				var zebraDatePickerWeeks = '<?=entities($this->model->_Multilang->word('datepicker.weeks'))?>';
				var zebraDatePickerToday = '<?=entities($this->model->_Multilang->word('datepicker.today'))?>';
				var zebraDatePickerReset = '<?=entities($this->model->_Multilang->word('datepicker.reset'))?>';
            </script>
			<?php
		}
	}
}
