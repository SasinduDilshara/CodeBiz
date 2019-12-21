<?php

class TestController extends Controller 
{
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		// $this->view->setLayout('defaultlay');
		$this->load_model('Tests');
		// $this->load_model('Advertisements');
        //dnd($this->load_model('advertisements'));
    }

    public function indexAction()
	{
		$this->view->render('test/index');
	}
	public function getTestsAction($name)
	{
		dnd("hi");
		$data = $this->TestsModel->read($name);
		dnd($data);
		// $this->view->render('test/index');
	}


}
?>