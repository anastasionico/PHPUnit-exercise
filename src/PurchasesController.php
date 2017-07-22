<?php

namespace Acme;

use Acme\Billing\StripeBilling;

class PurchasesController
{
	protected $stripe;
	
	//we use a dependency injection on the StripeBilling class so in case we need to modify it in the future we just have to do it only here instead of several times
	public function __construct(StripeBilling $stripe)
	{
		$this->stripe = $stripe;
	}	
	
	//this method call the charge method into the model StripeBilling
	public function buy()
	{
		$chargeInfo = [];		
		
		$result = $this->stripe->charge($chargeInfo);
		var_dump($result);
	}
}


