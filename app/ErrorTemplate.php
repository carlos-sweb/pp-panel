<?php
// -----------------------------------------------------------------------
require __DIR__.'/../vendor/autoload.php';
// -----------------------------------------------------------------------
class ErrorTemplate{
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
  public function page404($f3){
    /*
    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('install/welcome.html'));
    */

    echo "aaa";
  }
  // -----------------------------------------------------------------------
}
?>
