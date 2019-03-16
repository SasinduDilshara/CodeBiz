<?php

class Contacts extends Model
{
	public function __construct($user='')
	{
		$table = 'contacts';
		parent:: __construct($table);
		$this->_softDelete = true;
	}

	public $deleted =0;

	public function findByUserId($userId,$params=[])
	{
		$conditions = ['condition'=>'user_id = ?','bind'=>[$userId]
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

}

?>