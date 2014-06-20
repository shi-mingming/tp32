<?php

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('APP_PATH','./Application/');
define('APP_DEBUG',TRUE);
define('RUNTIME_PATH','./Runtime/');

define('ROOT','/32/');

//1
require '../ThinkPHP/ThinkPHP.php';