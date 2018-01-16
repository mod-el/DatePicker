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
			$dic = $this->model->_Multilang->getDictionary();
			?>
            <script>
				var zebraDatePickerMonths = [
					'<?=entities($dic['calendar-january'])?>',
					'<?=entities($dic['calendar-february'])?>',
					'<?=entities($dic['calendar-march'])?>',
					'<?=entities($dic['calendar-april'])?>',
					'<?=entities($dic['calendar-may'])?>',
					'<?=entities($dic['calendar-june'])?>',
					'<?=entities($dic['calendar-july'])?>',
					'<?=entities($dic['calendar-august'])?>',
					'<?=entities($dic['calendar-september'])?>',
					'<?=entities($dic['calendar-october'])?>',
					'<?=entities($dic['calendar-november'])?>',
					'<?=entities($dic['calendar-december'])?>'
				];
				var zebraDatePickerDays = [
					'<?=entities($dic['calendar-sunday'])?>',
					'<?=entities($dic['calendar-monday'])?>',
					'<?=entities($dic['calendar-tuesday'])?>',
					'<?=entities($dic['calendar-wednesday'])?>',
					'<?=entities($dic['calendar-thursday'])?>',
					'<?=entities($dic['calendar-friday'])?>',
					'<?=entities($dic['calendar-saturday'])?>'
				];
				var zebraDatePickerWeeks = '<?=entities($dic['calendar-weeks'])?>';
				var zebraDatePickerToday = '<?=entities($dic['calendar-today'])?>';
				var zebraDatePickerReset = '<?=entities($dic['calendar-reset'])?>';
            </script>
			<?php
		}
	}
}
