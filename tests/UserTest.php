<?php
use Codecourse\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
	/** @test */
	public function that_we_can_get_the_fist_name()
	{
		$user = new User;
		$user->setName('Nico');
		assertEquals($user->getName(), 'Nico');
	}

	/** @test */
	public function that_we_can_get_the_surname()
	{
		$user = new User;
		$user->setSurname('Anastasio');
		assertEquals($user->surname, "Anastasio");
	}

	/** @test */
	public function full_name()
	{
		$user = new User();
		$user->setName('Nico');
		$user->setSurname('Anastasio');

		assertEquals($user->getFullName(), "Anastasio Nico");
	}

	/** @test */
	public function name_and_surname_are_trimmed()
	{
		$user = new User();
		$user->setName('  Nico');
		$user->setSurname(' Anastasio    ');
		
		assertEquals($user->getName(), 'Nico');
		assertEquals($user->getSurname(), 'Anastasio');
	}

	/** @test */
	public function email_address_can_be_set()
	{
		$email = "nico@anastasionico.uk";
		$user = new User();
		$user->setEmail($email);
		assertEquals($user->getEmail(), $email);
	}

	/** @test */
	public function email_variable_contain_correct_value()
	{
		$user = new User();
		$user->setName('Nico');
		$user->setSurname('Anastasio');
		$user->setEmail('nico@anastasionico.uk');

		$emailVariables = $user->getEmailVariables();

		assertArrayHasKey('fullname', $emailVariables);
		assertArrayHasKey('email', $emailVariables);

		assertEquals($emailVariables['fullname'], 'Anastasio Nico');
		assertEquals($emailVariables['email'], 'nico@anastasionico.uk');
		
		// [
		// 	'fullname' => "nico Anastasio",
		// 	'email' => 'nico@anastasionico.uk'
		// ]
	}
}