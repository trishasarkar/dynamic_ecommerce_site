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
  <link href="styling.css" type="text/css" rel="stylesheet" />

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

    
<a href="face.php"><img src="image/face.png" width="250px" height="270" style="margin-left: 60px; margin-top: 40px"></a>
<a href="eye.php"><img src="image/eye.png" width="250px" height="270" style="margin-left: 50px; margin-top: 40px"></a>
<a href="lip.php"><img src="image/lip.png" width="250px" height="270" style="margin-left: 50px; margin-top: 40px"></a>
<a href="shadow.php"><img src="image/shadows.png" width="250px" height="270" style="margin-left: 50px; margin-top: 40px"></a>

    <h1 style="text-align: center; color:white">Lip Tints</h1>
    <p style="margin-left: 680px; color:white; font-size:18px">



  <?php
      
      if(isset($_POST['update'])) 
      {
        $pid=$_POST["update"];
        $res= mysqli_query($connect,"SELECT * FROM product WHERE pid='$pid' ");
        $row=mysqli_fetch_row($res);
        $price=$row[3]; //price
        $pname=$row[1]; //pname
      
        $create = "CREATE TABLE IF NOT EXISTS cart (pid INT PRIMARY KEY, pname VARCHAR(255) NOT NULL, price INT NOT NULL,qty INT)";
        if (mysqli_query($connect, $create)) 
        {

            global $connect;
            $result = mysqli_query($connect,"SELECT * FROM cart WHERE pid = '$pid' ");
            $res1=mysqli_fetch_row($result);
            if($res1) 
            {
              
              $q=$res1[3];
              $q = $q + 1;
              $query = " UPDATE cart SET qty= '$q' WHERE pid='$pid' ";
              if(mysqli_query($connect, $query)==FALSE)  
                  {  
                  echo '<script>alert("Failed to add item to cart. Try again.")</script>';  
                  } 

            } 
            else {

                  //Implies adding first time to cart
            $query = "INSERT INTO cart (pid,pname,price,qty) VALUES('$pid','$pname','$price','1')"; 
            if(mysqli_query($connect, $query)==FALSE)  
                  {
                  echo '<script>alert("Failed to add item to cart. Try again.")</script>';  
                  }
              }
        } 
        else 
        {
              echo "Error creating table: " . mysqli_error($connect);
        }
      }   

    ?>


      
    <?php

        $product= mysqli_query($connect,"SELECT * FROM product WHERE cat='lip' ");
        
      if (!empty($product)) 
      { 
        while ($row=mysqli_fetch_array($product)) 
          {
        
    ?>


      <form method="post">
        <div class="product-item">
            <div class="product-image">
                <img src ="<?php echo $row["image"];?>" width="170px" height="210px" style="margin-left: 80px"><br>
                <p ><?php echo $row["pname"]; ?>
                <p class="price"><?php echo "Rs".$row["price"]; ?></p>
               
                <div class="cart-action"><button type="submit" value="<?php echo $row["pid"] ?>" class="btnAddAction" name="update">Add to Cart</button></div>
              </div>
            </div>
        </div>
        
        </form>
        </div>
        <?php
    	  }
    } 
  else 
  {
  echo "No Records.";

	}
	?>

</div>
</body>
</html>