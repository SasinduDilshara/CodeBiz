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
		$validation->check($_POST,[
			'fname' => [
				'display' => "First name",
				'required' => true
			],
			'lname' => [
				'display' => "last name",
				'required' => true,
				'min'=>6
			]
		]);

			
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
		$this->view->render('contacts/add');
	}

	// public function addAction(){
 //    $contact = new Contacts();
 //    if($this->request->isPost()){
 //      $this->request->csrfCheck();
 //      $contact->assign($this->request->get());
 //      $contact->user_id = Users::currentUser()->id;
 //      if($contact->save()){
 //        Router::redirect('contacts');
 //      }
 //    }
 //    $this->view->contact = $contact;
 //    $this->view->displayErrors = $contact->getErrorMessages();
 //    $this->view->postAction = PROOT . 'contacts' . DS . 'add';
 //    $this->view->render('contacts/add');
 //  }

  public function editAction($id){
    $contact = $this->ContactsModel->findByIdAndUserId((int)$id, Users::currentUser()->id);
    if(!$contact) Router::redirect('contacts');
    if($this->request->isPost()){
      $this->request->csrfCheck();
      $contact->assign($this->request->get());
      if($contact->save()){
        Router::redirect('contacts');
      }
    }
    $this->view->displayErrors = $contact->getErrorMessages();
    $this->view->contact = $contact;
    $this->view->postAction = PROOT . 'contacts' . DS . 'edit' . DS . $contact->id;
    $this->view->render('contacts/edit');
  }

  public function detailsAction($id){
    $contact = $this->ContactsModel->findByIdAndUserId((int)$id,Users::currentUser()->id);
    if(!$contact){
      Router::redirect('contacts');
    }
    $this->view->contact = $contact;
    $this->view->render('contacts/details');
  }

  public function deleteAction($id){
    $contact = $this->ContactsModel->findByIdAndUserId((int)$id,Users::currentUser()->id);
    if($contact){
      $contact->delete();
      Session::addMsg('success','Contact has been deleted.');
    }
    Router::redirect('contacts');
  }

}