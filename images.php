<?php
// Create database connection
$db = mysqli_connect("localhost", "root", "", "agriculture");

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['insert'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($db, 'Item');

    // image file directory
    $target = "sell_images/".basename($image);

    $sql = "INSERT INTO images (name, image) VALUES ('$image_text','$image')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
         echo '<script>alert("Data & image insertion successfull")</script>';
         echo("<script>windows: location='farmerhome.php'</script>");
    }else{
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($db, "SELECT * FROM images");


?>


 <!DOCTYPE html>  
 <html>  
       
             <meta name="viewport" content="width=device-width, initial-scale=1">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <head>  
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        .topnav {
            overflow: hidden;
            background-color: #333;
        }
        
        .topnav a {
            float: right;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 18px 17px;
            text-decoration: none;
            font-size: 17px;
            font-weight: bold;
        }
        
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        
        .topnav a.active {
            background-color: #04aa8e;
            color: white;
            float: left;
        }
        
        .topnav .icon {
            display: none;
        }
        
        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {
                display: none;
            }
            .topnav a.icon {
                float: right;
                display: block;
            }
        }
        
        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }
            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
        
        header img {
            width: 100%;
            height: 350px;
        }
        
        #first h2 {
            color: goldenrod;
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        
        #first {
            font-size: 20px;
            padding: 20px;
            text-align: center;
        }
        
        #footercontainer {
            display: flex;
            text-align: center;
            background-color: rgb(173, 163, 163);
            height: auto;
            padding: 30px;
        }
        
        #footercontainer div {
            flex: 1;
        }
        
        #footercontainer div h4 {
            font-weight: bold;
        }
        
        .fa-google {
            color: black;
            background-color: white;
            width: 40px;
            height: 40px;
            padding-top: 7px;
            border-radius: 50%;
        }
        
        .fa-instagram {
            color: black;
            background-color: white;
            width: 40px;
            height: 40px;
            padding-top: 7px;
            border-radius: 50%;
        }
        
        .fa-pinterest {
            color: black;
            background-color: white;
            width: 40px;
            height: 40px;
            padding-top: 7px;
            border-radius: 50%;
        }
        
        .fa {
            font-size: 30px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
        }
        
        #footercontainer h2 {
            color: black;
        }
        
        #footercontainer div li {
            list-style: none;
        }
    </style>         
 </head>  
      <body> 
           <section id="header">
        <div class="topnav" id="myTopnav">
            <a href="farmerhome.php" class="active">HOME</a>
            <a href="logout.php">LOGOUT</a>
            <a href="sell.php">SELL</a>
            <a href="buy.php">BUY</a>
            <a href="mysellings.php">MY ORDERS</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </section> 
      
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Insert more images here</h3>  
                <br> </br>
                    <form method="POST" action="images.php" enctype="multipart/form-data">
                     <input type="file" name="image" id="image" />    
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                  
           </div> 
           </body>
<footer>
           <section id="footercontainer">
        <div style="padding-top: 20px;">
            <img src="pic.ico" style="height: 80px; width: 80px;">
            <div style="padding-top: 20px;">
                <h6>2021 Dalafarm | Best quality farm products.</h6>
                <h6>All rights reserved.</h6>
            </div>

        </div>
        <div style="padding-top: 10px; ">
            <ul>
                <h4>OUR SITES</h4>
                <br> </br>
                <li>
                    <a href="customersignup.html " class="btn " ">signup as customer!</a>
                </li>
                <li>
                    <a href="farmerlogin.html " class="btn " ">signup as farmer</a>
                </li>
                <li>
                    
                </li>
            </ul>
        </div>
        <div style="padding-top: 20px;">
            <div>
                <h4>Social Media</h4>
                <a href="#" class="fa fa-google"></a>&nbsp;&nbsp;
                <a href="#" class="fa fa-instagram"></a>&nbsp;&nbsp;
                <a href="#" class="fa fa-pinterest"></a>
            </div>
        </div>

    </section>
    </footer>  
 </html>