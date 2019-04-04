<?php

class Launderingad extends Advertisements
{
	public function __construct($launderingad='')
	{
		// $table = 'cleaningad';
		parent:: __construct('launderingad');
		$this->_softDelete = false;
		$this->type = 'Laundering';
	}

	public function displayAdd()
	{
		// $address = '';
		if(!empty($this->area))
		{
			return $this->area."<br>".$this->capacity;
		}
		// // }
		
	}

	public function displayAddLabel()
	{
		// $html = $this->displayName()."<br>";
		// // $html .= $this->displayAdd();
		// return $html;
	}

}

?>