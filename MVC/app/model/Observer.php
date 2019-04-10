<?php

interface Observer
{

	public function updateObserver($request,$provider,$owner);
	public function updateConfirmObserver($requests,$customer,$provider);
	public function updateCustomer($request,$customer,$provider);
	public function updateProvider($request,$provider,$customer);
	public function updateCancelObserver($request,$customer,$provider);
	public function updateCancelProvider($request,$provider,$customer);

} 

?>