<?php

namespace Acme;

use Acme\Billing\BillingInterface;

class PurchasesController
{
	protected $billing;
	
	//we use a dependency injection on the BillingInterface class so in case we need to modify it in the future we just have to do it only here instead of several times
	public function __construct(BillingInterface $billing)
	{
		$this->billing = $billing;
	}	
	
	//this method call the charge method into the model BillingInterface
	public function buy()
	{
		$chargeInfo = [];		
		
		$result = $this->billing->charge($chargeInfo);
		var_dump($result);
	}
}


