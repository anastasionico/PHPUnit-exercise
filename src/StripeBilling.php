<?php
namespace Acme\Billing;
class StripeBilling 
{
	//this method pretends to charge a user by passing some info
	public function charge($chargeInfo)
	{
		return "charging with stripe";
	}
}