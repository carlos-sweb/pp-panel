<?php
class UserDevices extends \DB\SQL\Mapper {
	public function __construct( DB\SQL $db , $UserDevice ) {
		parent::__construct( $db , 'UsersDevices', ["id","user_id","name","ip","client","os","engine"] );

      $client = new \DB\SQL\Mapper($db , "browsers_dd",["id","browser"]);
      $client->load(["browser = ?", $UserDevice["client"]]);
      $os = new \DB\SQL\Mapper($db , "os_dd",["id","od"]);
      $os->load(["os = ?", $UserDevice["os"]]);
      $engine = new \DB\SQL\Mapper($db , "engines_dd",["id","engine"]);
      $engine->load(["engine = ?", $UserDevice["engine"]]);

      $this->existsDevice = count($this->find(["user_id =  ? AND ip = ? AND client = ? AND os = ? AND engine = ? " ,
        $UserDevice["user_id"],
        $UserDevice["ip"],
        $client->get("id"),
        $os->get("id"),
        $engine->get("id")
      ]) )  == 0 ? false : true;

      if($this->existsDevice == false ){

         $this["user_id"] = $UserDevice["user_id"];
         $this["name"] = "nameless";
         $this["ip"] = $UserDevice["ip"];

         $this["client"] = $client->get("id");
         $this["os"] = $os->get("id");
         $this["engine"] = $engine->get("id");

         try{
           $this->save();
           $this->existsDevice = true;
         }catch( PDOException $Exception ){
           $this->existsDevice = false;
         }
      }else{
         $this->load(["user_id =  ? AND ip = ? AND client = ? AND os = ? AND engine = ? " ,
           $UserDevice["user_id"],
           $UserDevice["ip"],
           $client->get("id"),
           $os->get("id"),
           $engine->get("id")
         ]);
        // Cargamos con load
      }

	}

}

 ?>
