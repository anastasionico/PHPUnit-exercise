<?php
namespace Calculator;

use Calculator\Exception\NoOperandsException;
use Calculator\OperationAbstract;

class Division extends OperationAbstract  implements OperationInterface{
	public function calculate()
	{
		if(count($this->operands) === 0){
			throw new NoOperandsException();
		}
	
		// 	the function array_reduce allow to loop trought an array and set a callback function that create operations within, 
		// 	what we are doing here is filter and remove all the 0 and null items of the array using array_filter function(first parameter), 
		// 	then set the first parameter of $this->operands as null (third parameter of the function)
		// 	the divide all the element that are looping one others and return the final number of the loop

		return array_reduce(array_filter($this->operands), function($a, $b){
			if($a !== null && $b !== null){
				return $a / $b;
			}
			return $b;
		}, null);
	}
}