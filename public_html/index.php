<?php
date_default_timezone_set('America/Santiago');
require __DIR__.'/../vendor/autoload.php';
$config_db = file_exists(__DIR__.'/../config/database/mysql.php') ? require __DIR__.'/../config/database/mysql.php' : ['DB_NAME'=>'','DB_USER'=>'','DB_PASS'=>'','DB_HOST'=>'','DB_PORT'=>''];

putenv('DB_NAME='.$config_db['DB_NAME']);
putenv('DB_USER='.$config_db['DB_USER']);
putenv('DB_PASS='.$config_db['DB_PASS']);
putenv('DB_HOST='.$config_db['DB_HOST']);
putenv('DB_PORT='.$config_db['DB_PORT']);

$f3 = \Base::instance();
new Session(NULL,'CSRF');
$f3->set('LOCALES','../app/dict/');
$f3->set('LANGUAGE','es');
$f3->config(__DIR__.'/../routes.ini');
$f3->config(__DIR__.'/../config.ini',true);
$f3->run();

/*
[routes]
GET /install=Install->welcome
GET /install/setup-config=Install->setupConfig
POST /install/setup-config=Install->setupConfigValidate

GET /install/setup-account=Install->setupAccount
GET /install/status-install=Install->statusInstall

GET /login=Login->login
GET /login/@lang=Login->login

POST /login=Login->loginVerify

GET /login/password-reset=Login->password_reset
GET /login/password-reset-validate=Login->password_reset_validate

GET /admin=Admin->home
GET /admin/@section=Admin->base


GET /admin/ide=Admin->ide
GET /admin/logout=Admin->logout

GET /admin/creator=Creator->home
GET /admin/creator/example=Creator->example


GET /api=Api->api
*/


?>
