<?php require 'connection.php';
 if(!isset($_SESSION["email"])) {
    header("Location: initial.html");
    exit();
}
 ?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            body {
            background-image: url('image/background2.jpg');  
            background-size: cover;
            background-size: 100% 100%;
            }

            body {
            font-family: Arial, Helvetica, sans-serif;
            }

            .navbar {
            overflow: hidden;
            background-color: black;
            border-right:1px solid #bbb;
            }

            .navbar a {
            float: left;
            font-size: 22px;
            color:white;
            text-align: center;
            padding: 10px 20px;
            text-decoration: none;
            margin-left: 40px;
            border-right:1px solid #bbb;
            }

            .navbar a:hover{
            background-color: #BB8FCE;
            border-right:1px solid #bbb;
            }

            .navbar a:active{
            background-color: green;
            border-right:1px solid #bbb;
            }

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #363636;
  border: none;
  color: white;
  text-align: center;
  font-size: 18px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

    </style>
    </head>

    <body>
        <h1 style="margin-top: 30px; margin-bottom:20px; text-align: center; color: white; font-size:50px"><i>Glamify</i></h1> 
            <div class="logout_button" align="right">
            <form action="logout.php">
                <button type="submit" value="Logout" class="button" class="button">Logout</button>
            </form>
        </div>
               
        <div class="navbar">
        <a href="home.php">Home</a>
        <a href="brands.php">Brands</a>
        <a href="categories.html">Categories</a>
        <div class="cart_button" align="right">
            <form action="cart.php">
            <button type="submit" value="View Cart" class="button" class="button">View Cart</button>
            </form>
        </div>
        </div>

        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
   
            </ol>

                <div class="carousel-inner">

                    <div class="item active">
                        <a href="mac.php"><img src="image/Mac.jpg" alt="MAC" width="1500" height="50">
                    </div>

                    <div class="item">
                        <a href="lakme.php"><img src="image/lakme.jpg" alt="Lakme" width="1500" height="50">
                    </div>
    
                    <div class="item">
                        <a href="may.php"><img src="image/Maybelline.jpg" alt="Maybelline" width="1500" height="50">
                    </div>

                    <div class="item">
                        <a href="nyx.php"><img src="image/nyx.jpg" alt="Nyx" width="1500" height="50">
                    </div>
  
                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </body>
</html>