<?php

abstract class Advertisements extends Model implements Observable
{
	public $observers=[];
	public $confirmobservers=[];
	public $cancelAceeptsObservers = [];
	public $CancelConfirmobservers = [];
	public $type;
	public function __construct($table,$advertisement='')
	{
		// $table = 'advertisements';
		parent:: __construct($table);
		$this->_softDelete = false;
		$observers = [];
		$confirmobservers = [];
		$cancelAceeptsObservers = [];
		$CancelConfirmobservers = [];

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

	return $this->findFirst($conditions);
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








	public function setAccepted($id,$advertisement,$owner)
	{
		// dnd($advertisement);

	if(currentUser()->username == $owner->username)
	{
		// dnd('1');
		if($advertisement->CustomerId==null)
		{
			// dnd('1');
			$this->update($id, ['CustomerId' => (string)($owner->id)]);
			// $this->update($id, ['providerName' => $owner->username]);
		}
		else
		{
			// dnd('11');
			// dnd($request->providerId+","+(string)($owner->id));;
			$this->update($id, ['CustomerId' => $advertisement->CustomerId.",".(string)($owner->id)]);
		}
	}

	elseif(currentUser()->username != $owner->username)
		{
			// dnd($advertisement->confirmCustomerId);
		// $this->update($id, ['accepted' => 1]);
			$x = $advertisement->confirmCustomerId.",".(string)($owner->id);
			$x = ltrim($x,',');
// dnd($x);
			$this->update($id, ['confirmCustomerId' => $x]);
		// $this->update($id, ['confirmCustomerId' => $owner->id]);
		}
		// dnd($owner);

	}


	public function MarkComplete($id,$userId)
	{
		// dnd($userId);
		$this->update($id, ['completed' => 1]);
		$this->update($id, ['completeId' => $userId]);

		return true;
	}

	public function UnMarkComplete($id)
	{
		// dnd($userId);
		$this->update($id, ['completed' => 0]);
		$this->update($id, ['completeId' => 0]);
		$this->update($id, ['rated' => 0]);
		$this->update($id, ['ratedType' => '']);

		return true;
	}

	

	public function unsetAccepted($id,$newcustomers,$owner)
	{
	if(currentUser() && currentUser()->username != $owner->username)
		{
		// $this->update($id, ['accepted' => 0]);
			$this->update($id, ['chatCus' => '' ]);
		$this->update($id, ['confirmCustomerId' => $newcustomers]);
		}
		// dnd($owner);
	else if(currentUser() && currentUser()->username == $owner->username)
	{
		// $this->update($id, ['accepted' => 0]);
		$this->update($id, ['confirmCustomerrId' => $newcustomers ]);
		$this->update($id, ['chatPro' => '' ]);
		
	}

	// $this->update($id, ['chat' => '' ]);

}

	public function unsetConfirm($id,$request,$owner,$list)
	{
		if(currentUser() && currentUser()->username != $owner->username && in_array((string)(currentUser()->id),explode(",",$request->confirmCustomerId)))
			{
			$this->update($id, ['confirmCustomerId' => $list]);
			}
	}

	public function notifyAccepts($advertisement,$provider,$owner)
	{
		// dnd($requests);
		// dnd($this->observers);
		foreach($this->observers as $observer)
		{
			if(currentUser()->userType == "Provider")
			{
			$observer->updateObserver($advertisement,$provider,$owner);
		    }
		    elseif(currentUser()->userType == "Provider")
		    {
		    $observer->updateProvider($advertisement,$provider,$owner);
		    }
		}
	}
	public function attachAccepts($observer)
		{
			// dnd($this->observers);
			// dnd($observer);
			array_push($this->observers,$observer);
		}
	public function detachAccepts($observer)
		{
			// array_push($this->observers,$observer);
		}

	public function notifyConfirms($requests,$provider,$customer)
	{
		// dnd($requests);
		// dnd($this->confirmobservers);
		foreach($this->confirmobservers as $observer)
		{
			// dnd("p");
			if(currentUser()->username == $customer->username)
			{
			$observer->updateConfirmObserver($requests,$provider,$customer);
		    }
		    else
		    {
		    $observer->updateCustomer($requests,$provider,$customer);
		    }
		}
	}
	public function attachConfirms($observer)
		{
			// dnd($this->confirmobservers);
			// dnd($observer);
			array_push($this->confirmobservers,$observer);
		}
	public function detachConfirms($observer)
		{
			// array_push($this->observers,$observer);
		}

 	public function sendAcceptance($request,$customer,$provider)
 	{
 		currentUser()->sendMessage($request,$provider,$customer);
 	}
 	// public function sendOthers($provider_)
 	// {

 	// }
 	public function deleteProviderId($customerList)
 	{
 	 	$newList='';
 		foreach ($customerList as $ids) 
 		{
 			if($ids!=currentUser()->id)
 			{
 				$newList.=$ids.",";
 			}
 			// $index+=1
 		}
 		$newList = rtrim($newList,',');
 		// dnd($newList);
 		return $newList;
 	}

 	

 	public function deleteconfirmCusId($customerList)
 	{
 	 	$newList='';
 		foreach ($customerList as $ids) 
 		{
 			if($ids!=currentUser()->id)
 			{
 				$newList.=$ids.",";
 			}
 			// $index+=1
 		}
 		$newList = rtrim($newList,',');
 		return $newList;
 	}

 	 	public function deleteProviderName($providerList)
 	{
 	 	$newList='';
 		foreach ($providerList as $ids) 
 		{
 			if($ids!=currentUser()->username)
 			{
 				$newList.=$ids.",";
 			}
 			// $index+=1
 		}
 		$newList = rtrim($newList,',');
 		return $newList;
 	}

 	public function updateCancellation($id,$Idlist,$NameList)
 	{
 		// dnd($NameList);
 		$this->update($id, ['CustomerId' => $Idlist]);
 		$this->update($id, ['confirmCustomerId' => $NameList]);

 	}



	public function notifyCancellation($requests,$customer,$owner)
	{
		// dnd($requests);
		// dnd($this->observers);
		foreach($this->cancelAceeptsObservers as $observer)
		{
			if(currentUser()->username== $owner->username)
			{
			$observer->updateCancelObserver($requests,$customer,$owner);
		    }
		    elseif(currentUser()->username!= $owner->username)
		    {
		    $observer->updateCancelProvider($requests,$customer,$owner);
		    }
		}
	}
	public function attachCancellation($observer)
		{
			// dnd($this->observers);
			// dnd($observer);
			array_push($this->cancelAceeptsObservers,$observer);
		}
	public function deattachCancellation($observer)
		{
			// array_push($this->observers,$observer);
		}

	public function notifyCancelConfirms($requests,$customer,$provider)
	{
		// dnd($requests);
		// dnd($this->confirmobservers);
		foreach($this->CancelConfirmobservers as $observer)
		{
			// dnd("p");
			if($observer->userType == "Provider")
			{
			$observer->updateCancelConfirmObserver($requests,$customer,$provider);
		    }
		    elseif($observer->userType == "Customer")
		    {
		    $observer->updateCancelCustomer($requests,$customer,$provider);
		    }
		}
	}

	public function attachCancelConfirms($observer)
	{
			// dnd($this->observers);
			// dnd($observer);
			array_push($this->CancelConfirmobservers,$observer);
	}

	public function deattachCancelConfirms($observer)
	{

	}

	public function getmessage($id,$advertisement,$message)
	{
		if(($advertisement->chatPro == ''))
		{
			$CHATS = $message;
		}
		else
		{
			$CHATS = $advertisement->chatPro.','.$message;
			// dnd($CHATS);
		}
	if(($advertisement->chatCus == ''))
		{
			$CHATS = $message;
		}
		else
		{
			$CHATS = $advertisement->chatCus.','.$message;
			// dnd($CHATS);
		}

		$this->update($id, ['chatPro' => $CHATS]);
		$this->update($id, ['chatCus' => $CHATS]);
	return $CHATS;
	}

	public function setChatEmpty($advertisement)
	{
		if(currentUser()->userType == "Customer")
		{
			return $this->update($advertisement->id, ['chatCus' => '']);
		}
		return $this->update($advertisement->id, ['chatPro' => '']);
	}

	public function updateRate($advertisement,$id,$rate,$s)
	{
		$rate=$advertisement->rated + $rate;
		if($advertisement->ratedType == '')
		{
			$c = '';
		}
		else
		{
			$c = ',';
		}
		if(currentUser()->userType == "Provider")
		{
			$ratedType = $advertisement->ratedType .$c. $s->username;
		}
		else{
			$ratedType = $advertisement->ratedType .$c .currentUser()->id;
		}
		$this->update($id, ['rated' => $rate]);
		$this->update($id, ['ratedType' => $ratedType]);
		// $this->update($id, ['confirmProviderId' => $newproviders]);
	}


	public function unAdsetAccepted($id,$advertisement,$customer,$confirms)
	{
		$a ='';
		// dnd($confirms);
		// dnd((string)($customer->id));
		foreach($confirms as $confirm)
			{
				if($confirm == (string)($customer->id))
				{
					continue;
				}
				$a= $a.$confirm.",";
			}
			// dnd($a);
			$this->update($id, ['confirmCustomerId' => rtrim($a,",")]);
			return rtrim($a,",");
	}

	public function findByUserconfirmId($id,$params=[])
	{
		$list =[];

		$conditions =
		 [
		'conditions' => 'confirmCustomerId != ?',
		'bind' => ['']
	];

	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	$array = $this->find($conditions);

	if(count($array) == 0)
		{
			return array();
		}
	foreach($array as $b)
	{
		if(in_array((string)($id), explode(",",$b->confirmCustomerId)))
		{
			array_push($list, $b);
		}
		// dnd($list);
		
	}

return $list;
	
	}

	public function filterByConfirm($advertisements,$id)
	{
		$list = [];
		if(count($advertisements) == 0)
		{
			return array();
		}
		foreach($advertisements as $advertisement)
		{
			if($advertisement->confirmCustomerId != '')
			{
				array_push($list, $advertisement);
			}
			// dnd($list[1]);
			
		}
		return $list;
	}


}

?>