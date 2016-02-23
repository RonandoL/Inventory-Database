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
            $GLOBALS['DB']->exec("INSERT INTO inventory_items (name) VALUES ('{$this->getName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_items = $GLOBALS['DB']->query("SELECT * FROM inventory_items;");
            $items = array();

            foreach($returned_items as $item) {
                $name = $item['name'];
                $id = $item['id'];
                $new_item = new Inventory($name, $id);
                array_push($items, $new_item);
        }
            return $items;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM inventory_items;");
        }
    }
?>
