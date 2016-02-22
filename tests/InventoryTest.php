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

        function test_getItem()
        {
            //Arrange
            $item = "book";
            $test_Inventory = new Inventory($item);

            //Act
            $result = $test_Inventory->getItem();

            //Assert
            $this->assertEquals($item, $result);
        }
    }

    // Run in terminal in project folder
    // export PATH=$PATH:./vendor/bin
    // phpunit tests

?>
