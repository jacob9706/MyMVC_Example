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
require_once 'system' . DS . 'config' . DS . 'setup.php';
require_once 'system' . DS . 'core' . DS . 'Alerts.php';
require_once 'system' . DS . 'core' . DS . 'Router.php';
require_once 'system' . DS . 'core' . DS . 'Model_Template.php';
require_once 'system' . DS . 'core' . DS . 'View_Template.php';
require_once 'system' . DS . 'core' . DS . 'Controller_Template.php';


/*********************************************
 * Create a new Router and route
 *********************************************/
$router = new Router();
$router->route();