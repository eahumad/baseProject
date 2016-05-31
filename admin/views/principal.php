<?php
//la configuración basica
$data = file_get_contents('../protected/config/basicConfig.json');
$jsonData = json_decode($data, true);
$basicConfig = new  stdClass();
foreach ($jsonData as $key => $json) {
  $basicConfig = json_decode(json_encode($json));
  if(!$basicConfig->isInstalled){
    //TODO: redireccionar a raiz
  }
}
$version='0.01';
session_start();
$usuarioAdmin = isset( $_SESSION['usuarioAdmin'] )?$_SESSION['usuarioAdmin']:null;
$page=null;
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>