<?php
$dbDatos = $_POST;

function generateDataConstans($dbDatos) {
  try {
    $constantsString='<?php';
    foreach ($dbDatos as $key => $dato) {
      $constantsString.="
define('_db_$key','$dato');
      ";
    }

    //escribir archivo
    $dataConstansFile = fopen('../config/dataConstants.php','w+');
    fwrite($dataConstansFile, $constantsString);
    fclose($dataConstansFile);

  } catch (Exception $e) {
    $e->isError=true;
    echo json_encode($e);
  }
}


//primero se debe generar las constantes
generateDataConstans($dbDatos);

echo json_encode(1);