<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body style="background-image: url('Picture/family-on-road-trip.jpg'); background-size: cover; background-repeat: no-repeat;">
    
    <div class="container">
        <h2>Please Login with Your Account</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="usr">User Name:</label>
            <input type="text" class="form-control" id="usr" name="username" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password" style="width: 350px; height: 50px;">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        </form>    
    </div>
    <?php
    
    

    ?>
</body>
</html>