<?php

class Advertisements extends Model
{
	public function __construct($advertisement='')
	{
		$table = 'advertisements';
		parent:: __construct($table);
		$this->_softDelete = true;
	}

	public $deleted =0;

	public function findByUserId($userId,$params=[])
	{
		$conditions = ['conditions'=>'user_id = ?','bind'=>[$userId]
	];
	$conditions = array_merge($conditions,$params);
	return $this->find($conditions);
	}

	public function displayName()
	{
		return $this->topic;
	}

	public static $addValidation =
	[
		'name' =>[
			'display' =>'Name',
			'required' => true,
			'min' => 6
	],
	
		'topic' =>
		[
			'display' =>'Topic',
			'required' => true
			// 'max' => 155
		] 
	];


	public function findByIdAndUserId($advertisement_id,$user_id,$params=[])
	{
		// dnd($contact_id);
		// dnd($user_id);
		$conditions =
		 [
		'conditions' => 'id = ? AND user_id = ?',
		'bind' => [$advertisement_id , $user_id]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->findFirst($conditions);
	}

	public function displayAdd()
	{
		$address = '';
		if(!empty($this->name))
		{
			$address.=$this->name."<br>";

		}
		// if(!empty($this->address1))
		// {
		// 	$address.=$this->address1."<br>"; //if two or more address

		// }
		if(!empty($this->topic))
		{
			$address.=$this->topic.",";
		}

			// $address.=$this->state." ".$this->zip."<br>";
		// }
		return $address;
	}

	public function displayAddLabel()
	{
		$html = $this->displayName()."<br>";
		$html .= $this->displayAdd();
		return $html;
	}

}

?>