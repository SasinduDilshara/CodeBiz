<?php

interface Observable

{

	public function notify($requests,$provider,$owner);
	public function attach($observer);
	public function detach($observer);

} 
?>