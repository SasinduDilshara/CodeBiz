<?php

class Controller extends Application
{
	protected $_controller,$_action;//can acess extended classes 
	public $view;//view

	public function __construct($controller, $action)
	{
		parent::__construct();
		$this->_controller = $controller;
		$this->_action = $action;
		$this->view = new View();
	}

	protected function load_model($model)
	{
		if(class_exists($model))
		{
			$this->{$model.'Model'} = new $model(strtolower($model));
		}
	}

}

?>