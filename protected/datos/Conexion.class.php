<?php  
require_once(dirname(__FILE__).'/../config/dataConstants')

class Conexion{
  
  private static $instacia;
  private $dbhost;
  private $dbuser;
  private $dbpass;
  private $dbname;
  private $conn;
  public $username='anónimo';
//En el constructor de la clase establecemos los parámetros de conexión con la base de datos

  private function __construct($dbuser = _db_username, $dbpass = _db_password, $dbname = _db_dbName, $dbhost = _db_host.':'._db_port){
    $this->dbhost = $dbhost;
    $this->dbuser = $dbuser;
    $this->dbpass = $dbpass;
    $this->dbname = $dbname;
  }

//El método abrir establece una conexión con la base de datos

  public function open() {
    $this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass,$this->dbname);
    mysqli_set_charset($this->conn, "utf8");
    if (mysqli_connect_errno()) {
      die('Error al conectar con mysql');
    } else{
      
    }

  }

//El método "consulta" ejecuta la sentencia select que recibe por parámetro "$query" a la base de datos y devuelve un array asociativo con los datos que obtuvo de la base de datos para facilitar su posteiror manejo.

  public function select($query){
    $result = mysqli_query($this->conn,$query);
    if (!$result) {
      throw new Exception('Error query BD:' . mysqli_error($this->conn).' - consulta: '.$query);
    }
    return $result;
  }

  public function selectOne($query) {
    $result = $this->consulta($query);
    while ($row = $result->fetch_object()) {
      return $row;
    }
    return $row;
  }

  public function selectList($query) {
    $result = $this->consulta($query);
    $datos = array();
    while ($row = $result->fetch_object()) {
      $datos[] = $row;
    }
    return $datos;
  }

//La función sql nos permite ejecutar una senetencia sql en la base de datos, se suele utilizar para senetencias insert y update.

  public function sql($sql){
    try {
      if(mysqli_query($this->conn,$sql)){
        //echo $sql;
        return $this->id();
      } else {
        throw new Exception('Error query BD:' . mysqli_error($this->conn).' - sql: '.$sql);
      }
    } catch (Exception $e) {
      throw new Exception($e->getMessage(), $e->getCode());
    }
  }

  public function insert($insert) {
    try {
      $this->sql($insert);
      return $this->id();
    } catch (Exception $e) {
      throw new Exception($e->getMessage(), $e->getCode());
    }
  }

//La función id nos devuelve el identificador del último registro insertado en la base de datos

  public function id(){
    return mysqli_insert_id($this->conn);
  }

//La función "cerrar" finaliza la conexión con la base de datos.

  public function cerrar(){
    mysqli_close($this->conn);
  }

//La función 'escape' escapa los caracteres especiales de una cadena para usarla en una sentencia SQL

  public function escape($value){
    return mysqli_real_escape_string($this->conn,$value);
  }
  
//La función para obtener el singleton
  public static function getInstance(){
    if(!isset(self::$instacia)){
      $miClase = __CLASS__;
      self::$instacia= new $miClase;
    }
    return self::$instacia;
  }


//Evitar que el objeto sea clonado

  public function __clone(){
    trigger_error("No está permitido clonar este objeto",E_USER_ERROR);
  }
}
?>
