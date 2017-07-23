<?php
use Codecourse\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
	public function testThatWeCanGetTheFistName()
	{
		$user = new User;
		$user->setName('Nico');
		assertEquals($user->getName(), 'Nico');
	}

	public function testThatWeCanGetTheSurname()
	{
		$user = new User;
		$user->setSurname('Anastasio');
		assertEquals($user->surname, "Anastasio");
	}

	public function testFullName()
	{
		$user = new User();
		$user->setName('Nico');
		$user->setSurname('Anastasio');

		assertEquals($user->getFullName(), "Anastasio Nico");
	}

	public function testNameAndSurnameAreTrimmed()
	{
		$user = new User();
		$user->setName('  Nico');
		$user->setSurname(' Anastasio    ');
		
		assertEquals($user->getName(), 'Nico');
		assertEquals($user->getSurname(), 'Anastasio');
	}

	public function testEmailAddressCanBeSet()
	{
		$email = "nico@anastasionico.uk";
		$user = new User();
		$user->setEmail($email);
		assertEquals($user->getEmail(), $email);
	}

	public function testEmailValueContainCorrectValue()
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