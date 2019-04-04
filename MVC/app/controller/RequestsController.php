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
// 
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

 }