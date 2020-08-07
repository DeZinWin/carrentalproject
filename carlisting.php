<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
    .clearfix::after {
       content: "";
       clear: both;
       display: table;
    }
  </style>
  <script>
     $(document).ready(function(){
        $("#cartypeId").change(function(){
            if($("#cartypeId").val()!=""){
                var cartypeId=this.value;
            
            $.get("type.php?cartype_id="+cartypeId, function(data, status){
              var carList=JSON.parse(data);  
            
              $("#cars").empty();
            carList.forEach(function(val,i){
            $("#cars").append(
               '<div class="clearfix" style="background-color:whitesmoke;padding:10px 10px">' 
               +'<img src=\"images/'+val.Image+'\"class="float-left" width="260" height="200"> '
               +'<div class="float-left" style="padding-left:15px">'
               +'<h3>'+val.CarName+'</h3>'
               +'<p style="padding-top:15px">'+'<i class="fa fa-user" style="font-size:17px;color:blue"></i>&nbsp;'+val.SeatNo+'<span style="padding-left:35px">'+'<i class="fa fa-calendar" style="font-size:17px;color:blue"></i>&nbsp;'+val.Model+'</span></p>'
               +'<a href="detail.php" class="btn btn-primary" style="margin-top:18px;width:150px" role="button" >View Details</a>'
               +'<a href="orders.php?id='+val.id+ '"class="btn btn-primary" style="margin-top:18px;width:150px;margin-left:30px;" role="button" >Order</a>'
               +'</div>'
               +'</div>'
               +'<br>'
            );
        });
     });
            }
            
        
            });

            $("#searchbrand").change(function(){
              if($("#searchbrand").val()!=""){
                var brandId=this.value;
            
            $.get("branded.php?brand_id="+brandId, function(data, status){
              var brandList=JSON.parse(data);  
              $("#brandedcars").empty();
             
            brandList.forEach(function(val,i){
            $("#brandedcars").append(
               '<div class="clearfix" style="background-color:whitesmoke;padding:10px 10px">' 
               +'<img src=\"images/'+val.Image+'\"class="float-left" width="260" height="200"> '
               +'<div class="float-left" style="padding-left:15px">'
               +'<h3>'+val.CarName+'</h3>'
               +'<p style="padding-top:15px">'+'<i class="fa fa-user" style="font-size:17px;color:blue"></i>&nbsp;'+val.SeatNo+'<span style="padding-left:35px">'+'<i class="fa fa-calendar" style="font-size:17px;color:blue"></i>&nbsp;'+val.Model+'</span></p>'
               +'<a href="details.php" class="btn btn-primary" style="margin-top:18px;width:150px" role="button" >View Details</a>'
               +'<a href="order.php" class="btn btn-primary" style="margin-top:18px;width:150px;margin-left:30px;" role="button" >Order</a>'
               +'</div>'
               +'</div>'
               +'<br>'
            );
        });
            
     });
            }
            

            });  

     });        
  </script>
  <?php
   include 'createconn.php';
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
  $sql="SELECT * FROM cartype";
  $brandarr=array();
                
  if ($result = $conn->query($sql)) {
                    
   while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $brandarr[] = $row;
   }
 } 
 ?>
 <?php
   include 'createconn.php';
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
  $sql="SELECT * FROM brand";
  $companyarr=array();
                
  if ($result = $conn->query($sql)) {
                    
   while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $companyarr[] = $row;
   }
 } 
 ?>
 <?php
   /*include 'createconn.php';
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   if(!empty($_POST["searchbrand"])){
    $sql="SELECT * FROM carlist WHERE brand_id=".$_POST['searchbrand'].";";
    $brandlist=array();
    if($result=$conn->query($sql)){
      while($row=$result->fetch_array(MYSQLI_ASSOC)){
         $brandlist[]=$row;
      }
    }
    
  }*/
 
 ?>
 
 

</head>
<body>
<div class="text-center" style="margin-bottom:0">
    <nav class="navbar navbar-expand-sm bg-dark">
      <ul class="navbar-nav" style="padding-left:25px">
         <li class="nav-item">
           <a class="nav-link" href="about.php">HOME</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" href="">ABOUT AS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#list" data-toggle="collapse">CAR LISTING</a>
        </li>
      </ul>
    </nav>
</div>
<br>
<div id="list" class="collapse show">
    <div class="container-fluid">
       <div class="row">
         <div class="col-sm-4 pl-5">
            <div>
                <p style="font-size:20px;" class="p-1"><i class="fa fa-car" style="color:#ff8000;font-size:25px"></i><span class="pl-2"><b>Find Your Car</b></span></p>
                <select name="searchbrand" id="searchbrand" style="width:200px;" class="bg-light">
                 <option>Select Brand</option>
                <?php
                  if(count($companyarr)>0){
                   foreach($companyarr as $c){
                     echo "<option value='".$c['id']."'>{$c['CompanyBrand']}</option>";
                   }
                  }
                ?>
                <select>
                <br><br>
                <button style="width:200px" class="btn-warning" onclick="show()"><i class="fa fa-search"></i>Search Car</button>
            </div>
            <br><br>
            <div>
               <p style="font-size:20px;" class="p-1"><i class="fa fa-car" style="color:#ff8000;font-size:25px"></i><span class="pl-2"><b>Listed Cars</b></span></p>
               
               <select id="cartypeId" style="width:200px;" class="bg-light">
                 <option>Select CarType</option>
              <?php
                if(count($brandarr)>0){
                foreach($brandarr as $a){
                   echo "<option value='".$a['id']."'>{$a['Categories']}</option>";
                 }
                }
              ?>
             </select>
                
             
               <!--<button style="width:200px;background-color:#ff8000;">Cars for two peoples</button>
               <button style="width:200px;background-color:#ff8000;">Express Cars</button>-->
            </div>
         </div>
         <div class="col-sm-8">
          <div id="cars">
             
          </div>
          <div id="brandedcars">
            
          </div>
         </div>
       </div>
    </div>
</div>
</body>
</html>
<?php
   /*include 'config.php';
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT * FROM cartype";
  $brandarr=array();
  // $brandarr[]=array();
  if ($result = $conn->query($sql)) {
      
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $brandarr[] = $row;
    }
    
  } 
  $length=count($brandarr);
  echo $length;
  foreach($brandarr as $a){
              
    echo $a['Categories'];
    }
  $conn->close();*/
?>