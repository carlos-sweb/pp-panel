<?php
// -----------------------------------------------------------------------
require __DIR__.'/../vendor/autoload.php';
// -----------------------------------------------------------------------
class Install{
  // -----------------------------------------------------------------------
  function __construct(){

    $this->css_base = [
        '/node_modules/@fortawesome/fontawesome-free/css/all.css',
        '/node_modules/normalize.css/normalize.css',
        '/master.css',
        '/css/font.css',
        '/css/style.css'
    ];
  }
  // -----------------------------------------------------------------------
  public function minifer($code){
        return preg_replace(
          array(
              '/ {2,}/',
              '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
          ),
          array(
              ' ',
              ''
          ),
          $code
        );
  }
  // -----------------------------------------------------------------------
  public function welcome($f3){
    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('install/welcome.html'));
  }
  // -----------------------------------------------------------------------
  // -----------------------------------------------------------------------
  public function setupConfig($f3){
    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('install/setup-config.html'));
  }
  public function setupAccount($f3){
    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('install/setup-account.html'));
  }
  public function statusInstall($f3){
    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('install/status-install.html'));
  }
  // -----------------------------------------------------------------------
}
?>
