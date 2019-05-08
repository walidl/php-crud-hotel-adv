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
            SELECT address
            FROM paganti
            WHERE id = $id
          ";
    // echo $sql; die();

    $result = $conn->query($sql);
    // var_dump($result); die();

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        // var_dump($row); echo "<br>" ;
        $res[] = $row;

      }
    } else {
      echo "0 results";
    }

    $conn->close();

    echo json_encode($res);

  }


 ?>
