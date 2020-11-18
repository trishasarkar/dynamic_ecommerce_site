<?php require 'connection.php';
 if(!isset($_SESSION["email"])) {
    header("Location: initial.html");
    exit();
}
 ?>

<DOCTYPE html>
    <head>
        <title> My Cart </title>
        <style>
body {
  background-image: url('image/background2.jpg');  
  background-size: cover;
  background-size: 100% 100%;
}
            #order {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width:80%;
                }

                #order td, #order th {
                border: 1px solid #ddd;
                padding: 8px;
        
                }

                #order tr:nth-child(odd){background-color: #f2f2f2;}

                #order th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #696969;
                color: white;
                }

    .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #363636;
  border: none;
  color: white;
  text-align: center;
  font-size: 23px;
  padding: 10px;
  width: 280px;
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
    <?php	
            
            if(isset($_POST['add'])) 
            {
               
                    global $connect;
                    $pid=$_POST["add"];
                    $res= mysqli_query($connect,"SELECT * FROM cart WHERE pid='$pid' ");
                    $row=mysqli_fetch_row($res);
                    $price=$row[2]; //price
                    $pname=$row[1]; //pname
                    $qty=$row[3]; //quantity
                    $qty = $qty + 1;
                    $query = " UPDATE cart SET qty= '$qty' WHERE pid='$pid' ";
                    if(mysqli_query($connect, $query)==FALSE)
                        
                        {
                        echo '<script>alert("Failed to add item to cart. Try again.")</script>';  
                        }
                    }
                    
                if(isset($_POST['remove'])) 
                {

                    global $connect;               
                    $pid=$_POST["remove"];
                    $res= mysqli_query($connect,"SELECT * FROM cart WHERE pid='$pid' ");
                    $row=mysqli_fetch_row($res);
                    $price=$row[2]; //price
                    $pname=$row[1]; //pname
                    $qty=$row[3];
                            
                    if ($qty > 0) {
                        $qty = $qty - 1;
                        $query = " UPDATE cart SET qty= '$qty' WHERE pid='$pid' ";
                        if(mysqli_query($connect, $query)==FALSE)  
                            {  
                            echo '<script>alert("Quantity reduction Failed.")</script>';  
                            }  
                    if ($qty == 0)
            
                        {
                             $query = "DELETE FROM cart WHERE pid='$pid'";
        
                            if(mysqli_query($connect, $query)==FALSE)  
                            { 
                            echo '<script>alert("Failed to delete item from cart. Try again.")</script>';  
                            }  
                        }
                    }   
                    
            }  
                     if(isset($_POST['delete'])) {

                        global $connect;               
                        $pid=$_POST["delete"];
                        $res= mysqli_query($connect,"SELECT * FROM cart WHERE pid='$pid' ");
                        $row=mysqli_fetch_row($res);
                        if (!empty($row))
                        {
                        $price=$row[2]; //price
                        $pname=$row[1]; //pname
                        $qty=$row[3];
                        }

                        // sql to delete a record
                            $query = "DELETE FROM cart WHERE pid='$pid'";
                       
                            if(mysqli_query($connect, $query)==FALSE)  
                               
                                {
                                echo '<script>alert("Failed to delete item from cart. Try again.")</script>';  
                                 }
                            }

                        if(isset($_POST['empty'])){

                            $query = "DELETE FROM cart ";
                       
                            if(mysqli_query($connect, $query))  
                                {  
                                echo '<script>alert("Your cart is about to be emptied!")</script>';  
                                }  
                             else
            
                                {
                                echo '<script>alert("Failed to delete item from cart. Try again.")</script>';  
                                 }
                            }
                        ?>

                                      
                        <table id="order" class="tbl-cart" cellpadding="10" cellspacing="1" align ="center" >

                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:left;">Code</th>
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:right;" width="13%">Price</th>
                        <th style="text-align:center;" width="14%"></th>
                    <?php 

                    $total_quantity=0;
                    $total_price=0;
                    $res = mysqli_query($connect,"SELECT * from cart");
                    if (!empty($res)) { 
                        while ($row=mysqli_fetch_array($res)) {
                            if ($row[3]>0){
                            $item_price = $row[3]*$row[2];

                    ?>      

                            </tr>	
                            <form method="post">
                            <tr>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[0]; ?></td>
                            <td style="text-align:right;"><?php echo $row[3]; ?></td>
                            <td  style="text-align:right;"><?php echo "Rs ".$row[2]; ?></td>
                            <td  style="text-align:right;"><?php echo "Rs ". number_format($item_price,2); ?></td>
                            <td style="text-align:center;">
                                <button type="submit" value="<?php echo $row[0] ?>" name='add'><img src="image/plus.png" width="20" height="20"/></button>
                                <button type="submit" value="<?php echo $row[0] ?>" name='remove'><img src="image/minus.png" width="20"  height="20"/></button>
                                <button type="submit" value="<?php echo $row[0] ?>" name='delete'><img src="image/icon-delete.png" width="20" height="20"/></button></td>
                            </tr>
                            </form>
                                
                            <?php
                            $total_quantity += $row[3];
                            $total_price += ($row[2]*$row[3]);

                            
                        }	
                    } 
                }
                
                else { ?>
                    <div align="center"> Cart is empty! </div> 
                    <a href="home_final.php"> Find more products to add to cart!</a>
                  <?php }

                    ?>

            <tr>
               
                <td colspan="2" align="right" style="color:white">Total:</td>
                <td align="right" style="color:white"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2" style="color:white"><strong><?php echo "Rs ".number_format($total_price, 2); ?></strong></td>
                 <form method="post">
                        <div><button type="submit" name='empty' width="20" height="20" class="button" class="button" style="margin-left:500px; margin-top:20px">Empty Cart!</button></div>
                    </form>    
<br>        
            </tr>
  
            </table>

<div style="position:relative; top:30px; left:300px; bottom:40px";>
<a href="home.php" class="button" class="button" style="vertical-align:middle"><span>Continue Shopping </span></a>
</div>

<div style="position:relative; top:-27px; left:700px; bottom:80px";>
<a href="end.html" class="button" class="button" style="vertical-align:middle"><span>Proceed to checkout</span></a>
</div>


        </body>
        </html>



