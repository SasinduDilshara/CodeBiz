<?php

class Accounts extends Model
{
	public function __construct($account='')
	{
		$table = 'users';
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
                'fname'=>[
                    'display' => 'First Name'
                    // 'required' => true
                ],
                'lname'=>[
                    'display' => 'Last Name'
                    // 'required' => true
                ],
                'username' => [
                    'display' => 'username',
                    // 'required' => true,
                    'unique' => 'users',
                    //'valid_email' => true
                    'min'=> 4
                    //'max' =>25
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'unique' => 'users',
                    'valid_email' => true,
                    'min'=> 4
                    //'max' =>25
                ],
                'password' => [
                    'display' => 'Password',
                    // 'required' => true,
                    'min' => 6
                    //'max' => 100
                ],
                'address' => [
                    'display' => 'Address',
                    // 'required' => true,
                    'min' => 6
                    //'max' => 100
                ],
                // 'phoneNumber' => [
                //     'display' => 'Contact Number 1',
                //     'required' => true,
                //     'min' => 10,
                //     'max' => 10
                // ],
                'phoneNumber2' => [
                    'display' => 'Contact Number 2',
                    'min' => 10
                    //'max' => 100
                ],
                'serviceType' => [
                    'display' => 'Service Type'
                    // 'required' => true
                    
                ],
                'userType' => [
                    'display' => 'User type'
                    // 'required' => true
                    //'max' => 100
                ],
                'customerResidence' => [
                    'display' => 'Customer Residence',
                    // 'required' => true
                    //'max' => 100
                ],

                'confirm' => [
                    'display' => 'Confirm Password',
                    // 'required' => true,
                    'matches' => 'password'

                ]
            ];


	public function findByIdAndUserId($account_id,$user_id,$params=[])
	{
		// dnd($account_id);
		// dnd($user_id);
		$conditions =
		 [
		'conditions' => 'id = ? AND user_id = ?',
		'bind' => [$account_id , $user_id]
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

	public function displayAccountLabel()
	{
		$html = $this->displayName()."<br>";
		$html .= $this->displayAddress();
		return $html;
	}

	public function displayType()
	{
		// return $this->fname.' '.$this->lname;
		if($this->userType == "Both")
		{
			return "Both Provider and Customer";
		}
		return $this->userType;
	}

}

?>