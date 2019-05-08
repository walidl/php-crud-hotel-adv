<?php


if ( $_POST["id"] &&
     $_POST["name"] &&
     $_POST["lastname"]){

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

  $id = $_POST["id"];
  $name = $_POST["name"];
  $lastname = $_POST["lastname"];

  $sql = "
          UPDATE paganti
          SET name = '$name', lastname = '$lastname'
          WHERE id = $id
        ";

  $result = $conn->query($sql);
  $conn->close();

}
 ?>
