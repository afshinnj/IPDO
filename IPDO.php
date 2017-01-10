<?php
/**
 * PDO
 * Afshin nj
 */
class IPDO
{
  public $connect;

  function __construct()
  {
    try {

      $this->connect = new pdo('mysql:host=localhost;dbname=blog','root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      /*** set the error reporting attribute ***/
      $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      # Disable emulation of prepared statements, use REAL prepared statements instead.
      $this->connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
      echo 'Opps, Something bad just happened!' . '<br>';
      echo $e->getMessage();
    }
  }

  public function insert($table = null , $variables = null){

      $fields = array_keys($variables);
      $fieldsvals = array(implode(",", $fields), ":" . implode(",:", $fields));
      $sql = "INSERT INTO $table ($fieldsvals[0]) VALUES ($fieldsvals[1])";
      $result = $this->connect->prepare($sql);
      foreach ($variables as $f => $v) {
          $result->bindValue(':' . $f, $v);
      }
      $result->execute();

  }

  public function select($table = NULL){

  }

}
