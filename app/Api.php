<?php
// -----------------------------------------------------------------------
require __DIR__.'/../vendor/autoload.php';
// -----------------------------------------------------------------------
class Api{
  // -----------------------------------------------------------------------
  function __construct(){

  }

  // -----------------------------------------------------------------------
  public function api($f3){

    $data = [
        "loggin"=>false,
        "fruits"=>['apple','orange','pineapple']
    ];

    header('Content-Type: application/json');
    echo json_encode($data);

  }
}
?>
