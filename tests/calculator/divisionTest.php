<?php
use Calculator\Division;



class divisionTest extends PHPUnit\Framework\TestCase
{
	public function SetUp()
	{
		$this->division = new Division();
	}

	/** @test */
	public function devide_given_operands()
	{
		$this->division->setOperands([10, 2]);

		assertEquals(5, $this->division->calculate());
	}

	/** 
	*	the following test check if we have created the submitted exception and after if we can throw effectively that in case the count of the element in the array $operands is equal to zero
	*	@test 
	*/
	public function no_operands_given_throw_exception_when_calculation()
	{
		$this->expectException(Calculator\Exception\NoOperandsException::class);

		$this->division->calculate();
	}

	/** @test */
	public function check_is_zero_is_present_in_division()
	{
		$this->division->setOperands([10, 0, 0, 2]);

		assertEquals(5, $this->division->calculate());
	}

}