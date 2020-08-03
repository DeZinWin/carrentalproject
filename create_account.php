<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body style="background-image: url('Picture/family-road-trip.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <h2>Create Account</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="usr">User Name:</label>
            <input type="text" class="form-control" id="usr" name="username" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <label for="ph">Phone:</label>
            <input type="text" class="form-control" id="ph" name="phone" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password" style="width: 350px; height: 50px;">
        </div>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    </div>
    
    <?php
    if(isset($_POST['register'])){
        $name=$_POST["username"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $pwd=$_POST["password"];
        
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "car_system";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $sql = "INSERT INTO Register (Username,Phone,Email,Password)
        VALUES ('$name','$phone','$email','$pwd')";
    
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