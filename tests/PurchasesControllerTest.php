<?php

use Acme\PurchasesController;
use Acme\Billing\BillingInterface;

class PurchasesControllerTest extends PHPUnit\Framework\TestCase
{
	
	public function test_bills_a_user()
	{
		//mocking the class required
		$m = Mockery::mock('Acme\Billing\BillingInterface');
		$m->shouldReceive('charge')->once()->andReturn('BillingInterface has been mocked');

		//inject the class required as a parameter into the class we are testing
		$controller = new PurchasesController($m); 

		//call the method we are testing and dump the result
		$result = $controller->buy();
		var_dump($result);

		assertTrue(true);
	}
}