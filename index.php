<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.

ini_set("error_log", "/wamp64/www/HTML/MVC/php-error.log");
//error_log( "Hello, errors!" );
require_once('config/config.php');
require_once('Clases/MessagesManager.php');
require_once('libreries/core/App.php');
require_once('libreries/core/Controllers.php');
require_once('Clases/sessionController.php');
require_once('libreries/core/Model.php');


$app = new App();


?>