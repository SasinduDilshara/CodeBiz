<?php

class MessagesController extends Controller
{
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Users');
		//dnd($this->load_model('Contacts'));
	}



	public function indexAction()
	{

	}

	public function showAction()
	{
		$messages= currentUser()->notifications;
		// dnd($messges);
		$messages=explode (",", $messages);
		$this->view->messages=$messages;
		$this->view->render('messages/show');
	}


 }


 ?>