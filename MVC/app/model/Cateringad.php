<?php

class Cateringad extends Advertisements
{
	public function __construct($cateringad='')
	{
		// $table = 'cateringad';
		parent:: __construct('cateringad');
		$this->_softDelete = false;
		$this->type = 'Catering';
	}

	public function displayAdd()
	{
		if(!empty($this->area))
		{
			return $this->area."<br>".$this->capacity;
		}

	}

	public function displayAddLabel()
	{
		// $html = $this->displayName()."<br>";
		// // $html .= $this->displayAdd();
		// return $html;
	}

}

?>