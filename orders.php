<?php
include "createconn.php";

$sql="SELECT * FROM location";
$location=array();

if($result=$conn->query($sql)){
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $location[]=$row;
    }
}
$loc=array();
if(isset($_GET["id"])){
   
 
$sqql="SELECT * FROM carlist WHERE id=".$_GET["id"].";";
        $loc=array();

      if($result=$conn->query($sqql)){
          while($row=$result->fetch_array(MYSQLI_ASSOC)){
          $loc[]=$row;
       }
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
    //$locationid=$_POST['location'];
    //$totalprice=$city*$days;
    // $carId=0;
   /* if(isset($_GET["id"])){
        $carId=$_GET["id"];
        
    }  */ 

    $sql="SELECT * FROM Location WHERE L_id=".$_POST['location'].";";
    $locationlist = array();
      if ($result = $conn->query($sql)) {
      
          while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $locationlist[] = $row;
          }
         // echo json_encode($locationlist);
        }
        foreach($locationlist as $list){
           $locationId=$list['L_id'];
           $price=$list['price'];
           $city=$list['city'];
        }
        $totalprice=$price*$days;
        $carId=$_POST["carid"];

        /*$sqql="SELECT * FROM carlist WHERE id=$carId";
        $loc=array();

      if($result=$conn->query($sqql)){
          while($row=$result->fetch_array(MYSQLI_ASSOC)){
          $loc[]=$row;
       }
      }*/
      

        $sql="INSERT INTO orders(FullName,PhoneNo,Date,TotalPrice,carlist_id,location_id)
              VALUES('$name','$phone','$starttoend',$totalprice,$carId,$locationId)";
        if($conn->query($sql)===TRUE)     {
            echo "Insert successfully";
        } else {
          echo "Error creating table: " . $conn->error; 
        }       
        
       //function function_alert($city,$day,$price){
      //echo '<script>alert("Order Confirmed\nLocation:'{$city}'\nDays:'{$days}'\nYour Costs:'{$totalprice}''");</script>';
        echo '<script>';
        echo "alert(\"Order Confirmed\\nLocation:\\t$city\\nDays:\\t$days\\nYour Costs:\\t$totalprice\")";
        echo "</script>";
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
<body style="background-color:lavender">
<div class="container">
<div class="row">
    <div class="col-sm-5">
    <h2>Order</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <input type="hidden" id="carId" name="carid" value="<?php echo $_GET["id"]; ?>" />
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
                        echo "<option value='".$l['L_id']."'>{$l['city']}</option>";
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
    <div class="col-sm-7">
      <?php foreach($loc as $c){ ?>
      <p class="pt-5"> <img width='400' height='250' src="images/<?php echo $c['Image'];?>"></p>
      <?php }?>
    </div>
</div>
</div>
</body>
</html>