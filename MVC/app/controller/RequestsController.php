<?php

class RequestsController extends Controller
{
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Requests');
		//dnd($this->load_model('Contacts'));
	}



	public function indexAction()
	{
		$requests = $this->RequestsModel->findByUserId(currentUser()->id,['order'=>'service']);
		 // dnd($requests);

		$this->view->requests=$requests;
		// dnd($this->view->requests);
		foreach($requests as $r)
		{
			// dnd($r->service);
		}
		$this->view->render('requests/index');
	}

	public function addAction()
	{	
		$request = new Requests();
		$validation = new Validate();
		if($_POST)
		{
			$_POST['customer'] = currentUser()->username;
			$_POST['accepted'] = 0;
			// $_POST['confirmProviderId'] = 0;
			$_POST['completed'] = 0;
			$request->assign($_POST);	//form validation
			// dnd($contact->assign($_POST));
		$validation->check($_POST,Requests::$addValidation);

			
			// dnd($_POST);
			
			if($validation->passed())
			{ 
			$request->user_id =currentUser()->id;
			// dnd(currentUser()->id);
				// dnd("klk");
				// dnd($contact->assign($_POST));
			// $request->deleted=0;
			// $request->provider=currentUser()->username;
			// dnd($contact->deleted);
				// $contact->assign($_POST);
				// dnd()
			// dnd($contact->save());
				$request->save();

				Router::redirect('requests');
			}
			
			
		}
		// else
		// {

		// 	dnd("jkj");
		// }
		$this->view->displayErrors=$validation->displayErrors();
		$this->view->request = $request;
		$this->view->postAction=PROOT.'requests'.DS.'add';
		// dnd($this->view->postAction);
		$this->view->render('requests/add');
	}


  public function detailsAction($id)
  {
  	// dnd($id);
    $requests = $this->RequestsModel->findById((int)$id);//cast is a security to check its a number
    // dnd($requests);
    if(!$requests){
      Router::redirect('requests');//no contact
    }
    $this->view->request = $requests;
    $this->view->render('requests/details');
  }


  public function editAction($id)
  {
  	// dnd($id);
  	$validation = new Validate();
    $request = $this->RequestsModel->findByIdAndUserId((int)$id,currentUser()->id);

    if(!$request) Router::redirect('requests');

    if($_POST)
    {
			$request->assign($_POST);	//form validation
			// dnd($contact->assign($_POST));
		$validation->check($_POST,Requests::$addValidation);

			
			// dnd($_POST);
			
			if($validation->passed())
			{ 
			// dnd($contact->deleted);
				// $contact->assign($_POST);
				// dnd()
			// dnd($contact->save());
				$request->save();

				Router::redirect('requests');
			}
		}

    $this->view->displayErrors=$validation->displayErrors();
    $this->view->request = $request;
    $this->view->postAction = PROOT . 'requests' . DS . 'edit' . DS . $request->id;
    $this->view->render('requests/edit');
  }

  public function deleteAction($id){
    $request = $this->RequestsModel->findByIdAndUserId((int)$id,currentUser()->id);//cast is a security to check its a number
    // dnd($contact);
    if($request){
      $request->delete(); 
      // Session::addMsg('success','Contact has been deleted.');
    }
    Router::redirect('requests');
  }

  public function selectAction()
  {
  	$this->view->postAction=PROOT.'requests'.DS.'search';

   	$this->view->render('requests/select');
  }


  public function searchAction()
    {		// dnd($_GET);
		
		if($_GET)
		{
				$requests=$this->RequestsModel->findByLocation($_GET["area"]);

		}

		$this->view->requests = $requests;
		// $this->view->came=chooseDetails('');
		// dnd($this->view->postAction);
		$this->view->render('requests/search');
    // Router::redirect('advertisements');
 }

 	public function acceptAction($id,$user_id)
 	{
 		$requests = $this->RequestsModel->findById($id);
 		$owner = currentUser()->findById($user_id);
 		$this->RequestsModel->setAccepted($id,$requests,currentUser());
 		$this->RequestsModel->attachAccepts($owner);
 		$this->RequestsModel->attachAccepts(currentUser());
 		$this->view->requests=$requests;
 		$this->view->owner=$owner;
 		$this->RequestsModel->notifyAccepts($requests,currentUser(),$owner);
 		// $customer = $this->RequestsModel->findcustomer($user_id);

 		// $this->view->customer=$customer;
 		// $this->RequestsModel->sendAcceptance($requests,currentUser(),$owner);
 		$this->view->render('requests/accept');
 	}

 	public function showAcceptAction($id)
 	{
 		$request = $this->RequestsModel->findById($id);
 	if($request->providerId)
 	{
 		$providers = explode(",",$request->providerId);
 		foreach ($providers as $each_number) {
      $providerslist[] = currentUser()->findById((int) $each_number);
     
  }	 
  $this->view->providerslist=$providerslist;
  $this->view->request=$request;
  $date = date("d:m:Y");
  $time = date("H:i:s");
  $this->view->date=$date;
  $this->view->time=$time;
  // dnd($this->view->time);
  $this->view->render('requests/showAccept');
  // dnd($providerslist);
}
else
{
	$this->view->request = $request;
	$this->view->render('requests/noAcceptance');
}
 	}

 	public function confirmAction($id,$provider_id)
 	{
 		// $this->RequestsModel->setAccepted($id,$request,$provider);
 		$provider = currentUser()->findById($provider_id);
 		$requests = $this->RequestsModel->findById($id);
 		// $owner = currentUser()->findById($user_id);
 		$this->RequestsModel->setAccepted($id,$requests,$provider);
 		$requests->confirmProviderId = $provider->id;
 		$this->RequestsModel->attachConfirms($provider);
 		$this->RequestsModel->attachConfirms(currentUser());
 		$this->view->requests=$requests;
 		$this->view->provider=$provider;
 		$this->RequestsModel->notifyConfirms($requests,currentUser(),$provider);
 		// $customer = $this->RequestsModel->findcustomer($user_id);

 		// $this->view->customer=$customer;
 		// $this->RequestsModel->sendAcceptance($requests,currentUser(),$owner);
 	if($requests->providerId)
 	{
 		$providers = explode(",",$requests->providerId);
 		$providerslist[]=[];
 		foreach ($providers as $each_number) 
 		{
 			// $x = 0;
 			// dnd($requests->confirmProviderId);
 			if($requests->confirmProviderId != (int)$each_number)
 			{
 				// dnd('p');
// $x+=1;
      			$provider_= currentUser()->findById((int) $each_number);
 			
      		// dnd($provider_);
      		currentUser()->sendOthers($provider_ , currentUser(),$requests);
      		$providerslist[] = $provider_;
     }
     // dnd($x);
     
     // dnd($each_number);
  }	
  // dnd($providerslist);
 		$this->view->render('requests/confirm');

 	}

 }

