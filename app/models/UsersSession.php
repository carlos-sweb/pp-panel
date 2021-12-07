<?php

class UserSession extends \DB\SQL\Mapper {
  public function __construct(DB\SQL $db , $UserDevice) {
    parent::__construct( $db , 'UsersSession', [ 'id','user_id', 'token', 'device' ] );
      $crypt = \Bcrypt::instance();
      $this["user_id"] = $UserDevice->get("user_id");
      $this["token"] = $crypt->hash("token|".$UserDevice->get("user_id")."|".$UserDevice->get("id"),null,10);
      $this["device"] = $UserDevice->get("id");
      $this->save();
  }
}

?>
