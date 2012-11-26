<?php
$CONFIG_DB = array();

/**
 * Defines type of database to use, You can use any of the database types supported by your current PDO instilation.
 * To check what type your current system supports, use the function php_info();
 */
$CONFIG_DB['dsn'] = 'sqlite:application/db/database.sqlite3';
$CONFIG_DB['user'] = null;
$CONFIG_DB['passwd'] = null;
$CONFIG_DB['driver_options'] = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_PERSISTENT => true
);

$GLOBALS['CONFIG_DB'] = $CONFIG_DB;


$CONFIG_ERRORS = array();
$CONFIG_ERRORS['error_template'] = 'system/core/util/error_template.php';

$GLOBALS['CONFIG_ERRORS'] = $CONFIG_ERRORS;



// // ==================================================================
// $CONFIG_DB['type'] = 'mysql';

// /**
//  * Defines your username used for accessing the database. If you are using sqlite leave this blank.
//  */
// $CONFIG_DB['user_name'] = 'root';


//  * Defines your password used for accessing the database. If you are using sqlite leave this blank.

// $CONFIG_DB['password'] = 'root';

// /**
//  * Defines your host used for accessin the database. If you are using sqlite leave this blank.
//  */
// $CONFIG_DB['host'] = 'localhost';

// /**
//  * Defines the name of the database you want to access. If you are using sqlite this will be the path to the database file.
//  */
// $CONFIG_DB['db_name'] = 'tiny';