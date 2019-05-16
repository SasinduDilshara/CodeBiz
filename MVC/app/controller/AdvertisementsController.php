<?php

class AdvertisementsController extends Controller 
{
	public $type;
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Cateringad');
		$this->load_model('Cleaningad');
		$this->load_model('Launderingad');
		// $this->load_model('Advertisements');
		//dnd($this->load_model('advertisements'));
	}



	public function indexAction()
	{
		$alladds=[];
		array_push($alladds, $this->CleaningadModel->findByUserId(currentUser()->id,['order'=>'topic, area']));
		array_push($alladds,$this->CateringadModel->findByUserId(currentUser()->id,['order'=>'topic, area']));
		array_push($alladds,$this->LaunderingadModel->findByUserId(currentUser()->id,['order'=>'topic, area']));
		// dnd($alladds);
		$this->view->alladds=$alladds;
		// $this->view->came=chooseDetails();
		$this->view->render('advertisements/index');
	}

	public function getHome()
	{
		$this->view->render('home/index');
		Router::redirect('');
	}

	public function chooseAction()
	{
		$this->view->render('advertisements/choose');
	}

	public function addAction($type)
	{	
		$advertisement = $this->classLoad($type);
		// $advertisement->type = $advertisement;
		$validation = new Validate();
		if($_POST)
		{
			$_POST['confirmCustomerId'] = '' ;
			$_POST['CustomerId'] = '' ;
			$_POST['chatCus'] = '' ;
			$_POST['chatPro'] = '' ;
			$_POST['rated'] = 0;
			$_POST['ratedType'] = '';

				$advertisement->assign($_POST);	//form validation
			// dnd($contact->assign($_POST));
		$validation->check($_POST,Advertisements::$addValidation);

			
			// dnd($_POST);
			
			if($validation->passed())
			{ 
			$advertisement->user_id =currentUser()->id;
			// dnd(currentUser()->id);
				// dnd("klk");
				// dnd($advertisement->assign($_POST));
			// $advertisement->deleted=0;
			// dnd($advertisement->deleted);
				// $advertisement->assign($_POST);
				// dnd()
			// dnd($advertisement->save());
			// dnd($advertisement);
			// dnd($advertisement->save());
				$advertisement->save();
				$advertisement->type =$type;

				// dnd($advertisement->type);

				Router::redirect('advertisements');
			}
			
			
		}
		// else
		// {

		// 	dnd("jkj");
		// }
		$this->view->displayErrors=$validation->displayErrors();
		$this->view->advertisement = $advertisement;
		$this->view->postAction=PROOT.'advertisements'.DS.'add'.DS.$type;
		// dnd($this->view->postAction);
		$this->view->render('advertisements/add');
	}


  public function detailsAction($type,$id)
  {
  	// dnd($id);
    $advertisement = $this->modelLoad($type)->findById((int)$id,['order'=>'topic']);//cast is a security to check its a number
    // dnd($advertisement);
    if(!$advertisement){
      Router::redirect('advertisements');//no advertisement
    }
$this->view->advertisement = $advertisement;
    // dnd($this->view->advertisement);
    $this->view->render('advertisements/details');
  }


  public function editAction($type,$id)
  {
  	// dnd($id);
  	$validation = new Validate();
    $advertisement = $this->modelLoad($type)->findByIdAndUserId((int)$id,currentUser()->id);

    if(!$advertisement) Router::redirect('advertisements');

    if($_POST)
    {
			$advertisement->assign($_POST);	//form validation
			// dnd($advertisement->assign($_POST));
		$validation->check($_POST,Advertisements::$addValidation);

			
			// dnd($_POST);
			
			if($validation->passed())
			{ 
			// dnd($advertisement->deleted);
				// $advertisement->assign($_POST);
				// dnd()
			// dnd($advertisement->$this->save());
				$advertisement->save();

				Router::redirect('advertisements');
			}
		}

    $this->view->displayErrors=$validation->displayErrors();
    $this->view->advertisement = $advertisement;
    $this->view->postAction = PROOT . 'advertisements' . DS . 'edit' . DS .$type.DS. $advertisement->id;
    $this->view->render('advertisements/edit');
  }

  public function deleteAction($type,$id){
    $advertisement = $this->modelLoad($type)->findByIdAndUserId((int)$id,currentUser()->id);//cast is a security to check its a number
    // dnd($advertisement);
    if($advertisement){
      $advertisement->delete(); 
      Router::redirect('advertisements');
      // Session::addMsg('success','advertisement has been deleted.');
	}
}
	
	public function searchAction()
{	
		// dnd($_GET);
		$type = $_GET["type"];
		if($_GET)
		{
				$advertisements=$this->modelLoad($type)->findBySearch($_GET["area"]);

		}

		$this->view->advertisements = $advertisements;
		// $owner = currentUser()->findById()
		// $this->view->came=chooseDetails('');
		// dnd($this->view->postAction);
		$this->view->render('advertisements/search');
	

    // Router::redirect('advertisements');
  

 }

 	public function modelLoad($type)

 	{
 		if($type === 'Cleaning')
 		{
 			$model_ = $this->CleaningadModel;
 		}
 		elseif($type === 'Catering')
 		{
 			$model_ = $this->CateringadModel;
 		}
 		elseif($type === 'Laundering')
 		{
 			$model_ = $this->LaunderingadModel;
 		}

 		return $model_;
 	}

 	public function classLoad($type)

 	{
 		if($type === 'Cleaning')
 		{
 			$class_ = new Cleaningad();
 		}
 		elseif($type === 'Catering')
 		{
 			$class_ = new Cateringad();
 		}
 		elseif($type === 'Laundering')
 		{
 			$class_ = new Launderingad();
 		}

 		return $class_;
 	}

 	public function chooseDetails($word)
 	{
 		return '<?=PROOT?>'.$word;
 	}






 	public function acceptAction($id,$user_id,$type)//done
 	{
 		if(!currentUser())
 		{
 			$this->view->render('advertisements/CreateAccountAsACustomer');
 		}
 		elseif(currentUser()->userType != 'Customer')
 		{
 			$this->view->render('advertisements/CreateAccountAsACustomer');
 		}
 		else
 		{
 		$advertisement = $this->modelLoad($type)->findById($id);
 		$owner = currentUser()->findById($user_id);
 		// $owner = $owner[0];
 		// dnd($owner);
 		$this->modelLoad($type)->setAccepted($id,$advertisement,currentUser());
 		$this->modelLoad($type)->attachAccepts($owner);
 		$this->modelLoad($type)->attachAccepts(currentUser());
 		$this->view->advertisement=$advertisement;
 		$this->view->owner=$owner;
 		// dnd('1');

 		$this->modelLoad($type)->notifyAccepts($advertisement,currentUser(),$owner);
//*****************************************************************************************************



 		// $customer = $this->RequestsModel->findcustomer($user_id);

 		// $this->view->customer=$customer;
 		// $this->RequestsModel->sendAcceptance($requests,currentUser(),$owner);
 		$this->view->render('advertisements/accept');
 	}
 	}

 	public function showAcceptAction($id,$type)
 	{
 		$advertisement = $this->modelLoad($type)->findById($id);
 	if($advertisement->CustomerId )
 	{
 		$customers = explode(",",$advertisement->CustomerId);
 		foreach ($customers as $each_number) {
      $customerList[] = currentUser()->findById((int) $each_number);
     
  }	 
  $this->view->customerList=$customerList;
  $this->view->advertisement=$advertisement;
  $date = date("d:m:Y");
  $time = date("H:i:s");
  $this->view->date=$date;
  $this->view->time=$time;
  // dnd($this->view->time);
  $this->view->render('advertisements/showAccept');
  // dnd($providerslist);
}
else
{
	$this->view->advertisement = $advertisement;
	$this->view->render('advertisements/noAcceptance');
}
 	}


 	public function showAcceptdAction($id,$type)
 	{
 		$advertisement = $this->modelLoad($type)->findById($id);
 	if($advertisement->confirmCustomerId )
 	{
 		$customers = explode(",",$advertisement->confirmCustomerId);
 		foreach ($customers as $each_number) {
      $customerList[] = currentUser()->findById((int) $each_number);
     
  }	 
  $this->view->customerList=$customerList;
  $this->view->advertisement=$advertisement;
  $date = date("d:m:Y");
  $time = date("H:i:s");
  $this->view->date=$date;
  $this->view->time=$time;
  // dnd($this->view->time);
  $this->view->render('advertisements/showAccept');
  // dnd($providerslist);
}
else
{
	$this->view->advertisement = $advertisement;
	$this->view->render('advertisements/noAcceptance');
}
 	}


 	public function confirmAction($id,$customerId,$type)
 	{
 		// $this->RequestsModel->setAccepted($id,$request,$provider);
 		// dnd("1");
 		$customer = currentUser()->findById($customerId);
 		$advertisement = $this->modelLoad($type)->findById($id);
 		$owner = currentUser()->findById($advertisement->user_id);
 		// dnd($owner);
 		$this->modelLoad($type)->setAccepted($id,$advertisement,$customer);
 		$advertisement->confirmCustomerId = $customer->id;
 		$this->modelLoad($type)->attachConfirms($customer);
 		$this->modelLoad($type)->attachConfirms(currentUser());
 		$this->view->advertisement=$advertisement;
 		$this->view->customer=$customer;
 		$this->view->owner=$owner;


 		$this->modelLoad($type)->notifyConfirms($advertisement,currentUser(),$customer);

 		//***********************************************************************************************


 		// $customer = $this->RequestsModel->findcustomer($user_id);

 		// $this->view->customer=$customer;
 		// $this->RequestsModel->sendAcceptance($requests,currentUser(),$owner);
//  	if($advertisement->providerId)
//  	{
//  		$providers = explode(",",$advertisement->providerId);
//  		$providerslist[]=[];
//  		foreach ($providers as $each_number) 
//  		{
//  			// $x = 0;
//  			// dnd($requests->confirmProviderId);
//  			if($advertisement->confirmCustomerId != (int)$each_number)
//  			{
//  				// dnd('p');
// // $x+=1;
//       			$provider_= currentUser()->findById((int) $each_number);
 			
//       		// dnd($provider_);
//       		currentUser()->sendOthers($provider_ , currentUser(),$advertisement);
//       		$providerslist[] = $provider_;
//      }
//      // dnd($x);
     
//      // dnd($each_number);
//   }	
//   // dnd($providerslist);
// }
 		$this->view->render('advertisements/confirm');

 	

 }

