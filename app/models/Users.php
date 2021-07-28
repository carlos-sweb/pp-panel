<?php

class User extends \DB\SQL\Mapper {
  public function __construct() {
    parent::__construct( \Base::instance()->get('DB'), 'Users', [ 'id', 'name' , 'mail', 'profile' ] );
  }
}

?>
