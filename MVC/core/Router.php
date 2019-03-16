<?php
class Router 
{
	public static function route($url)
	{
//controller
		$controller =(isset($url[0]) && $url[0] !='') ? ucwords($url[0])."Controller": DEFAULT_CONTROLLER."Controller";
		$controller_name=str_replace("Controller","",$controller);
		array_shift($url); 
		//mula element 1 ain karala //return karanawa pop(0)
		//dnd($controller);
		//echo $controller . '<br>';
		//dnd($url);

//action
		$action =(isset($url[0]) && $url[0] !='') ? $url[0].'Action': 'indexAction';
		$action_name=(isset($url[0]) && $url[0] !='') ? $url[0]: 'index';
		array_shift($url);  //controller 1 pop krpu nisa dan 0 element 1 action

		// ACL ACTION

		$grantAccess = self::hasAccess($controller_name,$action_name);
		if(!$grantAccess)
		{	
			$controller = ACCESS_RESTRICTED."Controller";
			$controller_name =ACESS_RESTRICTED;
			$action = 'indexAction';
		}
		//echo $action . '<br>';
		//dnd($url);
//params
		$queryParams = $url;
		//$dispatch = new User();
		$dispatch = new $controller($controller_name,$action); //dispatcher controller namin cls ekak hadagena eekata parameter denawa. 
		//dnd($dispatch);
		if(method_exists($controller, $action))
		{
			call_user_func_array([$dispatch,$action],$queryParams ); // array of parameters pass to it 
			//array 1 mul 2 class ekai method ekai wage. anthima eka parameter eka wage.
		}
		else
		{
			//die("The method does not exist in the controller'\' ".$controller_name.'\"');
			die("The method does not exist in the controller \' ".$controller_name."\'");
		}
	}

	    public static function redirect($location)
    {
        if (!headers_sent()) {
            header('location: ' . PROOT . $location);
            exit();
        } else {
            echo '<script type = "text/javascript">';
            echo 'window.location.href="' . PROOT . $location . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $location . '" />';
            echo '</noscrip>';
            exit;
        }
    }

    public static function hasAccess($controller_name,$action_name='index')
    {
    	$acl_file = file_get_contents(ROOT.DS.'app'.DS.'acl.json');//index.php eke thiyenne root kyla
    	$acl = json_decode($acl_file, true); // true eken array ekek hadanawa
    	// dnd($acl);
    	$current_user_acls = ["Guest"];
    	$grantAccess = false;
    	if(Session ::exists(CURRENT_USER_SESSION_NAME))
    	{
    		$current_user_acls[]="LoggedIn";
    		foreach(currentUser()-> acls() as $a)
    		{
    			$current_user_acls[]=$a;
    		}
    	}
    	 // return true;
    	foreach($current_user_acls as $level)
    	{
    		if(array_key_exists($level,$acl) && array_key_exists($controller_name,$acl[$level]))
    		{
    			if(in_array($action_name,$acl[$level][$controller_name])|| in_array("*",$acl[$level][$controller_name])) //checjk inside acl if controll and action exists
    			{
    				$grantAccess = true;
    				break;
    			}
    		}
    	}
    	//check for denied

    	foreach($current_user_acls as $level)
    	{
    		$denied = $acl[$level]['denied'];
    		// dnd($level);
    			if(!empty($denied) && array_key_exists($controller_name,$denied) && in_array($action_name,$denied[$controller_name])) //checjk inside acl if controll and action exists
    			{
    				$grantAccess = false;
    				break;
    			}
    		}
    		// dnd($grantAccess);
    		return $grantAccess;
    	// dnd($current_user_acls);
    }

    public static function getMenu($menu)
    {
    	$menuAry =[];
    	$menuFile = file_get_contents(ROOT.DS.'app'.DS.$menu.'.json');
    	$acl = json_decode($menuFile,true); //create a array
    	foreach($acl as $key => $val)
    	{	
    		if(is_array($val))
    		{	//dnd($val);
    			$sub =[];
    			foreach($val as $k => $v)
    			{
// dnd($k);
// dnd($val);

    				if($k == 'separator' && !empty($sub))
    				{
    					$sub[$k] = "";
    					continue;
    				}
    				// else if($finalVal = self::get_link($v))
    				else
    				{
    					$finalVal = self::get_link($v);
    					// var_dump($sub);
    					$sub[$k] = $finalVal;
    				}
    			}
    			// dnd($sub);

    			if(!empty($sub))
    			{
    				$menuAry[$key] = $sub;
    			}
    		}
    			else
    			{
    				if($finalVal = self::get_link($val))
    				{
    					$menuAry[$key] = $finalVal;
    				}
    			}
    			// dnd($sub);
    		}
    	// dnd($sub);
    		return $menuAry;//menu_acl check karana eka

    }

    private static function get_link($val) //link eka denawa
    {
    	//if it's a external link
    	if(preg_match('/https?:\/\//',$val)==1)
    	{
    		return $val;
    	}
    	else
    	{
    		$uAry = explode('/',$val);
    		// $uAry = explode(DS,$val);
    		$controller_name = ucwords($uAry[0]);
    		$action_name = (isset($uAry[1])) ? $uAry[1] : '';
    		// var_dump($action_name);
    		if(self::hasAccess($controller_name,$action_name))
    		{
    			return PROOT.$val;
    		}
    		return false;
    	}

    }

}
 

?>