public function cancelAction($id,$user_id,$type)//done
 	{
 		$advertisement = $this->modelLoad($type)->findById($id);
 		$owner = currentUser()->findById($user_id);
 		$customerList = explode(",",$advertisement->CustomerId);
 		$conCuslist = explode(",",$advertisement->confirmCustomerId);
 		// $customernameList = explode(",",$advertisement->customerName);
 		// dnd($providerList);
 		// dnd((string)(currentUser()->id));
 		// array_search($key_to_index,array_keys($array))
 		// $userIdIndex = array_search((string)(currentUser()->id),array_keys($providerList));
 		$newcustomers = $this->modelLoad($type)->deleteProviderId($customerList);
 		$list = $this->modelLoad($type)->deleteconfirmCusId($conCuslist);
 		// $newcustomernames = $this->modelLoad($type)->deleteProviderName($customernameList);
 		// dnd($newproviders);
 		// dnd('0');
 		$this->modelLoad($type)->unsetAccepted($id,$newcustomers,$owner);
 		// dnd('00');
 		$this->modelLoad($type)->unsetConfirm($id,$advertisement,$owner,$list);
 		// dnd('000');
 		$this->modelLoad($type)->updateCancellation($id,$newcustomers,$list);
 		// dnd('0000');
 		// dnd('1');
 		$this->modelLoad($type)->attachCancellation($owner);
 		$this->modelLoad($type)->attachCancellation(currentUser());
 		$this->view->advertisement=$advertisement;
 		$this->view->owner=$owner;


 		$this->modelLoad($type)->notifyCancellation($advertisement,currentUser(),$owner);
 		//**************************************************////***

 		// $customer = $this->RequestsModel->findcustomer($user_id);

 		// $this->view->customer=$customer;
 		// $this->RequestsModel->sendAcceptance($requests,currentUser(),$owner);
 		$this->view->render('advertisements/cancel');
 	}

 	public function cancelConfirmAction($id,$customerId,$type)
 	{
 		// $this->RequestsModel->setAccepted($id,$request,$provider);
 		$customer = currentUser()->findById($customerId);
 		$advertisement = $this->modelLoad($type)->findById($id);
 		$confirms = explode(",",$advertisement->confirmCustomerId);
 		$owner = currentUser()->findById($advertisement->user_id);
 		$advertisement->confirmProviderId = $this->modelLoad($type)->unAdsetAccepted($id,$advertisement,$customer,$confirms);
 	// dnd($advertisement->confirmProviderId);
 		$this->modelLoad($type)->attachCancelConfirms($customer);
 		$this->modelLoad($type)->attachCancelConfirms(currentUser());
 		$this->view->advertisement=$advertisement;
 		$this->view->customer=$customer;
 		$this->view->owner=$owner;



 		$this->modelLoad($type)->notifyCancelConfirms($advertisement,currentUser(),$customer);




 		// $customer = $this->RequestsModel->findcustomer($user_id);

 		// $this->view->customer=$customer;
 		// $this->RequestsModel->sendAcceptance($requests,currentUser(),$owner);
     // dnd($x);
     
     // dnd($each_number);
  	
  // dnd($providerslist);
 		$this->view->render('advertisements/cancelConfirm');

 	}

 	public function ShowConfirmRequestsAction()
 	{
 		if(currentUser() && currentUser()->userType == 'Customer')
 			{
 				$advertisements1 = $this->modelLoad('Cleaning')->findByUserconfirmId(currentUser()->id);
 				$advertisements2 = $this->modelLoad('Catering')->findByUserconfirmId(currentUser()->id);
 				$advertisements3 = $this->modelLoad('Laundering')->findByUserconfirmId(currentUser()->id);
 				// array_push(array, var)
 				// dnd($advertisement3);
 			}
 		elseif(currentUser() && currentUser()->userType == 'Provider')
 			{
 				$advertisements1 = $this->modelLoad('Cleaning')->findByUserId(currentUser()->id);
// dnd($advertisements1);
 				$advertisements1 = $this->modelLoad('Cleaning')->filterByConfirm($advertisements1,currentUser()->id);

 				$advertisements2 = $this->modelLoad('Catering')->findByUserId(currentUser()->id);
 				$advertisements2 = $this->modelLoad('Catering')->filterByConfirm($advertisements2,currentUser()->id);
 				$advertisements3 = $this->modelLoad('Laundering')->findByUserId(currentUser()->id);
 				$advertisements3 = $this->modelLoad('Laundering')->filterByConfirm($advertisements3,currentUser()->id);

 				// $this->view->provider=$requests;
 			}
 		$advertisements = array_merge($advertisements1,$advertisements2,$advertisements3);
		 // dnd($advertisements);
 		if(!$advertisements)
 		{
 			$this->view->render('advertisements/noAdvertisements');
 		}

		else{
			$this->view->advertisements=$advertisements;
			$this->view->render('advertisements/showConfirmsinHome');
		}

 	}

 	public function askQuestionAction($id,$user_id,$type)
{	
	// $validation = new Validate();
    $advertisement = $this->modelLoad($type)->findByIdAndUserId((int)$id,$user_id);
    $provider = currentUser()->findById($advertisement->user_id);
    // if(!$request) Router::redirect('requests');
    if($_POST)
    {
    	if(currentUser()->userType == "Customer")
    	{
    		$_POST['to'] = $provider->username;
    	}
		$message = "from :- ".currentUser()->username." to :- ".$_POST['to']." MESSAGE??: ".$_POST['chat'];
		$chat = $this->modelLoad($type)->getmessage($id,$advertisement,$message); 
		$advertisement->chatCus = $chat;
		$advertisement->chatPro = $chat;
		// $this->modelLoad($type)->updateMessages($id,$messages);
		$this->view->provider = $provider;
		$this->view->render('advertisements/succefulAskedQuestion');
	}
	else
	{

	    // $this->view->displayErrors=$validation->displayErrors();
	    $this->view->advertisement = $advertisement;
	    // $this->view->chatter = username;
	    $this->view->postAction = PROOT . 'advertisements' . DS . 'askQuestion' . DS . $advertisement->id . DS . $advertisement->user_id . DS . $advertisement->type;
	    $this->view->render('advertisements/askQuestionByProvider');
	}
}	

 	public function showChatAction($requestId,$type)
 {
 	$advertisement = $this->modelLoad($type)->findById((int)$requestId);
 	if(currentUser()->userType == "Customer")
 	{
 		$chat = $advertisement->chatCus;
 	}
 	else
 	{
 		$chat = $advertisement->chatPro;
 	}
 	// $chat = $advertisement->chat;
 	if(!$chat)
		{
			$this->view->render('advertisements/emptyChat');
		}
		else
			{
				$chat=explode (",", $chat);
				$this->view->chat=$chat;
				$this->view->advertisement = $advertisement;
				$this->view->render('advertisements/showChat');
			}
 }

 public function clearChatAction($requestId,$type)
 	{
 		$advertisement = $this->modelLoad($type)->findById((int)$requestId);
 		// dnd($request);
		// $messages= $advertisement->chat;
	if(currentUser()->userType == "Customer")
 	{
 		$advertisement->chatCus = '';
 	}
 	else
 	{
 		$advertisement->chatPro = '';
 	}
		 // dnd('6');
		$this->modelLoad($type)->setChatEmpty($advertisement);

		$this->view->render('advertisements/AfterClearChat');
	}

	// public function markCompletedAction($requestId,$user_id)
	// {
	// 	$request = $this->RequestsModel->findById((int)$requestId);
	// 	// dnd($request);
	// 	$result = $this->RequestsModel->MarkComplete((int)$requestId,(int)($request->confirmProviderId));
	// 	if(currentUser() && currentUser()->userType == 'Provider')
	// 	{
	// 		// dnd('8');
	// 		$servicer = currentUser()->findByUserId($request->user_id);
	// 	}
	// 	elseif(currentUser() && currentUser()->userType == 'Customer')
	// 	{
	// 		// dnd('7');
	// 		$servicer = currentUser()->findByUserId((int)($request->confirmProviderId),['order'=>'username']);
	// 		// dnd((int)($request->confirmProviderId));
	// 		// dnd(currentUser()->findByUserId(($request->confirmProviderId)));
	// 	}
	// 	// dnd($servicer);
	// 	$a = currentUser()->sendCompleteness($request,$servicer,currentUser());
	// 	// dnd("I");
	// 	$this->view->servicer = $servicer[0];
	// 	$this->view->request = $request;
	// 	$this->view->render('requests/completionMessage');
		
	// }

	//  	public function FinishedRequestsAction()
 // 	{
 // 		if(currentUser() && currentUser()->userType == 'Provider')
 // 			{
 // 				$requests = $this->RequestsModel->findByUsercompleteId(currentUser()->id,['order'=>'service']);
 // 			}
 // 		elseif(currentUser() && currentUser()->userType == 'Customer')
 // 			{
 // 				$requests = $this->RequestsModel->findByUserIdandCompleteID(currentUser()->id,1,['order'=>'service']);
 // 				// $this->view->provider=$requests;
 // 			}
	// 	 // dnd($requests);
 // 		if(!$requests)
 // 		{
 // 			$this->view->render('requests/NoFinished');
 // 		}

	// 	else{
	// 		$this->view->requests=$requests;
	// 		$this->view->render('requests/ShowFinishedRequests');
	// 	}

 // 	}

 // 	public function UnmarkCompletedAction($requestId,$user_id)
	// {
	// 	$request = $this->RequestsModel->findById((int)$requestId);
	// 	// dnd($request);
	// 	$result = $this->RequestsModel->UnMarkComplete((int)$requestId);
	// 	if(currentUser() && currentUser()->userType == 'Provider')
	// 	{
	// 		// dnd('8');
	// 		$servicer = currentUser()->findByUserId($request->user_id);
	// 	}
	// 	elseif(currentUser() && currentUser()->userType == 'Customer')
	// 	{
	// 		// dnd('7');
	// 		$servicer = currentUser()->findByUserId((int)($request->confirmProviderId),['order'=>'username']);
	// 		// dnd((int)($request->confirmProviderId));
	// 		// dnd(currentUser()->findByUserId(($request->confirmProviderId)));
	// 	}
	// 	// dnd($servicer);
	// 	$request = currentUser()->sendUnCompleteness($request,$servicer,currentUser());
	// 	// dnd("I");
	// 	$this->view->servicer = $servicer[0];
	// 	$this->view->render('requests/uncompletionMessage');
		
	// }

	public function markrateAction($id,$rate,$name,$type,$s)
	{
		
		// dnd($rate);
		// dnd($id);
		$advertisement = $this->modelLoad($type)->findById($id);
		// dnd($s);
		$s = currentUser()->findById((int)$s);
		// dnd($s);
		$this->modelLoad($type)->updateRate($advertisement,$id,$rate,$s);
		$this->view->name = $name;
		$this->view->render('advertisements/afterSuccefulRated');
	}






}