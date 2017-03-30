<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);

require_once (ROOT . 'config' . DS . 'Config.php');
require_once (ROOT . 'config' . DS . 'Config.ini.php');

try {
    
} catch (Exception $exc) {
    echo $exc->getMessage();
}


