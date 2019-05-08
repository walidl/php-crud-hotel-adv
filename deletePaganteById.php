<?php


  if ($_POST["id"]){
    $servername = "localhost";
    $username = "root";
    $password = "taichow";
    $dbname = "prova1";

    // Connect - apertura connession con il server
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection - controlla la connessione
    if ($conn->connect_errno) {
      echo ("Connection failed: " . $conn->connect_error);
      return;
    }
    else {
      // var_dump("ok"); die();
    }

    $id = $_POST["id"];

    $sql = "
            DELETE
            FROM paganti
            WHERE id = $id
          ";
    // echo $sql; die();

    $result = $conn->query($sql);
    // var_dump($result); die();

    $conn->close();

    

  }


 ?>
