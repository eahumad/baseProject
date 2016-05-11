<?php
require_once(dirname(__FILE__).'/../datos/Conexion.class.php');
require_once(dirname(__FILE__).'/../config/dataConstants.php');

$conexion = new Conexion();
$prefijo=_db_prefijo;
$sql="CREATE TABLE ".$prefijo."rol_usuario (
  id_rol_usuario  int(11)   NOT NULL AUTO_INCREMENT
  ,id_rol         int(11)   NOT NULL
  ,id_usuario     int(11)   NOT NULL
  ,s_vigencia     char(1)   NOT NULL DEFAULT 'S'
  ,PRIMARY KEY(id_rol_usuario)
  ,CONSTRAINT `fk_ru_rol`     FOREIGN KEY (id_rol)      REFERENCES ".$prefijo."rol(id_rol)
  ,CONSTRAINT `fk_ru_usuario` FOREIGN KEY (id_usuario)  REFERENCES ".$prefijo."usuario(id_usuario)
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

