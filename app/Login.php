<?php
// -----------------------------------------------------------------------
require __DIR__.'/../vendor/autoload.php';
use \DB\SQL;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
require __DIR__."/models/Users.php";
require __DIR__."/models/UsersDevices.php";
require __DIR__."/models/UsersSession.php";


use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\AbstractDeviceParser;
// OPTIONAL: Set version truncation to none, so full versions will be returned
// By default only minor versions will be returned (e.g. X.Y)
// for other options see VERSION_TRUNCATION_* constants in DeviceParserAbstract class
AbstractDeviceParser::setVersionTruncation(AbstractDeviceParser::VERSION_TRUNCATION_NONE);
// -----------------------------------------------------------------------
class Login{
  // -----------------------------------------------------------------------
  function __construct($f3){

    if( !file_exists(__DIR__.'/../config/database/mysql.php') ){
          $f3->reroute("/install");
    }

    // -------------------------------------------------------------------------------------------
    if( $f3->exists("SESSION.user_id")  ){ $f3->reroute("/admin"); }
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
    $this->css_base = file_exists(__DIR__.'/views/login/css.php') ? require __DIR__.'/views/login/css.php' : [];
    $this->js_base = file_exists(__DIR__.'/views/login/js.php') ? require __DIR__.'/views/login/js.php' : [];

  }

  public function getUserIP()
  {
      // Get real visitor IP behind CloudFlare network
      if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
      }
      $client  = @$_SERVER['HTTP_CLIENT_IP'];
      $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
      $remote  = $_SERVER['REMOTE_ADDR'];

      if(filter_var($client, FILTER_VALIDATE_IP))
      {
          $ip = $client;
      }
      elseif(filter_var($forward, FILTER_VALIDATE_IP))
      {
          $ip = $forward;
      }
      else
      {
          $ip = $remote;
      }

      return $ip;
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
  // ---------------------------------------------------------------------------
  public function loginVerify( $f3 ){

    $dd = new DeviceDetector($f3->get("AGENT"));
    $dd->parse();
    //==========================================================================
    if ($dd->isBot()) {
      // En caso que sea un boot
      $botInfo = $dd->getBot();

    } else {

      $crypt = \Bcrypt::instance();
      // Como hash deveriamos pasar los datos del despositivo
      //$UserDevice["token"] = $crypt->hash("hello");

      $user     = new User();
      $auth     = new \Auth( $user , array('id' => 'mail', 'pw' => 'password'));
      $isLoggin = $auth->login($f3->get("POST.mail"),$f3->get("POST.password"));


      if(  $isLoggin ){

        $UserDevice = [];
        $UserDevice["user_id"] = $user->id;
        $UserDevice["name"] = "nameless";
        $UserDevice["os"] = $dd->getOs()["name"];
        $UserDevice["client"] = $dd->getClient()["name"];
        $UserDevice["engine"] = $dd->getClient()["engine"];
        $UserDevice["ip"] = $this->getUserIP();
        $UserDevice["device"] = $dd->getDeviceName();

        $dd = new UserDevices(  $f3->get("DB") , $UserDevice );

        $us = new UserSession( $f3->get("DB") , $dd );

        $f3->set("SESSION.user_id",$user->id);
        $f3->set("SESSION.user_name",$user->name);
        $f3->set("SESSION.user_mail",$user->mail);
        $f3->set("SESSION.user_profile",$user->profile);
        $f3->set("SESSION.user_token",$us->get("token"));
        $f3->reroute("/admin");

      }else{

        echo "Error de Login";


      }

    } // Detectamos que no sea un robot

  }

  /**
  *@name login
  *@description  funcion que muestra la vista del formulario de login
  *formulario principal
  */
  public function login($f3){


      $f3->exists('PARAMS.lang') ? $f3->set('LANGUAGE',$f3->get('PARAMS.lang')) :
      $f3->reroute("/es");

      $f3->set("css",$this->css_base);
      $f3->set("js",[
        'node_modules/axios/dist/axios.min.js',
        'node_modules/pp-events/pp-events.min.js',
        'node_modules/pp-model.js/pp-model.min.js',
        'js/login/login.js'
      ]);


      echo $f3->get('DB_ERROR') ? $this->minifer(Template::instance()->render('error/db_connection.html')) : $this->minifer(Template::instance()->render('login/login.html'));

      //echo Template::instance()->render('login/login.html');
  }
  // -----------------------------------------------------------------------
  // -----------------------------------------------------------------------
  public function password_reset($f3){
    $f3->set("css",$this->css_base);
    echo $this->minifer(Template::instance()->render('login/password_reset.html'));
  }
  public function password_reset_validate($f3){
    $f3->set("css",$this->css_base);
    echo $this->minifer(Template::instance()->render('login/password_reset_validate.html'));
  }
  // -----------------------------------------------------------------------
}
?>
