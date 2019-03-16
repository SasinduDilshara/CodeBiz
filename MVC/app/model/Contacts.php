<?php

class Contacts extends Model
{
	public function __construct($contact='')
	{
		$table = 'contacts';
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
		return $this->fname.' '.$this->lname;
	}

	public static $addValidation =
	[
		'fname' =>[
			'display' =>'First name',
			'required' => true,
			'min' => 6
	],
	
		'lname' =>
		[
			'display' =>'Last name',
			'required' => true
			// 'max' => 155
		] 
	];


	public function findByIdAndUserId($contact_id,$user_id,$params=[])
	{
		// dnd($contact_id);
		// dnd($user_id);
		$conditions =
		 [
		'conditions' => 'id = ? AND user_id = ?',
		'bind' => [$contact_id , $user_id]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->findFirst($conditions);
	}

	public function displayAddress()
	{
		$address = '';
		if(!empty($this->address))
		{
			$address.=$this->address."<br>";

		}
		// if(!empty($this->address1))
		// {
		// 	$address.=$this->address1."<br>"; //if two or more address

		// }
		if(!empty($this->city))
		{
			$address.=$this->city.",";
		}

			$address.=$this->state." ".$this->zip."<br>";
		// }
		return $address;
	}

	public function displayAddressLabel()
	{
		$html = $this->displayName()."<br>";
		$html .= $this->displayAddress();
		return $html;
	}

}

?>