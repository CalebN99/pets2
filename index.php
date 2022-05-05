<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/pet-home.html');
});

//Order page route
//Define a default route
$f3->route('GET /order', function() {
    $view = new Template();
    echo $view->render('views/pet-order.html');
});

//Order page route 2

$f3->route('POST /order2', function() {
    $_SESSION['petKind'] = $_POST['petKind'];
    $_SESSION['color'] = $_POST['color'];

    $view = new Template();
    echo $view->render('views/pet-order2.html');
});



//summary page

$f3->route('POST /summary', function() {
    $_SESSION['petName'] = $_POST['petName'];

    $view = new Template();
    echo $view->render('views/order-summary.html');
});

//Run f3
$f3->run();
