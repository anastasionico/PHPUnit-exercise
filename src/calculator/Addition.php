<?php
namespace Calculator;

use Calculator\Exception\NoOperandsException;

class Addition implements OperationInterface{
	public $operands;
	public function setOperands(array $operands)
	{
		$this->operands = $operands;
	}

	public function calculate()
	{
		if(count($this->operands) === 0){
			throw new NoOperandsException();
		}
		return array_sum($this->operands);
	}
}