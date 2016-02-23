<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Inventory.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=inventory_database';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

// End busy code -----------^

    // Render Home Page
    $app->get("/", function() use ($app) {
        return $app['twig']->render('inventory.html.twig'); //
    });

    // Show all items
    $app->get("/items", function() use ($app) {
        return $app['twig']->render('inventory.html.twig', array('items' => Inventory::getAll()));
    });

    // Post an item(s) added to inventory
    $app->post("/items", function() use ($app) {
        $item = new Inventory($_POST['name']);
        $item->save();
        return $app['twig']->render('inventory.html.twig', array('items' => Inventory::getAll()));
    });

    // Delete all items from table
    $app->post("/delete_items", function() use ($app) {
        Inventory::deleteAll();
        return $app['twig']->render('inventory.html.twig');
    });




    return $app;

?>
