<?php

class Cookie
{
	public static function set($name , $value, $expiry)//live time
	{
		if(setCookie($name , $value, time()+$expiry,'/'))
		{
			return true;
		}
		return false;
	}

	public static function delete($name)
	{
		self::set($name, '',time() -1);//dan welawata wada adu klma past tense wage delete wela yanawa
	}

	public static function get($name)
	{
		return $_COOKIE[$name];
	}

	public static function exists($name)
	{
		return isset($_COOKIE[$name]);
	}

}

?>