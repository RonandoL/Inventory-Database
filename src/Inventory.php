<?php
    class Inventory
    {
        private $name;
        private $id;

        function __construct($item_name, $item_id=null)
        {
            $this->name = $item_name;
            $this->id = $item_id;
        }

        // function setItem($new_item)
        // {
        //     $this->item = (string) $new_item;
        // }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

    // SAVE, getAll(), deleteAll()
    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO inventory_database (name) VALUES ('{$this->getItem()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
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
