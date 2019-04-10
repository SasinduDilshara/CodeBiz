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
		if(!$messages)
		{
			$this->view->render('messages/empty');
		}
		else
			{
				$messages=explode (",", $messages);
				$this->view->messages=$messages;
				$this->view->render('messages/show');
			}
	}

		public function clearAction()
	{
		$messages= currentUser()->notifications;
		currentUser()->notifications='';
		$this->UsersModel->setMessagesEmpty(currentUser());
		$this->view->render('messages/afterclear');
	}


 }


 ?>