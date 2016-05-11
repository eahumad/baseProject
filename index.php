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
$version='0.01';
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

  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

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

<!--javascript-->
<script src="assets/js/jquery-1.12.3.js?version=<?php echo $version; ?>"></script>
<script src="assets/js/vendor/respond.js?version=<?php echo $version; ?>"></script>
<script src="assets/js/bootstrap.js?version=<?php echo $version; ?>"></script>
<script src="assets/js/plugins/jquery.validate/jquery.validate.js?version=<?php echo $version; ?>"></script>
<script src="assets/js/plugins/jquery.validate/additional-methods.js?version=<?php echo $version; ?>"></script>
<script src="assets/js/plugins/jquery.validate/localization/messages_es.js?version=<?php echo $version; ?>"></script>
<?php
if( !$basicConfig->isInstalled ){
?>
<script src="views/instalar.js?version=<?php echo $version; ?>"></script>
<?php
} else if( $usuario==null ){
?>
<script src="views/login.js?version=<?php echo $version; ?>"></script>
<?php
} else {
  if($page!=null) {
    try {
?>
<script src="views/<?php echo $page->archivo ?>.js?version=<?php echo $version; ?>"></script>
<?php
    } catch (Exception $e) {

    }
  }
}
?>
</body>
</html>