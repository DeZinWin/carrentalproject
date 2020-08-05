<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('Picture/family-on-road-trip.jpg'); background-size: cover; background-repeat: no-repeat;">
<?php
    require('config.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $query    = "INSERT into `account` (username, password, email)
                     VALUES ('$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='create_account.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="container">
    <form class="form" action="" method="post">
        <h2 class="login-title">Create Account</h2>
        <div class="form-group">
            <input type="text" style="width: 350px; height: 50px;" class="form-control" name="username" placeholder="Username" required />
        </div>
        <div class="form-group">
            <input type="text" style="width: 350px; height: 50px;" class="form-control" name="email" placeholder="Email Adress">
        </div>
        <div class="form-group">
            <input type="password" style="width: 350px; height: 50px;" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Register" class="btn btn-info">
        </div>
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
</div>
<?php
    }
?>
</body>
</html>