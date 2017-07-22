<?php

class FirstMockeryTest extends PHPUnit\Framework\TestCase
{
	public function TearDown()
	{
		Mockery::close();
	}
	public function test_mockery()
	{
		// The following code check if the class MockedClass has been called (it does not care what the method run returns, it only care that the code is colled once it will return error if i call the method run 0 or more than 1 time)

		$mock = Mockery::mock('Acme\MockedClass');
		$mock->shouldReceive('run')->once()->andReturn('mocked');
		var_dump($mock->run());
	}
}