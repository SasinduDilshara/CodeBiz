<?php

class View
{
	protected $_head , $_body , $_siteTitle=SITE_TITLE , $_outputBuffer, $_layout= DEFAULT_LAYOUT;

	public function __construct()
	{

	}

	public function render($viewName)
	{	
		$viewAry = explode('/',$viewName);
		$viewString = implode(DS,$viewAry);
		if(file_exists(ROOT.DS.'app'.DS.'view'.DS.$viewString.'.php' ))
		{	
			// dnd(ROOT.DS.'app'.DS.'view'.DS.$viewString.'.php');
			include(ROOT.DS.'app'.DS.'view'.DS.$viewString.'.php' );
			
			include(ROOT.DS.'app'.DS.'view'.DS.'layouts'.DS.$this->_layout.'.php');// include layout
			
		}
		else
		{
			die('The view \"'.$viewName.'\"does not exists.');// kill the application.

		}
	}

	public function content($type)
	{	
		if($type == 'head')
		{
			return $this ->_head;
		}
		elseif($type == 'body')
		{
			return $this ->_body;
		}
		return false;
	}

	public function start($type)
	{	
		$this->_outputBuffer = $type;
		ob_start(); //start
	}
	public function end()
	{
		if($this->_outputBuffer == 'head')
		{
			$this->_head = ob_get_clean();
		}
		elseif($this->_outputBuffer == 'body')
		{
			$this->_body = ob_get_clean();
		}
		else
		{
			die("Run the start method first");
		}
	}
	public function siteTitle()
	{

			return $this->_siteTitle;
	}	
	public function setSiteTitle($title)
	{	
		$this->_siteTitle=$title;
	}	
	public function setLayout($path)
	{
		$this->_layout = $path;
	}

	public function insert($path)
	{
		include(ROOT.DS.'app'.DS.'view'.DS.$path.'.php' );
	}

	public function partial($group,$partial)
	{	
		if(file_exists(ROOT.DS.'app'.DS.'view'.DS.$group.DS.'partials'.DS.$partial.'.php'))
		{
		include(ROOT.DS.'app'.DS.'view'.DS.$group.DS.'partials'.DS.$partial.'.php');
		// dnd(ROOT.DS.'app'.DS.'view'.DS.$group.DS.'partials'.DS.$partial.'.php');
		return true;
	}
	else
	{
		return false;
	}
	}

}

?>