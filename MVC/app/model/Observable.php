<?php

interface Observable

{
	public function notifyAccepts($requests,$provider,$owner);
	public function attachAccepts($observer);
	public function detachAccepts($observer);
	public function notifyConfirms($requests,$provider,$owner);
	public function attachConfirms($observer);
	public function detachConfirms($observer);


} 
?>