public function cancelAction($id,$user_id)
 	{
 		$request = $this->RequestsModel->findById($id);
 		$owner = currentUser()->findById($user_id);
 		$providerList = explode(",",$request->providerId);
 		$providernameList = explode(",",$request->providerName);
 		// dnd($providerList);
 		// dnd((string)(currentUser()->id));
 		// array_search($key_to_index,array_keys($array))
 		// $userIdIndex = array_search((string)(currentUser()->id),array_keys($providerList));
 		$newproviders = $this->RequestsModel->deleteProviderId($providerList);
 		$newprovidernames = $this->RequestsModel->deleteProviderName($providernameList);
 		// dnd($newproviders);
 		$this->RequestsModel->unsetAccepted($id,$newproviders);
 		$this->RequestsModel->unsetConfirm($id,$request);
 		$this->RequestsModel->updateCancellation($id,$newproviders,$newprovidernames);
 		// dnd('1');
 		$this->RequestsModel->attachCancellation($owner);
 		$this->RequestsModel->attachCancellation(currentUser());
 		$this->view->request=$request;
 		$this->view->owner=$owner;
 		$this->RequestsModel->notifyCancellation($request,currentUser(),$owner);
 		// $customer = $this->RequestsModel->findcustomer($user_id);

 		// $this->view->customer=$customer;
 		// $this->RequestsModel->sendAcceptance($requests,currentUser(),$owner);
 		$this->view->render('requests/cancel');
 	}

}