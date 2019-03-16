<?php
//Parent class for all controllers. there has a controller class under this 
 
class Application
{
	public function __construct()
	{
		//constructor
		$this->_set_reorting();
		$this->_unregister_globals();
	}
	private function _set_reorting()
	{
		if(DEBUG)
		{
			error_reporting(E_ALL);
		ini_set('display_errors',1);
		}
		else
		{
		error_reporting(0);
		ini_set('display_errors',0);
		ini_set('log_errors',1);
		ini_set('error_log',ROOT.DS.'tmp'.DS.'logs'.DS.'errors.log');
		}
	}
	private function _unregister_globals()
	{	//security(register wela nathi globals walin wage)
	 if(ini_get('register_globals'))
	 {
	 	$globalsAry = ['_SESSION','_COOKIE','_POST','_GET','_REQUEST','_SERVER','_ENV','_FILES'];
	 	foreach($globalsAry as $g)
	 	{
	 		foreach($GLOBALS[$g] as $k => $v)//key , value
	 		{
	 			if($GLOBALS[$k]===$v )
	 			{
	 		 	 unset($GLOBALS[$k]) ;
	 			}
	 		} 
	 	}
	 }

	}
}

?>