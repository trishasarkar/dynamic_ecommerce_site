<?php require 'connection.php' ?>
<?php  
 
 if(isset($_SESSION["email"]))  
 {  
      header("location:home.php");  
 }   
    // if(empty($_POST["email"]) || empty($_POST["password"]))  
    // {  
    //     echo '<script>alert("Both Fields are required")</script>';  
    // }  
    if(isset($_POST["email"]))  
    {  
        $email = mysqli_real_escape_string($connect, $_POST["email"]);  
        $password = mysqli_real_escape_string($connect, $_POST["password"]);  
        $query = "SELECT * FROM user WHERE email = '$email' and password = '$password'";  
        $result = mysqli_query($connect, $query);  
        if(mysqli_num_rows($result) > 0)  
        {  
            while($row = mysqli_fetch_array($result))  
            {  
               
                  if($password = $row["password"])  
                    {
                        if($email = $row["email"])  
                        {
                            //return true;
                            $_SESSION["email"] = $email;  
                            header("location:home.php");  
                        }
                        else{
                            //return false;
                            echo '<script>alert("Wrong username or password.")</script>';  
                        }
                    }  
                    else  
                    {  
                        //return false;  
                        echo '<script>alert("Wrong username or password.")</script>';  
                    }  
            }  
        }  
        else  
        {  
            echo '<script>alert("Wrong username or password.")</script>';  
        }  
    }    
 ?>  


<Html>
<head>
<title>
Login Page
</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 25%;
}


</style>

</head>
<body>
 
    
    <h2>Login Form</h2>
    <p>Not a user?<a href="signup.php">Sign up</a></p>
      <form method="post" name="Loginform">
      <div class="imgcontainer">
        <img src="image/avatar.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Username" id="email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="psw" required>
            
        <button type="submit" value="Login">Login</button>
        
      </div>

</form>

</body>
</Html>


                