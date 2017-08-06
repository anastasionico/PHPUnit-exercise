<?php
use Calculator\Addition;



class additionTest extends PHPUnit\Framework\TestCase
{
	public function SetUp()
	{
		$this->addition = new Addition();
	}

	/** @test */
	public function add_up_given_operands()
	{
		$this->addition->setOperands([3, 10]);

		assertEquals(13, $this->addition->calculate());
	}

	/** 
	*	the following test check if we have created the submitted exception and after if we can throw effectively that in case the count of the element in the array $operands is equal to zero
	*	@test 
	*/
	public function no_operands_given_throw_exception_when_calculation()
	{
		$this->expectException(Calculator\Exception\NoOperandsException::class);

		$this->addition->calculate();
	}
}