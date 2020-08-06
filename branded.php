<?php

include 'createconn.php';
if(isset($_GET["brand_id"])){
    $brandId=$_GET["brand_id"];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM carlist where brand_id='$brandId'";
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