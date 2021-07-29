<?php
// -----------------------------------------------------------------------
require __DIR__.'/../vendor/autoload.php';
// -----------------------------------------------------------------------
use \DB\SQL;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
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

  public function setupConfigValidate( $f3 ){

      $filesystem = new Filesystem();

      $f3->set( 'DB_ERROR' , false );

      $dbConfig = [
        "DB_NAME"=>$f3->get( 'POST.db_name' ),
        "DB_USER"=>$f3->get( 'POST.db_user' ),
        "DB_PASS"=>$f3->get( 'POST.db_pass' ),
        "DB_HOST"=>$f3->get( 'POST.db_host' ),
        "DB_PORT"=>$f3->get( 'POST.db_port' )
      ];

      try{

        $f3->set('DB', new \DB\SQL('mysql:host='.$dbConfig['DB_HOST'].';port='.$dbConfig['DB_PORT'].';dbname='.$dbConfig['DB_NAME'],$dbConfig['DB_USER'],$dbConfig['DB_PASS'],[
          \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION ,
          \PDO::ATTR_PERSISTENT => TRUE ,
          \PDO::MYSQL_ATTR_COMPRESS => TRUE ,
        ]));

      }catch( PDOException $Exception ){
          $f3->set( 'DB_ERROR' , true );
          $f3->set( 'DB_ERROR_MESSAGE' , $Exception->getMessage( ) );
          $f3->set( 'DB_ERROR_CODE' ,$Exception->getCode( ) );
      }

      if( $f3->get('DB_ERROR') === false ){

        //'&lt;p&gt;wonderful world&lt;/p&gt;'

        $content  = "<?php\n";
        $content .= "/*created : ".date("Y-m-d H:m:s")." */\n";
        $content .= "return [\n";
        $content .= "   'DB_NAME'=>'".$dbConfig["DB_NAME"]."',\n";
        $content .= "   'DB_USER'=>'".$dbConfig["DB_USER"]."',\n";
        $content .= "   'DB_PASS'=>'".$dbConfig["DB_PASS"]."',\n";
        $content .= "   'DB_HOST'=>'".$dbConfig["DB_HOST"]."',\n";
        $content .= "   'DB_PORT'=>'".$dbConfig["DB_PORT"]."'\n";
        $content .= "];\n";
        $content .= "?>";

        $filesystem->dumpFile(__DIR__.'/../config/database/mysql.php',$content );

        /*
        <?php
        return [
            'DB_NAME'=>'stix',
            'DB_USER'=>'fatfree',
            'DB_PASS'=>'password',
            'DB_HOST'=>'localhost',
            'DB_PORT'=>'3366'
        ];
        ?>
        */

      }else{

        $f3->reroute("install/setup-config");

      }



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
