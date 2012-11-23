<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12
 * URL: index.php
 */

/*********************************************
 * Define a directory separator
 *********************************************/
define('DS', DIRECTORY_SEPARATOR);


/*********************************************
 * Require the nessesary files
 *********************************************/
require_once 'system/config/setup.php';
require_once 'system/core/Alerts.php';
require_once 'system/core/Router.php';
require_once 'system/core/Model_Template.php';
require_once 'system/core/View_Template.php';
require_once 'system/core/Controller_Template.php';


/*********************************************
 * Create a new Router and route
 *********************************************/
$router = new Router();
$router->route();