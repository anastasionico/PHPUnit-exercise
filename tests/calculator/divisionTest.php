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

}