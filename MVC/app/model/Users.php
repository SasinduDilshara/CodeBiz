<?php

class Users extends Model implements Observer
{
	private $_isLoggedIn, $_sessionName , $_cookieName;
	public static $currentLoggedInUser =null;

	public function __construct($user='')
	{
		$table = 'users';
		parent:: __construct($table);
		$this->_sessionName = CURRENT_USER_SESSION_NAME;
		$this->_cookieName = REMEMBER_ME_COOKIE_NAME;
		$this->_softDelete = true;
		if($user != '')
		{
			if(is_int($user))
			{
				$u = $this->_db->findFirst('users',['conditions' => 'id = ?','bind' =>[$user]]);
			}
			else
			{
				$u = $this->_db->findFirst('users',['conditions' => 'username = ?','bind' =>[$user]]);
			}

			//database ekata danawa

			if($u)
			{
				foreach($u as $key => $val)
				{
					$this->$key = $val;
				}
			}
		}
	}

	public function findByUsername($username)
	{
		return $this->findFirst(['conditions' => 'username = ?','bind' =>[$username]]);
	}


	public static function currentLoggedInUser()
	{
		if(!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)) //ccheck session existss
		{

			$u=new Users((int)Session::get(CURRENT_USER_SESSION_NAME));
			self::$currentLoggedInUser = $u;
			
		

		}

