<?php
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';



// When asserting some test the normal sintax is $this->nameAssertion
// We can avoid to write the referecne $this-> by requiring the Functions.php within our tests file
// to do that create a bootstrap file that requires either the autoload.php and the Functions.php and update the bootstrap attribute of the phpunit inside the phpunit.xml 
