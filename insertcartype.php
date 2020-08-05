<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="text-center bg-success" style="margin-bottom:0">
       <h2 style="color:white;">Admin Page</h2>
 
    </div>
    <div class="container pt-10">
    <form action="<?php $_SERVER['PHP_SELF']  ?>" method="post">
        <div class="form-group">
           <label for="name">Car Categories:</label>
           <input type="TEXT" class="form-control" id="name" placeholder="Enter Car Type" name="categories">
        </div>
        <button type="submit" class="btn btn-success">Categories Add</button>
       </div>
    </form>   
</body>
<?php
include 'config.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat=$_POST["categories"];
    $sql="INSERT INTO cartype(Categories)
          VALUES('$cat')";
    if($conn->query($sql)===TRUE)     {
        echo "Insert successfully";
    } else {
      echo "Error creating table: " . $conn->error; 
    }
    $conn->close();      
}    
?>
</html>