<?php
require_once(dirname(__FILE__).'/../datos/Conexion.class.php');
require_once(dirname(__FILE__).'/../config/dataConstants.php');

$conexion = new Conexion();
$prefijo=_db_prefijo;
$sql="CREATE TABLE ".$prefijo."usuario (
  id_usuario    int(11)       NOT NULL AUTO_INCREMENT
  ,s_nombre     varchar(50)   NOT NULL
  ,s_apellidos  varchar(120)  NOT NULL
  ,s_correo     varchar(120)  NOT NULL  UNIQUE
  ,s_username   varchar(20)   NOT NULL  UNIQUE
  ,s_password   varchar(32)   NOT NULL
  ,s_vigencia   char(1)       NOT NULL  DEFAULT 'S'
  ,PRIMARY KEY(id_usuario)
)";

try {
  $conexion->open();
  $conexion->sql($sql);
  $conexion->close();
  echo 1;
} catch (Exception $e) {
  $e->isError=true;
  error_log($e->getMessage());
  echo $e;
}

