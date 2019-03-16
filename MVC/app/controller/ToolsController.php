<?php

class ToolsController extends Controller
{
	public function __construct($Controller,$action)
	{
		parent::__construct($Controller,$action);
		$this->view->setLayout('defaultlay');
	}

	public function indexAction()
	{
		$this->view->render('tools/index');
	}
	public function firstAction()
	{
		$this->view->render('tools/first');
	}
	public function secondAction()
	{
		$this->view->render('tools/second');
	}
	public function thirdAction()
	{
		$this->view->render('tools/third');
	}
}

?>