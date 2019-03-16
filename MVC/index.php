<?php
	//Define functon define variables ex:- ROOT , DS
	
	define('DS',DIRECTORY_SEPARATOR);
	//echo DS;
	/*Lynux, mac , windows okkotama acess denawa. Windows nam */
	define("ROOT",dirname(__FILE__));
	//echo $_SERVER["PATH_INFO"];die(); //prints the link after OOSD/
	//echo ROOT //Prints the location of the project

	//loadcconfiguration and helper function
require_once(ROOT.DS.'config'.DS.'config.php');
require_once(ROOT.DS.'app'.DS.'lib'.DS.'helpers'.DS .'functions.php');
//Autoload classes

function autoload($className)
{
	if(file_exists(ROOT.DS.'core'.DS.$className.'.php'))
	{
	 	require_once(ROOT.DS.'core'.DS.$className.'.php');
	}
	elseif (file_exists(ROOT.DS.'app'.DS.'controller'.DS.$className.'.php')) 
	{
	 	require_once(ROOT.DS.'app'.DS.'controller'.DS.$className.'.php');
	} 
	elseif (file_exists(ROOT.DS.'app'.DS.'model'.DS.$className.'.php')) 
	{
	 	require_once(ROOT.DS.'app'.DS.'model'.DS.$className.'.php');
	} 
}

spl_autoload_register('autoload'); //function can pass as a string
session_start();


	$url = isset($_SERVER["PATH_INFO"]) ? explode('/',ltrim($_SERVER['PATH_INFO'],'/')) : [];


	//dnd($db)

	//isset is return true if it is set
	//echo $url array with link parts by parts
	//var_dump($url); // Ekin eka link eka denawa oosd ekata passe

if(!Session ::exists(CURRENT_USER_SESSION_NAME) && COOKIE::exists(REMEMBER_ME_COOKIE_NAME))
{
	Users::loginUserFromCookie();
}
	
//Route the request
Router::route($url); //get the route function in Route class

//phpinfo();

 ?> 