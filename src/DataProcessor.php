<?php namespace Irsyadulibad\DataTables;

class DataProcessor
{
	protected $processColumn;

	protected $results;

	public function __construct($result, $process)
	{
		$this->results = $result->getResultArray();
		$this->processColumn = $process;
	}

	public function process()
	{
		if(!empty($this->processColumn['hidden']))
			$this->hide();
		$this->escapeColumns();

		return $this->results;
	}

	public function hide()
	{

		$hideCols = $this->processColumn['hidden'];
		$i = 0;

		foreach ($this->results as $data) {
			foreach($data as $key => $val) {
				// Check if hide columns exist
				if(in_array($key, $hideCols)) {
					unset($this->results[$i][$key]);
				}

				continue;
			}

			$i++;
		}

	}

	public function escapeColumns()
	{
		$rawCols = $this->processColumn['raws'];
		$i = 0;

		foreach ($this->results as $data) {
			foreach($data as $key => $val) {
				// Check if raw columns exist
				if(in_array($key, $rawCols)) 
					continue;

				$this->results[$i][$key] = esc($val);
			}

			$i++;
		}
	}
}
