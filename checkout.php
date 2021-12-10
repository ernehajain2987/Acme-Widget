<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require './vendor/autoload.php';
require_once './src/classes/Bootstrap.php';

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/
$bootstrap = new \Application\Classes\Bootstrap();

/*
|--------------------------------------------------------------------------
| Init App
|--------------------------------------------------------------------------
|
*/
$bootstrap->initialize();

require_once("./src/views/master/header.php");
require_once("./src/views/master/navigation.php");
require_once("./src/views/viewcart.php");
require_once("./src/views/master/footer.php");

// var_dump($_SESSION);