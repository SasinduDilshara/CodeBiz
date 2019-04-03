<?php

class Requests extends Model
{
	public function __construct($request='')
	{
		$table = 'requests';
		parent:: __construct($table);
		$this->_softDelete = false;
	}

	
	

	// public $customer =currentUser()->username;

	public function findByUserId($userId,$params=[])
	{
		// dnd($userId);
		$conditions = ['conditions'=>'user_id = ?','bind'=>[$userId]
	];
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);
	// dnd($this->find($conditions));
	return $this->find($conditions);
	}

	public function displayName()
	{
		return $this->service;;
	}

	public static $addValidation =
	[
		'service' =>[
			'display' =>'Service',
			'required' => true,
			'min' => 6
	],
	
		'description' =>
		[
			'display' =>'Description',
			'required' => true
			// 'max' => 155
		] 
	];


	public function findByIdAndUserId($request_id,$user_id,$params=[])
	{
		// dnd($request_id,);
		// dnd($user_id);
		$conditions = ['conditions' => 'id = ? AND user_id = ?','bind' => [$request_id,$user_id]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->findFirst($conditions);
	}

	// public function displayAddress()
	// {
	// 	$address = '';
	// 	if(!empty($this->address))
	// 	{
	// 		$address.=$this->address."<br>";

	// 	}
	// 	// if(!empty($this->address1))
	// 	// {
	// 	// 	$address.=$this->address1."<br>"; //if two or more address

	// 	// }
	// 	if(!empty($this->city))
	// 	{
	// 		$address.=$this->city.",";
	// 	}

	// 		$address.=$this->state." ".$this->zip."<br>";
	// 	// }
	// 	return $address;
	// }

	// public function displayAddressLabel()
	// {
	// 	$html = $this->displayName()."<br>";
	// 	$html .= $this->displayAddress();
	// 	return $html;
	// }

}

?>