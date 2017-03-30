<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);

try {
    
} catch (Exception $exc) {
    echo $exc->getMessage();
}


