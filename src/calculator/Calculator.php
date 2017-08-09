<?php 

namespace Calculator;

class Calculator
{
	public $operations = [];

	public function setOperation(OperationInterface $operation)
	{
		$this->operations[] = $operation;
	}

	public function setOperations(array $operations)
	{
		// with array_filter we pass the array of parameter an return the one that are instance of the OperationInterface
		$this->operations = array_filter($operations, function($operation){
			return $operation instanceOf OperationInterface;
			
		});
	}

	public function getOperations()
	{ 
		return $this->operations;
	}

	public function calculate()
	{
		if(count($this->operations) > 1){
			$result = [];
			
			return array_map( function($operation){
				return $operation->calculate();				
			}, $this->operations);
		}
		return $this->operations[0]->calculate();
	}

}