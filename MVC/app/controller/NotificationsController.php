<?php

class NotificationsController extends Controller
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
		// dnd("kl");
		$messages= currentUser()->notifications;
		// dnd($messges);
		if(!$messages)
		{
			$this->view->render('notifications/empty');
		}
		else
			{
				$messages=explode (",", $messages);
				$this->view->messages=$messages;
				$this->view->render('notifications/show');
			}
	}

		public function clearAction()
	{
		$messages= currentUser()->notifications;
		currentUser()->notifications='';
		$this->UsersModel->setMessagesEmpty(currentUser());
		$this->view->render('notifications/afterclear');
	}


 }


 ?>