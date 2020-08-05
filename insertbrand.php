<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

    Company Brand Name:
    <br>
    <input type="text" name="brandname">
    <br>
    <input type="submit" name="submit" value="submit">
</form>    

</body>
</html>
<?php
   include 'config.php';
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $brand_name=$_POST["brandname"];
        
        $sql="INSERT INTO brand(CompanyBrand)
             VALUES('$brand_name')";

        if($conn->query($sql)===TRUE)     {
            echo "Insert successfully";
        } else {
          echo "Error creating table: " . $conn->error; 
        }
        $conn->close();
    } 
?>
