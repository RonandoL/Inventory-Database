<?php

    require_once "src/Example.php";

    class ExampleTest extends PHPUnit_Framework_TestCase
    {

        function test_makeExample_oneWord()
        {
            //Arrange
            $test_Example = new Example;
            $input = "beowulf";

            //Act
            $result = $test_Example->makeExample($input);

            //Assert
            $this->assertEquals("Beowulf", $result);
        }
    }

    // Run in terminal in project folder
    // export PATH=$PATH:./vendor/bin
    // phpunit tests

?>
