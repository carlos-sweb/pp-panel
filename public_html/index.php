<?php
require __DIR__.'/../vendor/autoload.php';
$f3 = \Base::instance();
new Session(NULL,'CSRF');

$db = file_exists("../config/database/mysql.php") ? require("../config/database/mysql.php") : array();
$f3->set('LOCALES','../app/dict/');

putenv('DB_NAME='.$db["DB_NAME"]);
putenv('DB_USER='.$db["DB_USER"]);
putenv('DB_PASS='.$db["DB_PASS"]);
putenv('DB_HOST='.$db["DB_HOST"]);
putenv('DB_PORT='.$db["DB_PORT"]);


$f3->config(__DIR__.'/../routes.ini');
$f3->config(__DIR__.'/../config.ini',true);
$f3->run();
?>
