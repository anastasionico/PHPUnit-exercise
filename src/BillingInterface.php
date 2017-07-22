<?php
namespace Acme\Billing;

interface BillingInterface{
	public function charge($chargeInfo);
}