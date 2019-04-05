<?php

class Requests extends Model implements Observable
{
	public $observers=[];
	public function __construct($request='')
	{
		$table = 'requests';
		parent:: __construct($table);
		$this->_softDelete = false;
		$observers = [];
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

	public function findById($request_id,$params=[])
	{
		// dnd($request_id,);
		// dnd($user_id);
		$conditions = ['conditions' => 'id = ?','bind' => [$request_id]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->findFirst($conditions);
	}

	public function findByLocation($location,$params=[])
	{
		// dnd($request_id,);
		// dnd($user_id);
		$conditions = ['conditions' => 'area = ?','bind' => [$location]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->find($conditions);
	}

	// public function findcustomer($user_id,$params=[])
	// {
	// 	// dnd($request_id,);
	// 	// dnd($user_id);
	// 	Users::findByUserId($user_id,$params);

	// return $this->find($conditions);
	// }	

	public function setAccepted($id)
	{
		return $this->update($id, ['accepted' => 1]);
	}

	public function notify($requests,$provider,$owner)
	{
		// dnd($requests);
		// dnd($this->observers);
		foreach($this->observers as $observer)
		{
			if($observer->userType == "Customer")
			{
			$observer->updateObserver($requests,$provider,$owner);
		    }
		    elseif($observer->userType == "Provider")
		    {
		    $observer->updateProvider($requests,$provider,$owner);
		    }
		}
	}
	public function attach($observer)
		{
			// dnd($this->observers);
			// dnd($observer);
			array_push($this->observers,$observer);
		}
	public function detach($observer)
		{
			// array_push($this->observers,$observer);
		}

 	public function sendAcceptance($request,$customer,$provider)
 	{
 		currentUser()->sendMessage($request,$provider,$customer);
 	}

}

?>