<?php

abstract class Advertisements extends Model
{
	public $type;
	public function __construct($table,$advertisement='')
	{
		// $table = 'advertisements';
		parent:: __construct($table);
		$this->_softDelete = false;
	}

	// public $deleted =0;

public function findByLocationAndType($location,$params=[])
	{
		$conditions =
		 [
		'conditions' => 'area= ?',
		'bind' => [$location]
	];

	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->find($conditions);
	}
	
	public function findByUserId($userId,$params=[])
	{
		$conditions = ['conditions'=>'user_id = ?','bind'=>[$userId]
	];
	$conditions = array_merge($conditions,$params);
	return $this->find($conditions);
	}



	public function findBySearch($location)
	{
		// dnd($contact_id);
		// dnd($user_id);
		$conditions =
		 [
		'conditions' => 'area = ?',
		'bind' => [$location]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions);
	// dnd($conditions);

	return $this->find($conditions);
	}

	public function findById($id,$params=[])
	{
		// dnd($contact_id);
		// dnd($user_id);
		$conditions =
		 [
		'conditions' => 'id = ?',
		'bind' => [$id]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->find($conditions);
	}

	public function displayTopic()
	{
		return $this->topic;
	}

	public static $addValidation =
	[
		'area' =>[
			'display' =>'Location',
			'required' => true,
			'min' => 6
	],

	'topic' =>[
			'display' =>'Topic',
			'required' => true,
			'min' => 4
	],
	
		'description' =>
		[
			'display' =>'Description',
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

	public abstract function displayAdd();
	public abstract function displayAddLabel();


}

?>