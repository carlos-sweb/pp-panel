<?php
// -----------------------------------------------------------------------
require __DIR__.'/../vendor/autoload.php';
use \DB\SQL;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
// -----------------------------------------------------------------------
class Creator{
  // -----------------------------------------------------------------------
  function __construct($f3){
    // --------------------------------------------------------------------------------------------
    try{
      $f3->set('DB', new \DB\SQL('mysql:host='.$f3->get('DB_HOST').';port='.$f3->get('DB_PORT').';dbname='.$f3->get('DB_NAME'),$f3->get('DB_USER'),$f3->get('DB_PASS'),[
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION ,
        \PDO::ATTR_PERSISTENT => TRUE ,
        \PDO::MYSQL_ATTR_COMPRESS => TRUE ,
      ]));
    }catch( PDOException $Exception ){
        $f3->set('DB_ERROR',true);
        $f3->set('DB_ERROR_MESSAGE', $Exception->getMessage( ) );
        $f3->set('DB_ERROR_CODE',$Exception->getCode( ) );
    }

    // --------------------------------------------------------------------------------------------
    $this->css_base = require __DIR__.'/views/login/css.php';
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
  public function home( $f3 ){

    $f3->set("css",$this->css_base);
    $f3->set("rand",rand(1,550505050050500));
    echo $this->minifer(Template::instance()->render('creator/home.html'));

  }

  public function example( $f3 ){

    $f3->set("css",$this->css_base);
    echo $this->minifer(Template::instance()->render('creator/example.html'));

  }

}
?>
