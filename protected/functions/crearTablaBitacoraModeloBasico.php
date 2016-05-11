<?php
require_once(dirname(__FILE__).'/../datos/Conexion.class.php');
require_once(dirname(__FILE__).'/../config/dataConstants.php');

$conexion = new Conexion();
$prefijo=_db_prefijo;
$sql="CREATE TABLE ".$prefijo."bitacora_modelo_basico(
  id_bitacora_modelo_basico   int(11)   NOT NULL AUTO_INCREMENT
  ,id_usuario                 int(11)
  ,id_rol                     int(11)
  ,id_modulo                  int(11)
  ,id_vista                   int(11)
  ,id_sub_vista               int(11)
  ,id_permiso                 int(11)
  ,s_descripcion              text
  ,s_json_accion              text
  ,id_usuario_crea            int(11)   NOT NULL
  ,fecha_crea                 datetime  NOT NULL
  ,PRIMARY KEY(id_bitacora_modelo_basico)
  ,CONSTRAINT `fk_usuario_modificado` FOREIGN KEY (id_usuario)      REFERENCES ".$prefijo."usuario(id_usuario)
  ,CONSTRAINT `fk_rol_modificado`     FOREIGN KEY (id_rol)          REFERENCES ".$prefijo."rol(id_rol)
  ,CONSTRAINT `fk_modulo_modifica`    FOREIGN KEY (id_modulo)       REFERENCES ".$prefijo."modulo(id_modulo)
  ,CONSTRAINT `fk_vista_modifica`     FOREIGN KEY (id_vista)        REFERENCES ".$prefijo."vista(id_vista)
  ,CONSTRAINT `fk_sub_vista_modifica` FOREIGN KEY (id_sub_vista)    REFERENCES ".$prefijo."sub_vista(id_sub_vista)
  ,CONSTRAINT `fk_permiso_modifica`   FOREIGN KEY (id_permiso)      REFERENCES ".$prefijo."permiso(id_permiso)
  ,CONSTRAINT `fk_usuario_crea`       FOREIGN KEY (id_usuario_crea) REFERENCES ".$prefijo."usuario(id_usuario)
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