		return self::$currentLoggedInUser;
	}


	public function login($rememberMe=false)
	{   
		Session::set($this->_sessionName,$this->id);
		if($rememberMe)
		{ //dnd($rememberMe);
			//var_dump($rememberMe);
			$hash = md5(uniqid() + rand(0,100));
			$user_agent = Session::uagent_no_version();
			//dnd($this->_sessionName);
			Cookie::set($this->_cookieName , $hash , REMEMBER_ME_COOKIE_EXPIRY);
			$fields=['session'=>$hash,'user_agent'=>$user_agent,'user_id'=>$this->id];
			$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent =?", [$this->id,$user_agent]);

			$this->_db->insert('user_sessions',$fields);
		}

	}



	public function logout()
	{
		//dnd(self::$currentLoggedInUser);
		// $user_agent = Session::uagent_no_version();
		$userSession = UserSession::getFromCookie();
		// if($userSession) $userSession->delete();
		if($userSession) $userSession->delete();
		$this->_db->query("DELETE FROM user_session Where user_id = ? AND user_agent =?", [$this->id,$user_agent]);
		Session::delete(CURRENT_USER_SESSION_NAME);
		//dnd($_COOKIE);
		if(Cookie::exists(REMEMBER_ME_COOKIE_NAME))
			{	//dnd($currentLoggedInUser);
				Cookie::delete(REMEMBER_ME_COOKIE_NAME);
			}

		self::$currentLoggedInUser =null;
		return true;
	}

	public static function loginUserFromCookie()
	{	
		$userSession = UserSession::getFromCookie();
		// dnd($userSession);
		// $user_session_model = new UserSession();
		// $user_session = $user_session_model->findFirst(
		// 	[
		// 		'conditions' => "user_agent = ? AND session = ?",
		// 		'bind' => [Session::uagent_no_version(),Cookie::get(REMEMBER_ME_COOKIE_NAME)] //cookie name eka gaththa 
		// 	]);
		if($userSession->user_id != '')
		{	
			// var_dump($userSession->user_id);
			$user= new self((int)$userSession->user_id);

		}
		// dnd($user);
		if($user)
		{

		$user->login();
		}
		// $user->login();
		// return self::currentLoggedInUser;
		return $user;
	}

	public function registerNewUser($params)
	{
		$this->assign($params);
		 $this->deleted=0;
		// $this->password = password_hash($this->password, PASSWORD_DEFAULT);
		$this->password = $this->password;
		$this->save();
	}

	public function set_delete($num=1)
	{
		$this->deleted=0;
	}

	public function acls()
	{
		if(empty($this->acl)) return [];
		return json_decode($this->acl,true);
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
                    'display' => 'First Name',
                    'required' => true
                ],
                'lname'=>[
                    'display' => 'Last Name',
                    'required' => true
                ],
                'username' => [
                    'display' => 'username',
                    'required' => true,
                    'unique' => 'users',
                    'valid_email' => true,
                    'min'=> 4,
                    'max' =>25
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'unique' => 'users',
                    'valid_email' => true,
                    'min'=> 4,
                    'max' =>25
                ],
                'password' => [
                    'display' => 'Password',
                    'required' => true,
                    'min' => 6,
                    'max' => 100
                ],
                'address' => [
                    'display' => 'Address',
                    'required' => true,
                    'min' => 6,
                    'max' => 100
                ],
                'phoneNumber' => [
                    'display' => 'Contact Number',
                    'required' => true,
                    'min' => 10,
                    'max' => 10
                ],
                'phoneNumber2' => [
                    'display' => 'Contact Number 2',
                    'min' => 10,
                    'max' => 100
                ],
                'serviceType' => [
                    'display' => 'Service Type',
                    'required' => true
                    
                ],
                'userType' => [
                    'display' => 'User type',
                    'required' => true,
                    'max' => 100
                ],

                'confirm' => [
                    'display' => 'Confirm Password',
                    'required' => true,
                    'matches' => 'password'

                ],
                'area' => [
                    'display' => 'area',
                    'required' => true
                    
                ],



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
		// if(!empty($this->city))
		// {
		// 	$address.=$this->city.",";
		// }

		// 	$address.=$this->state." ".$this->zip."<br>";
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

	
	public function displayAddressLabel()
	{
		$html = $this->displayName()."<br>";
		$html .= $this->displayAddress();
		return $html;
	}

	// public function update($request,$username)
	// {
	// 	// dnd($request->service);
	// 	$message = 'Your '. $request->service .' is accepted by '. $username;
	// 	// dnd($message);
	// 	return $message;
	// }

	public function findById($user_id,$params=[])
	{
		 $conditions = [
		'conditions' => 'id = ?',
		'bind' => [$user_id]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->findFirst($conditions);
	}

	public function updateObserver($request,$provider,$customer)
	{
		// dnd($request);
		// dnd($provider);
		// dnd($customer);

	if($customer->notifications==NULL)
		{
			$Notification = "Your ". $request->service." has been aceepted by ".$provider->username;
		}
	else
	{
		$Notification = "Your ". $request->service." has been aceepted by ".$provider->username. ",".$customer->notifications; 
	}
	// dnd($Notification);

return $this->update($customer->id, ['notifications' => $Notification]);

	}

		public function updateCancelObserver($request,$provider,$customer)
	{
		// dnd($request);
		// dnd($provider);
		// dnd($customer);

	if($customer->notifications==NULL)
		{
			$Notification = $provider->username." has been cancelled the acceptance to your ".$request->service;
		}
	else
	{
		$Notification = $provider->username." has been cancelled the acceptance to your ".$request->service. ",".$customer->notifications; 
	}
	// dnd($Notification);

return $this->update($customer->id, ['notifications' => $Notification]);

	}

	public function updateCancelProvider($request,$provider,$customer)

	{

	if($provider->notifications==NULL)
		{
			$Notification = "You cancelled acceptance of the ". $request->service." which was request by the ".$customer->username;
		}
	else
	{
		$Notification = "You cancelled acceptance of the ". $request->service." which was request by the ".$customer->username. ",".$provider->notifications; 
	}
		return $this->update($provider->id, ['notifications' => $Notification]);
	// dnd($Notification);
	}

	public function updateProvider($request,$provider,$customer)

	{

	if($provider->notifications==NULL)
		{
			$Notification = "You accepted the ". $request->service." which was request by the ".$customer->username;
		}
	else
	{
		$Notification = "You accepted the ". $request->service." which was requested by the ".$customer->username. ",".$provider->notifications; 
	}
		return $this->update($provider->id, ['notifications' => $Notification]);
	// dnd($Notification);
	}

	public function updateConfirmObserver($request,$customer,$provider)
	{
		// dnd($request);
		// dnd($provider);
		// dnd($customer);

	if($provider->notifications==NULL)
		{
			$Notification = "Your ". 'acceptance for the '.$request->service.' request'." has been confirmed by ".$customer->username;
		}
	else
	{
		$Notification =  "Your ". 'acceptance for the '.$request->service.' request'." has been confirmed by ".$customer->username. ",".$provider->notifications; 
	}
	// dnd($Notification);

return $this->update($provider->id, ['notifications' => $Notification]);

	}

	public function updateCustomer($request,$customer,$provider)

	{

	if($customer->notifications==NULL)
		{
			$Notification = "You confirm the ". $request->service." which was accepted by the ".$provider->username;
		}
	else
	{
		$Notification = "You confirm the ". $request->service." which was accepted by the ".$provider->username. ",".$customer->notifications; 
	}
		return $this->update($customer->id, ['notifications' => $Notification]);
	// dnd($Notification);
	}

	public function setMessagesEmpty($user)
	{
		return $this->update($user->id, ['notifications' => '']);
	}

	public function sendOthers($provider,$customer,$request)
 	{
 		// if($provider->username!= 'yasith' && $provider->username!= 'provider'){dnd($provider);}
 	if($provider->notifications==NULL)
		{
			$Notification = $request->service." has been given to another service provider by ".$customer->username;
		}
	else
	{
		$Notification =  $request->service." has been given to another service provider by ".$customer->username. ",".$provider->notifications; 
	}

 		return $this->update($provider->id, ['notifications' => $Notification]);
 	}

 	public function updateCancelConfirmObserver($requests,$customer,$provider)
 	{
 		{
		// dnd($request);
		// dnd($provider);
		// dnd($customer);

	if($provider->notifications==NULL)
		{
			$Notification = 'Confirmation for your '.$requests->service.' acceptance'." has been cancelled by ".$customer->username;
		}
	else
	{
		$Notification =  'Confirmation for your '.$requests->service.' acceptance'." has been cancelled by ".$customer->username. ",".$provider->notifications; 
	}
	// dnd($Notification);

return $this->update($provider->id, ['notifications' => $Notification]);

	}
 	}

 	public function updateCancelCustomer($requests,$customer,$provider)
	{

	if($customer->notifications==NULL)
		{
			$Notification = "You cancelled the ". $requests->service." confirmation of ".$provider->username;
		}
	else
	{
		$Notification = "You cancelled the ". $requests->service." confirmation of ".$provider->username. ",".$customer->notifications; 
	}
		return $this->update($customer->id, ['notifications' => $Notification]);
	// dnd($Notification);
	}
	
}

?>