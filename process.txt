WRITE A TEST (WALKTHROUGH)

initiate the project
1) Create a folder
2) Initiate it in git
3) Create src/ and tests/ directories
4) touch composer.json

initiate composer
5) define the autoload inside composer.json 
6) run composer install in the CLI
7) create a class inside the src directory (give a namespace to the class)
8) run composer dump-autoloar in the CLI

install and initiate phpunit
9) run composer require phpunit/phpunit
10) create the phpunit.xml file and indicate the directory where the test will be written

write a test
11) write a test fileinside the tests folder (or whatever indicated inside phpunit.xml) give it the same name of the class to test nameclassTest.php (WARNING pay attention of the class tu extend)
12) create a simple test
