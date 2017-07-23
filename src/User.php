<?php
namespace Codecourse;

class User 
{
	public $name;
	public $surname;
	public $email;

	public function setName($name)
	{
		$this->name = trim($name);
	}
	
	public function getName()
	{
		return $this->name;
	}

	public function setSurname($surname)
	{
		$this->surname = trim($surname);
	}

	public function getSurname()
	{
		return $this->surname;
	}

	public function getFullName()
	{
		return $this->surname ." ". $this->name;
	}

	public function setEmail($email)
	{
		$this->email = trim($email);
	}
	
	public function getEmail()
	{
		return $this->email;
	}

	public function getEmailVariables()
	{
	 	return [
	 		'fullname' => $this->getFullName(),
	 		'email' => $this->getEmail()
	 	];
	} 
}