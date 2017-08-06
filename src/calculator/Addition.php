<?php
namespace Calculator;

use Calculator\Exception\NoOperandsException;
use Calculator\OperationAbstract;

class Addition extends OperationAbstract implements OperationInterface{
	public function calculate()
	{
		if(count($this->operands) === 0){
			throw new NoOperandsException();
		}
		return array_sum($this->operands);
	}
}