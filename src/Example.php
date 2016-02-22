<?php
    class Example
    {
        private $xxx;
        private $xxx;
        private $name;

        function __construct($contact_name)
        {
            $this->name = $contact_name;
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
            $_SESSION['list_of_contacts'] = array();
        }
    }
?>
