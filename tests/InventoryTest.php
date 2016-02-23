<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Inventory.php";

    $server = 'mysql:host=localhost;dbname=inventory_database_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class InventoryTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
          Inventory::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "book";
            $test_Inventory = new Inventory($name);

            //Act
            $result = $test_Inventory->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "book";
            $id = 1;
            $test_Inventory = new Inventory($name, $id);

            //Act
            $result = $test_Inventory->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "book";
            $test_Inventory = new Inventory($name);
            $test_Inventory->save();

            //Act
            $result = Inventory::getAll();

            //Assert
            $this->assertEquals($test_Inventory, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "book";
            $name2 = "stamp";
            $test_Inventory = new Inventory($name);
            $test_Inventory->save();
            $test_Inventory2 = new Inventory($name2);
            $test_Inventory2->save();

            //Act
            $result = Inventory::getAll();

            //Assert
            $this->assertEquals([$test_Inventory, $test_Inventory2], $result);
        }

    }

    // Run in terminal in project folder
    // export PATH=$PATH:./vendor/bin
    // phpunit tests

?>
