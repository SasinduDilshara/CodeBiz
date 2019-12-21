<?php

class ContactsController extends Controller
{
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Contacts');
		//dnd($this->load_model('Contacts'));
	}



	public function indexAction()
	{
		$contacts = $this->ContactsModel->findByUserId(currentUser()->id,['order'=>'lname, fname']);
		// dnd($contacts);
		$this->view->contacts=$contacts;
		// dnd($contacts);
		$this->view->render('contacts/index');
	}

	public function addAction()
	{	
		$contact = new Contacts();
		$validation = new Validate();
		if($_POST)
		{
			$contact->assign($_POST);	//form validation
			// dnd($contact->assign($_POST));
		$validation->check($_POST,Contacts::$addValidation);

			
			// dnd($_POST);
			
			if($validation->passed())
			{ 
			$contact->user_id =currentUser()->id;
			// dnd(currentUser()->id);
				// dnd("klk");
				// dnd($contact->assign($_POST));
			$contact->deleted=0;
			// dnd($contact->deleted);
				// $contact->assign($_POST);
				// dnd()
			// dnd($contact->save());
				$contact->save();

				Router::redirect('contacts');
			}
			
			
		}
		// else
		// {

		// 	dnd("jkj");
		// }
		$this->view->displayErrors=$validation->displayErrors();
		$this->view->contact = $contact;
		$this->view->postAction=PROOT.'contacts'.DS.'add';
		// dnd($this->view->postAction);
		$this->view->render('contacts/add');
	}


  public function detailsAction($id)
  {
  	// dnd($id);
    $contact = $this->ContactsModel->findByIdAndUserId((int)$id,currentUser()->id);//cast is a security to check its a number
    // dnd($contact);
    if(!$contact){
      Router::redirect('contacts');//no contact
    }
    $this->view->contact = $contact;
    $this->view->render('contacts/details');
  }


  public function editAction($id)
  {
  	// dnd($id);
  	$validation = new Validate();
    $contact = $this->ContactsModel->findByIdAndUserId((int)$id,currentUser()->id);

    if(!$contact) Router::redirect('contacts');

    if($_POST)
    {
			$contact->assign($_POST);	//form validation
			// dnd($contact->assign($_POST));
		$validation->check($_POST,Contacts::$addValidation);

			
			// dnd($_POST);
			
			if($validation->passed())
			{ 
			// dnd($contact->deleted);
				// $contact->assign($_POST);
				// dnd()
			// dnd($contact->save());
				$contact->save();

				Router::redirect('contacts');
			}
		}

    $this->view->displayErrors=$validation->displayErrors();
    $this->view->contact = $contact;
    $this->view->postAction = PROOT . 'contacts' . DS . 'edit' . DS . $contact->id;
    $this->view->render('contacts/edit');
  }

  public function deleteAction($id){
    $contact = $this->ContactsModel->findByIdAndUserId((int)$id,currentUser()->id);//cast is a security to check its a number
    // dnd($contact);
    if($contact){
      $contact->delete(); 
      // Session::addMsg('success','Contact has been deleted.');
    }
    Router::redirect('contacts');
  }

 }