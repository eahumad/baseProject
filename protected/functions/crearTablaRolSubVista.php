<?php
require_once(dirname(__FILE__).'/../datos/Conexion.class.php');
require_once(dirname(__FILE__).'/../config/dataConstants.php');

$conexion = new Conexion();
$prefijo=_db_prefijo;
$sql="CREATE TABLE ".$prefijo."rol_sub_vista (
  id_rol_sub_vista  int(11)   NOT NULL AUTO_INCREMENT
  ,id_rol           int(11)   NOT NULL
  ,id_sub_vista     int(11)   NOT NULL
  ,s_vigencia       char(1)   NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_rol_sub_vista)
  ,CONSTRAINT `fk_rsv_rol`        FOREIGN KEY (id_rol)        REFERENCES ".$prefijo."rol(id_rol)
  ,CONSTRAINT `fk_rsv_sub_vista`  FOREIGN KEY (id_sub_vista)  REFERENCES ".$prefijo."sub_vista(id_sub_vista)
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

