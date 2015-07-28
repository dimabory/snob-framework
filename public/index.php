<?php
    defined('LIB_PATH') || define('LIB_PATH', realpath(dirname(__FILE__).'/../lib/'));
    defined('APP_PATH') || define('APP_PATH', realpath(dirname(__FILE__).'/../app/'));
    defined('APP_ENV') || define('APP_ENV', (getenv('APP_ENV') ? getenv('APP_ENV') : 'development'));

    require_once LIB_PATH."/App.php";

    use lib\App as App;

    $app = new App(APP_PATH.'/config.ini', APP_ENV);
    $app->bootstrap()->run();
