<?php
require_once(dirname(__FILE__).'/../datos/Conexion.class.php');
require_once(dirname(__FILE__).'/../model/constantes.php');


$user = json_decode(json_encode($_POST));

$tablaUsuario = _db_prefijo.'usuario';
$user->password = md5( sha1($user->password._frase) );

$insert = "INSERT INTO $tablaUsuario (
  s_nombre
  ,s_apellidos
  ,s_correo
  ,s_username
  ,s_password
  ,s_vigencia
) VALUES (
  $user->nombre
  ,$user->apellidos
  ,$user->correo
  ,$user->username
  ,$user->password
  ,$user->vigencia
)";

$conexion = new Conexion();

try {
  $this->conexion->open();
  $this->conexion->insert($insert);
  $this->conexion->close();

  echo json_encode(1);
} catch (Exception $e) {
  $e->isError=true;
  error_log($e->getMessage());
  echo $e;
}