<?php

class RestrictedController extends Controller
{

	public function __construct($controller, $action)
	{
		parent::__construct($controller , $action);
		// $this->view->setLayout('defaultlay');
		// $this->load_model('Users');
	}

	public function indexAction()
	{
		$this->view->render('restricted/index');
	}

}

?>