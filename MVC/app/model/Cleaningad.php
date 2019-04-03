<?php

class Cleaningad extends Advertisements
{
	public function __construct($cleaningad='')
	{
		// $table = 'cleaningad';
		parent:: __construct('cleaningad');
		$this->_softDelete = false;
		$this->type = 'Cleaning';
	}

	public function displayAdd()
	{

	if(!empty($this->area))
	{
		return $this->area;
	}
	}

	public function displayAddLabel()
	{
		// $html = $this->displayName()."<br>";
		// $html .= $this->displayAdd();
		// return $html;
	}

}

?>