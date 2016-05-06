<?php
/**
 * @author Emilio Ahumada
 * @year 2015
 */

//la configuración basica
$data = file_get_contents('protected/config/basicConfig.json');
$jsonData = json_decode($data, true);
$basicConfig = new  stdClass();
foreach ($jsonData as $key => $json) {
  $basicConfig = json_decode(json_encode($json));
}

session_start();
$usuario = isset( $_SESSION['usuario'] )?$_SESSION['usuario']:null;
$page=null;
?>
<!DOCTYPE html>
<html>
<head>
  <title>BaseProject</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile support -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">


  <link href="assets/css/bootstrap-theme.css" rel="stylesheet">

  <link href="assets/fonts/raleway/stylesheet.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
<?php
if( !$basicConfig->isInstalled ){
  require_once(dirname(__FILE__).'/views/instalar.php');
} else if( $usuario==null ){
  require_once(dirname(__FILE__).'/views/login.php');
} else {
  //cargar vista menú base :3
?>
  <aside id="menu-wrapper">
    <?php include("web_sections/menus.php"); ?>
  </aside>
  <section id="content-wrapper">
<?php 
  if($page!=null) {
    try {
      require('views/'.$page->archivo.'.php'); 
    } catch (Exception $e) {
      echo '<h1>No se pudo cargar la vista</h1>';
    }
  } else {
    //CARGAR UN VISTA DE BIENVENIDA, IMPRIMIR ALGÚN MENSAJE O SIMPLEMENTE DEJAR VACÍO
    echo '<h1>Bienvenido</h1>';
  }
?>
  </section>
<?php
} //fin else
?>
</body>
</html>