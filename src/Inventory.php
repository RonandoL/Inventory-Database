<?php
    class Inventory
    {
        private $item;

        function __construct($item_name)
        {
            $this->item = $item_name;
        }

        function getItem()
        {
            return $this->item;
        }

    // SAVE, getAll(), deleteAll()
        function save()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM inventory;");
        }
    }
?>
