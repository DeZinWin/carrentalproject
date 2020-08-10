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
              $("#brandedcars").empty();
            carList.forEach(function(val,i){
            $("#cars").append(
               '<div class="clearfix" style="box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2);background-color:whitesmoke;padding:10px 10px">' 
               +'<img src=\"images/'+val.Image+'\"class="float-left" width="260" height="200" style="box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2)"> '
               +'<div class="float-left" style="padding-left:15px">'
               +'<h3>'+val.CarName+'</h3>'
               +'<p style="padding-top:15px">'+'<i class="fa fa-user" style="font-size:17px;color:blue"></i>&nbsp;'+val.SeatNo+'<span style="padding-left:35px">'+'<i class="fa fa-calendar" style="font-size:17px;color:blue"></i>&nbsp;'+val.Model+'</span></p>'
               +'<a href="detail.php" class="btn btn-dark" style="margin-top:18px;width:150px" role="button" >View Details&nbsp;<i class="fa fa-caret-right" style="font-size:20px;color:white"></i></a>'
               +'<a href="orders.php?id='+val.id+ '"class="btn btn-success" style="margin-top:18px;width:150px;margin-left:30px;" role="button" >Order&nbsp;<i class="fa fa-check-circle" style="font-size:15px"></i></a>'
               +'</div>'
               +'</div>'
               +'<br>'
            );
        });
     });
            }
            
        
            });
     });           
            $(document).ready(function(){
            $("#searchbrand").change(function(){
              if($("#searchbrand").val()!=""){
                var brandId=this.value;
            
            $.get("branded.php?brand_id="+brandId, function(data, status){
              var brandList=JSON.parse(data);  
              $("#cars").empty();
              $("#brandedcars").empty();
             
            brandList.forEach(function(val,i){
            $("#brandedcars").append(
               '<div class="clearfix" style="box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2);padding:10px;background-color:whitesmoke;padding:10px 10px">' 
               +'<img src=\"images/'+val.Image+'\"class="float-left" width="260" height="200"> '
               +'<div class="float-left" style="padding-left:15px">'
               +'<h3>'+val.CarName+'</h3>'
               +'<p style="padding-top:15px">'+'<i class="fa fa-user" style="font-size:17px;color:blue"></i>&nbsp;'+val.SeatNo+'<span style="padding-left:35px">'+'<i class="fa fa-calendar" style="font-size:17px;color:blue"></i>&nbsp;'+val.Model+'</span></p>'
               +'<a href="detail.php" class="btn btn-dark" style="margin-top:18px;width:150px" role="button" >View Details&nbsp;<i class="fa fa-caret-right" style="font-size:20px;color:white"></i></a>'
               +'<a href="orders.php" class="btn btn-success" style="margin-top:18px;width:150px;margin-left:30px;" role="button" >Order&nbsp;<i class="fa fa-check-circle" style="font-size:15px"></i></a>'
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
<?php include 'header.php';?>
<div class="container-fluid">
<div class="jumbotron" style="opacity:0.6;background-image: url('112081.jpg');background-repeat:no-repeat;background-size:cover;height:200px;">
    
     <p style="text-align:center;font-size:30px;color:white;opacity:1">CarListing</p>
     
    </div>
</div>
</div>
<div id="list" class="collapse show">
    
    <div class="container-fluid">
       <div class="row">
         <div class="col-sm-4 pl-5">
            <div style="box-shadow: 0 4px 8px 0;padding:10px 40px;">
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
            <div style="box-shadow: 0 4px 8px 0;padding:20px 40px;">
               <p style="font-size:20px;" class="p-1"><i class="fa fa-car" style="color:red;font-size:25px"></i><span class="pl-2"><b>Listed Cars</b></span></p>
               
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
                
             <br>
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
<?php include 'footer.php';?>
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