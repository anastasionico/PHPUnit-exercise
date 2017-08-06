<?php
namespace Calculator;

use Calculator\Exception\NoOperandsException;

class Division implements OperationInterface{
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
		
		$result = 0;

		foreach ($this->operands as $index => $operand) {
			if($index === 0){
				$result = $operand; 
				continue;
			}
			$result = $result / $operand;
		}

		return $result;
	}
}