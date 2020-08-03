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
            <div style="border:1px solid lavenderblush">
                <p style="font-size:20px;" class="p-1"><i class="fa fa-car" style="color:#ff8000;font-size:25px"></i><span class="pl-2"><b>Find Your Car</b></span></p>
                <select style="width:200px;" class="bg-light">
                 <option>H</option>
                <select>
                <br><br>
                <button style="width:200px" class="btn-warning"><i class="fa fa-search"></i>Search Car</button>
            </div>
            <br><br>
            <div style="border:1px solid lavenderblush">
               <p style="font-size:20px;" class="p-1"><i class="fa fa-car" style="color:#ff8000;font-size:25px"></i><span class="pl-2"><b>Listed Cars</b></span></p>
               <button style="width:200px;background-color:#ff8000;">Family Cars</button>
               <button style="width:200px;background-color:#ff8000;">Cars for two peoples</button>
               <button style="width:200px;background-color:#ff8000;">Express Cars</button>
            </div>
         </div>
         <div class="col-sm-8">
         </div>
       </div>
    </div>
</div>
</body>
</html>