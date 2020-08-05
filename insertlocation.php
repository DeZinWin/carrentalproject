<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body style="background-image: url('Picture/photo1.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <h2>Location</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="city" class="text-light">Location</label>
            <input type="text" class="form-control" name="location" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <label for="price" class="text-light">Price</label>
            <input type="text" class="form-control" name="price" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <button type="submit" name="order" class="btn btn-primary">Add Location</button>
            
        </div>
        </form>
    </div>

    <?php

    if(isset($_POST['order'])){
        $location= $_POST['location'];
        $price= $_POST['price'];

        require_once "config.php";
    
        $sql = "INSERT INTO Location (city,price)
        VALUES ('$location','$price')";
    
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();

    }
    
    ?>
</body>
</html>