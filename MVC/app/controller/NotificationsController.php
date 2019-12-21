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
		// dnd($messages);
		if(!$messages)
		{
			//$this->view->render('notifications/empty');
		}
		else
			{
				$messages=explode (",", $messages);
				$this->view->messages=$messages;
				// dnd($messages);
				$this->view->render('notifications/show');
			}
	}

		public function clearAction()
	{
		$messages= currentUser()->notifications;
		currentUser()->notifications='';
		$this->UsersModel->setMessagesEmpty(currentUser());
		//$this->view->render('notifications/afterclear');
	}

	public function CompletionsendAction($users,$messages,$requestUserId)
	{
		$this->UsersModel->setNotificationsMessages($users,$messages);
		if(currentUser() && currentUser()->userType == 'Provider')
		{
			$servicer = $this->UsersModel->findByUserId($requestUserId);
		}
		elseif(currentUser() && currentUser()->userType == 'Customer')
		{
			$servicer = $this->UsersModel->findByUserId($requestUserId);
		}
		$this->view->servicer = $servicer;
		$this->view->render = ('requests/completionMessage');
	}


 }


 ?>