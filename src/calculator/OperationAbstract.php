<?php
namespace Calculator;

Abstract class OperationAbstract
{
	public $operands;

	public function setOperands(array $operands)
	{
		$this->operands = $operands;
	}
}