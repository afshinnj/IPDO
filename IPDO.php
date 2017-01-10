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

  public function insert(){
     $statement = $this->connect->prepare("INSERT INTO `post` (`title`, `text`) VALUES (:title , :text)");
     $statement->bindValue(':title', 'تتتثقصف');
     $statement->bindValue(':text', 'user2');
     $statement->execute();

  }


}
