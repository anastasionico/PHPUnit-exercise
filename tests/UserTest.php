<?php
use Codecourse\User;

class UserTest extends PHPUnit\Framework\TestCase
{
	protected $user;

	// Before a test method is run, a template method called setUp() is invoked. setUp() is where you create the objects against which you will test
	public function SetUp()
	{
		$this->user = new User;	
	}

	
	/** @test */
	public function that_we_can_get_the_fist_name()
	{
		$this->user->setName('Nico');
		assertEquals($this->user->getName(), 'Nico');
	}

	/** @test */
	public function that_we_can_get_the_surname()
	{
		$this->user->setSurname('Anastasio');
		assertEquals($this->user->surname, "Anastasio");
	}

	/** @test */
	public function full_name()
	{
		$this->user->setName('Nico');
		$this->user->setSurname('Anastasio');

		assertEquals($this->user->getFullName(), "Anastasio Nico");
	}

	/** @test */
	public function name_and_surname_are_trimmed()
	{
		$this->user->setName('  Nico');
		$this->user->setSurname(' Anastasio    ');
		
		assertEquals($this->user->getName(), 'Nico');
		assertEquals($this->user->getSurname(), 'Anastasio');
	}

	/** @test */
	public function email_address_can_be_set()
	{
		$email = "nico@anastasionico.uk";
		$this->user->setEmail($email);
		assertEquals($this->user->getEmail(), $email);
	}

	/** @test */
	public function email_variable_contain_correct_value()
	{
		$this->user->setName('Nico');
		$this->user->setSurname('Anastasio');
		$this->user->setEmail('nico@anastasionico.uk');

		$emailVariables = $this->user->getEmailVariables();

		assertArrayHasKey('fullname', $emailVariables);
		assertArrayHasKey('email', $emailVariables);

		assertEquals($emailVariables['fullname'], 'Anastasio Nico');
		assertEquals($emailVariables['email'], 'nico@anastasionico.uk');
	}
}