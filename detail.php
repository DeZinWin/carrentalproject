<?php
include "config.php";

$sql="SELECT * FROM Location";
$location=array();

if($result=$conn->query($sql)){
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $location[]=$row;
    }
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
    <style>
        th, td{
            width: 250px;
            border: 1px solid;
            padding: 5px;
        }
        tr:nth-child(even){background-color: #f2f2f2;}
        th{
            background-color: MediumSeaGreen;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-primary">You can view location and price</h3>
        <table>
            <thead>
            <tr>
                <th>Location</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($location as $l){
                        echo "<tr>";
                        echo "<td>{$l['city']}</td><td>{$l['price']}</td>";
                        echo "</tr>";
                    }

                ?>
            </tbody>
        </table>
    
        <div>
        <a href="carlisting.php" class="btn btn-info" style="margin-top:18px;width:100px;margin-left:30px;" role="button" >Close</a>
        </div>
        
    </div>
</body>
</html>