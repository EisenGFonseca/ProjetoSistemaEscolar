<?php
  define('DB_SERVER', 'localhost');
  define('DB_USER', 'EisenFonseca');
  define('DB_PASSWORD', 'warmachine2');
  define('DB_NAME', 'fop_db');


  if (isset($_GET['term'])){
    $return_arr = array();
    try {
      $conn = new PDO("mysql:host=".DB_SERVER.";port=8889;dbname=".DB_NAME, DB_USER, DB_PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare('SELECT alu_nome FROM aluno WHERE alu_nome LIKE :term AND alu_situacao <> "Matriculado"');
      $stmt->execute(array('term' => '%'.$_GET['term'].'%'));

      while($row = $stmt->fetch()) {
        $return_arr[] =  $row['alu_nome'];
      }

    }
    catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
    }

    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
  }
?>
