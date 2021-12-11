<?php
// -----------------------------------------------------------------------
require __DIR__.'/../vendor/autoload.php';
// -----------------------------------------------------------------------
class Admin{
  // -----------------------------------------------------------------------
  function __construct($f3){

      if( !$f3->exists("SESSION.user_id") && !$f3->exists("SESSION.user_mail") && !$f3->exists("SESSION.user_profile")  ){
          $f3->reroute("/");
      }
      // LISTADO DE CSS PARA INCLUIR DESDE node_modules
      // carpeta publica
      $this->css_base = require __DIR__.'/views/admin/css.php';
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
  public function home($f3){
    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('admin/home.html'));
  }


  // -----------------------------------------------------------------------
  public function base($f3){
    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('admin/base.html'));
  }


  // -----------------------------------------------------------------------
  public function ide($f3){
    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('admin/ide.html'));
  }

  public function logout($f3){

        $f3->clear("SESSION.user_id");
        $f3->clear("SESSION.user_name");
        $f3->clear("SESSION.user_mail");
        $f3->clear("SESSION.user_profile");
        $f3->clear("SESSION.user_token");
        $f3->reroute("/");

  }

  // -----------------------------------------------------------------------
}
?>
