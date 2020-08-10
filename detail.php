<?php
include "config.php";

$sql="SELECT * FROM Location";
$location=array();

if($result=$conn->query($sql)){
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $location[]=$row;
    }
}
if(!empty($_POST["L_id"])){
   
    $sql= "SELECT price FROM Location WHERE L_id=".$_POST['L_id'].";";
   //$price=array();
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();   
    
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
<body>
    <div class="container">
        <h2 class="text-primary">Choose Your Location</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <lable>City:</lable>
            <select id="locationId" name="location" style="width: 350px; height: 50px;">
                <option>Select Location</option>

                <?php
                if(count($location)>0){
                    foreach($location as $l){
                        echo "<option value='".$l['L_id']."'>{$l['city']}({$l['price']})</option>";
                    }
                }

                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" value="<?php echo $row['price'];?>" name="price" style="width: 350px; height: 50px;">
        </div>
        <div class="form-group">
            <button type="submit" name="order" class="btn btn-primary">Order</button>
            
        </div>
        </form>
    </div>
</body>
</html>