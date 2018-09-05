<?php
ob_start();// output buffing turned on

// Assign file paths to php constants
// _FILE_ retures the current path to this file_exists
// dirname() returns the pathto the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH. '/shared') ; 

// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as wedsever
// * can set a haedcoded value:
// define("WWW_ROOT", '/~localhost/flourish_corp/public')
// define("WWW_ROOT", '' );
// * Can dynamically find everything in URL up to "/PUBLIC"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') +7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT",$doc_root);


require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');


$db = db_connect();
$errors = [];

?>