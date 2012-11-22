<?php
/**
 * User: Jacob Ebey
 * Date: 11/21/12
 * URL: index.php
 */

define('DS', DIRECTORY_SEPARATOR);

require_once 'system/core/Router.php';
require_once 'system/core/Model_Template.php';
require_once 'system/core/View_Template.php';
require_once 'system/core/Controller_Template.php';

$router = new Router();

$router->route();