<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('Picture/family-road-trip.jpg'); background-size: cover; background-repeat: no-repeat;">
<?php
    require('config.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `account` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user cartype page
            header("Location: cartype.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="container">
    <form class="form" method="post" name="login">
        <h2 class="login-title">Please Login with Your Account</h2>
        <div class="form-group">
            <input type="text" style="width: 350px; height: 50px;" class="form-control" name="username" placeholder="Username" autofocus="true"/>
        </div>
        <div class="form-group">
            <input type="password" style="width: 350px; height: 50px;" class="form-control" name="password" placeholder="Password"/>
        </div>
        <div class="form-group">
            <a href="cartype.php" class="btn btn-info" role="button">Login</a>
        </div>
        <p class="link"><a href="create_account.php">New Registration</a></p>
    </form>
    </div>
<?php
    }
?>
</body>
</html>
