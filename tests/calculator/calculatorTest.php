<?php

use Calculator\Addition;
use Calculator\Calculator;

class CalculatorTest extends PHPUnit\Framework\TestCase
{
	/** 
	 *	In this thest we instanciate an addition operation and we check if it has been received by the class calculator
	 * @test 
	*/
	public function can_set_single_operation()
	{
		$addition = new Addition();
		$addition->setOperands([10, 20]);

		$calculator = new Calculator();
		$calculator->setOperation($addition);

		assertCount(1, $calculator->getOperations());
	}

	/**
	* in this test we pass an array of parameters and we check if the Calculator class is able to accept them
	* @test
	*/
	public function can_set_multiple_operations()
	{
		$addition1 = new Addition();
		$addition1->setOperands([10, 20]);

		$addition2 = new Addition();
		$addition2->setOperands([5, 30]);		

		$calculator = new Calculator();
		$calculator->setOperations([$addition1, $addition2]);

		assertCount(2, $calculator->getOperations());

	}
	/**
	* in this test we check how check that the Calculator accepts only instance of the OperationInterface and do not consider other types of variables
	* @test
	*/
	public function operation_are_ignored_if_not_instance_of_operation()
	{
		$addition = new Addition();
		$addition->setOperands([10, 20]);

		$addition2 = new Addition();
		$addition2->setOperands([5, 30]);	

		$calculator = new Calculator();
		$calculator->setOperations([$addition, $addition2, "string"]);

		assertCount(2, $calculator->getOperations());		
	}

	/**
	* in this test we check that the camlculator actually calculate the the operation that we are passing
	* @test
	*/
	public function can_calculate_result()
	{
		$addition = new Addition();
		$addition->setOperands([5, 30]);	

		$calculator = new Calculator();
		$calculator->setOperation($addition);

		assertEquals(35, $calculator->calculate());			
	}

	/**
	* in this test we check that the calculator class calculate the result of the operation and return an array with the value of the correspondent results
	* @test
	*/
	public function can_calculate_multiple_results()
	{
		$addition1 = new Addition();
		$addition1->setOperands([5, 30]);	//35

		$addition2 = new Addition();
		$addition2->setOperands([10, 10]);	//20

		$calculator = new Calculator();
		$calculator->setOperations([$addition1, $addition2]);

		assertInternalType('array',$calculator->calculate());
		assertEquals(35, $calculator->calculate()[0]);
		assertEquals(20, $calculator->calculate()[1]);
	}
}