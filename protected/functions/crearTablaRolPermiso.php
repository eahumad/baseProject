<?php
require_once(dirname(__FILE__).'/../datos/Conexion.class.php');
require_once(dirname(__FILE__).'/../config/dataConstants.php');

$conexion = new Conexion();
$prefijo=_db_prefijo;
$sql="CREATE TABLE ".$prefijo."rol_permiso (
  id_rol_permiso  int(11)   NOT NULL AUTO_INCREMENT
  ,id_rol         int(11)   NOT NULL
  ,id_permiso     int(11)   NOT NULL
  ,s_vigencia     char(1)   NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_rol_permiso)
  ,CONSTRAINT `fk_rp_rol`       FOREIGN KEY (id_rol)      REFERENCES ".$prefijo."rol(id_rol)
  ,CONSTRAINT `fk_rp_permiso`   FOREIGN KEY (id_permiso)  REFERENCES ".$prefijo."permiso(id_permiso)
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

