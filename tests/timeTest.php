<?php
namespace Acme;

function time(){
	return "PHP function time overridden";
}


class TimeTest extends \PHPUnit\Framework\TestCase
{
	public function test_gets_the_time(){
		
		$result = (new Time)->getTime();
		$this->assertEquals($result, 'PHP function time overridden');

	}
}

// Having added the same namespace of the class that I am testing to the test file I have overwritten the time () function.
// PHP prioritizes the class inside the test file instead of the php time class().
// It is possible to use this trick to test function that have the same name of system funtions
