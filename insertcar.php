<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include 'createconn.php';
echo 'Connection  Name'.$servername;

$sql="SELECT * FROM cartype";
$cartypeList=array();

if($result=$conn->query($sql)){
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $cartypeList[]=$row;
    }
}
$sql="SELECT * FROM brand";
$brandList=array();

if($result=$conn->query($sql)){
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
        $brandList[]=$row;
    }
}


function uploadFile($fileName){
    $target_dir = "images/";
$target_file = $target_dir . basename($_FILES[$fileName]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  $check = getimagesize($_FILES[$fileName]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES[$fileName]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
    //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    return $_FILES[$fileName]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
  $fileName= uploadFile("photo");
  $name=$_POST["name"];
  $seat= $_POST["seat"];
  $model=$_POST["model"];
  $type=$_POST["cartype"];
  $brand=$_POST["brand"];
  saveItem($name,$seat,$fileName,$model,$type,$brand);
  }
  function saveItem($carname,$seatno,$photo,$model,$cartype,$brand){
     global $conn;
    $sql = "insert into carlist(CarName,SeatNo,Image,Model,cartype_id,brand_id) values(?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssis", $carname,$seatno,$photo,$model,$cartype,$brand);

// set parameters and execute

$stmt->execute();
$conn->close();
}
?>
    
<div class="container" style="margin-top:30px">
  
  <form action="<?php $_SERVER['PHP_SELF']  ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Car Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter Car Name" name="name">
    </div>
    <div class="form-group">
      <label for="seat">SeatNo:</label>
      <input type="text" class="form-control" id="seat" placeholder="Enter seat number" name="seat">
    </div>
    <div class="form-group">
      <label for="photo">Photo:</label>
      <input type="file" class="form-control" id="photo"  name="photo" />
    </div>
    <div class="form-group">
      <label for="photo">Model:</label>
      <input type="text" class="form-control" id="model"  name="model" />
    </div>
    <div class="form-group">
      <label for="type">Car type:</label>
      <select class="form-control" id="cartype" name="cartype" style="width:350px;height=50px">
      <option>Select Car Type</option>
      <?php
       if(count($cartypeList)>0){
         foreach($cartypeList as $ct){
           echo "<option value='".$ct['id']."'>{$ct['Categories']}</option>";
         }
       }
      ?>
      </select>
    </div>
    <div class="form-group">
      <label for="type">Brand Id:</label>
      <select class="form-control" id="brand" name="brand" style="width:350px;height=50px">
      <option>Select Brand Name</option>
      <?php
       if(count($brandList)>0){
         foreach($brandList as $bl){
           echo "<option value='".$bl['id']."'>{$bl['CompanyBrand']}</option>";
         }
       }
      ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  
</div>
</body>
</html>