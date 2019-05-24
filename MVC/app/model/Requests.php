<?php

class Requests extends Model implements Observable
{
	public $observers=[];
	public $confirmobservers=[];
	public $cancelAceeptsObservers = [];
	public $CancelConfirmobservers = [];
	public function __construct($request='')
	{
		$table = 'requests';
		parent:: __construct($table);
		$this->_softDelete = false;
		$observers = [];
		$confirmobservers = [];
		$cancelAceeptsObservers = [];
		$CancelConfirmobservers = [];
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



public function findByUserIdandCompleteID($user_id,$cId,$params=[])
	{
		// dnd($request_id,);
		// dnd($user_id);
		$conditions = ['conditions' => 'user_id = ? AND completed = ?','bind' => [$user_id,$cId]
	];

	// dnd($conditions);
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);

	return $this->find($conditions);
	}


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

	public function findByUserconfirmId($userId,$params=[])
	{
		// dnd($userId);
		$conditions = ['conditions'=>'confirmProviderId = ?','bind'=>[$userId]
	];
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);
	// dnd($this->find($conditions));
	return $this->find($conditions);
	}

	public function findByUsercompleteId($userId,$params=[])
	{
		// dnd($userId);
		$conditions = ['conditions'=>'completeId = ?','bind'=>[$userId]
	];
	$conditions = array_merge($conditions,$params);
	// dnd($conditions);
	// dnd($this->find($conditions));
	return $this->find($conditions);
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

	public function setAccepted($id,$request,$owner)
	{
	if(currentUser() && currentUser()->userType == 'Customer')
		{
		$this->update($id, ['accepted' => 1]);
		$this->update($id, ['confirmProviderId' => $owner->id]);
		}
		// dnd($owner);
	else if(currentUser()->userType == 'Provider')
	{
		if($request->providerId==null)
		{
			$this->update($id, ['providerId' => (string)($owner->id)]);
			$this->update($id, ['providerName' => $owner->username]);
		}
		else
		{
			// dnd($request->providerId+","+(string)($owner->id));;
			$this->update($id, ['providerId' => $request->providerId.",".(string)($owner->id)]);
			$this->update($id, ['providerName' => $request->providerName.",".$owner->username]);			
		}
	}
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

	

		public function unsetAccepted($id,$newproviders)
	{
	if(currentUser() && currentUser()->userType == 'Provider')
		{
		$this->update($id, ['accepted' => 0]);
		$this->update($id, ['confirmProviderId' => $newproviders]);
		}
		// dnd($owner);
	else if(currentUser() && currentUser()->userType == 'Customer')
	{
		$this->update($id, ['accepted' => 0]);
		$this->update($id, ['confirmProviderId' => 0 ]);
		
	}
if(currentUser()->userType == "Customer")
{
	$this->update($id, ['chatCus' => '' ]);
	$this->update($id, ['chatPro' => '' ]);
}
else
{
	$this->update($id, ['chatPro' => '' ]);
}
}



	public function unsetConfirm($id,$request)
	{
		if(currentUser() && currentUser()->userType == 'Provider' && $request->confirmProviderId == currentUser()->id)
			{
			$this->update($id, ['confirmProviderId' => 0]);
			}
	}

	public function notifyAccepts($requests,$provider,$owner)
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

	public function notifyConfirms($requests,$customer,$provider)
	{
		// dnd($requests);
		// dnd($this->confirmobservers);
		foreach($this->confirmobservers as $observer)
		{
			// dnd("p");
			if($observer->userType == "Provider")
			{
			$observer->updateConfirmObserver($requests,$customer,$provider);
		    }
		    elseif($observer->userType == "Customer")
		    {
		    $observer->updateCustomer($requests,$customer,$provider);
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
 	public function deleteProviderId($providerList)
 	{
 	 	$newList='';
 		foreach ($providerList as $ids) 
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
 		$this->update($id, ['providerId' => $Idlist]);
 		$this->update($id, ['providerName' => $NameList]);

 	}



	public function notifyCancellation($requests,$provider,$owner)
	{
		// dnd($requests);
		// dnd($this->observers);
		foreach($this->cancelAceeptsObservers as $observer)
		{
			if($observer->userType == "Customer")
			{
			$observer->updateCancelObserver($requests,$provider,$owner);
		    }
		    elseif($observer->userType == "Provider")
		    {
		    $observer->updateCancelProvider($requests,$provider,$owner);
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

	public function getmessage($id,$request,$message)
	{
		// if(currentUser()->userType == "Provider")
	// {
		if(($request->chatCus == ''))
		{
			$CHATS1 = $message;
		}
		else
		{
			$CHATS1 = $request->chatCus.','.$message;
			// dnd($CHATS);
		}
	// }

		$this->update($id, ['chatCus' => $CHATS1]);
	return $CHATS1;
	}


	public function getmessage1($id,$request,$message)
	{
		// if(currentUser()->userType == "Provider")
	// {
		if(($request->chatPro == ''))
		{
			$CHATS = $message;
		}
		else
		{
			$CHATS = $request->chatPro.','.$message;
			// dnd($CHATS);
		}
	// }
	// }

		$this->update($id, ['chatPro' => $CHATS]);
	return $CHATS;
	}



	public function setChatEmpty($request)
	{
		if(currentUser()->userType == "Customer")
		{
			return $this->update($request->id, ['chatCus' => '']);
		}
		// dnd($this->update($request->id, ['chatPro' => '']));
		return $this->update($request->id, ['chatPro' => '']);
	}

	public function updateRate($request,$id,$rate)
	{
		$rate=$request->rated + $rate;
		if($request->ratedType == '')
		{
			$c = '';
		}
		else
		{
			$c = ',';
		}
		$ratedType = $request->ratedType .$c .currentUser()->userType;
		$this->update($id, ['rated' => $rate]);
		$this->update($id, ['ratedType' => $ratedType]);
		// $this->update($id, ['confirmProviderId' => $newproviders]);
	}

	public function MarkReport($type,$id,$user_id,$other,$add)
	{
		// dnd($userId);
		$xxxx= (string)($add->reportedBy).",".(string)$user_id;
		$this->update($id, ['reported' => ($add->reported+1)]);
		$this->update($id, ['reportedBy' => $xxxx]);

		return true;
	}

}

?>