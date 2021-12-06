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

    $data = explode(",","WebKit, Blink, Trident, Text-based, Dillo, iCab, Elektra, Presto, Gecko, KHTML, NetFront, Edge, NetSurf, Servo, Goanna, EkiohFlow");
    /*
    header('Content-Type: application/json');
    echo json_encode($data);
    */

    foreach ($data as $key => $value) {
      echo "(\"".trim($value)."\"),";
    }



  }
}
?>
