<?php

include "vendor/autoload.php";

error_reporting(E_ALL);
//error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_DEPRECATED);
ini_set("display_errors",    "On");
define('ERROR_DISPLAY_CLI',  true);
define('ERROR_DISPLAY_HTML', false);
define('SYS_KEY',            'order');

register_shutdown_function(array(new \Jingwu\Error\ErrorHandle(),'Shutdown'));
set_error_handler(array(new \Jingwu\Error\ErrorHandle(), 'Error'));
set_exception_handler(array(new \Jingwu\Error\ErrorHandle(),'Exception'));


function dump() {
    var_dump($aa);
}

dump();
echo "\n\n";









