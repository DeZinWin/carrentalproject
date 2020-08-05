<?php

include 'config.php';
if(isset($_GET["cartype_id"])){
    $cartypeId=$_GET["cartype_id"];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM carlist where cartype_id='$cartypeId'";
      $myArray = array();
      if ($result = $conn->query($sql)) {
      
          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                  $myArray[] = $row;
          }
          echo json_encode($myArray);
      }
      
      $result->close();
}


?>