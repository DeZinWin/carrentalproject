<?php
include "config.php";

$sql="SELECT * FROM location";
$location=array();

if($result=$conn->query($sql)){
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $location[]=$row;
    }
}

if(isset($_POST['order'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $start=strtotime($_POST['start']);
    $end=strtotime($_POST['end']);
    $starttoend=date("Y-m-d",$start)."to" .date("Y-m-d",$end);
    echo $starttoend;
    echo "<br>";
    $interval=$end-$start;
    $days=floor($interval/(60*60*24));
    $city=$_POST['location'];
<<<<<<< HEAD

=======
    $totalprice=$city*$days;

    
    //$sql="INSERT INTO orders(FullName,PhoneNo,Location,Date,TotalPrice)
          //VALUES($name,$phone,$city,$starttoend,$totalprice)"
    echo $totalprice;
>>>>>>> 6944ee19d89d3d5ce555c0ed94d7c49952acf0ec
   
}

?>


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
<body style="background-image:url('travel-car.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
    <h2>Order</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="name" class="text-danger" style="font-size: 20px;">Full Name:</label>
            <input type="text" class="form-control" id="name" name="name" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <label for="ph" class="text-danger" style="font-size: 20px;">Phone No:</label>
            <input type="text" class="form-control" id="ph" name="phone" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <label for="sdate" class="text-danger" style="font-size: 20px;">Start Date:</label>
            <input type="date" class="form-control" id="sdate" name="start" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <label for="edate" class="text-danger" style="font-size: 20px;">End Date:</label>
            <input type="date" class="form-control" id="edate" name="end" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <lable class="text-danger" style="font-size: 20px;">Location:</lable>
            <select id="locationId" class="form-control" name="location" style="width: 350px; height: 50px;">
                <option>Select Location</option>

                <?php
                if(count($location)>0){
                    foreach($location as $l){
                        echo "<option value='".$l['price']."'>{$l['city']}</option>";
                    }
                }else{
                    echo "no location";
                }

                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="order" class="btn btn-primary">Order Confirm</button>
        </div>
    </form>
    </div>
</body>
</html>