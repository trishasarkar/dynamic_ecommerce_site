<?php require 'connection.php' ?>
<?php 
   
     if(isset($_SESSION["email"]))  
     {  
        header("location:home.php");     
     }    
        // if(empty($_POST["email"]) || empty($_POST["password"]))  
        // {  
        //     echo '<script>alert("Enter all the required Fields")</script>';  
        // }  
        if(isset($_POST["email"]))    
        {  
          // $email=$_POST["email"];
          // if(filter_var($email, FILTER_VALIDATE_EMAIL)==FALSE) {
          //   echo '<script>alert("Invalid email")</script>'; 
          //        }
            $email = mysqli_real_escape_string($connect, $_POST["email"]);
            $password = mysqli_real_escape_string($connect, $_POST["password"]);
            $re_password = mysqli_real_escape_string($connect, $_POST["re_password"]);
            
            if($password == $re_password)
            {

            $query = "INSERT INTO user(email, password) VALUES('$email','$password')";  
                if(mysqli_query($connect, $query))  
                {  
                    echo '<script>alert("Registration Done, Enjoy Shopping.")</script>';  
                    $_SESSION["email"] = $email;
                    header('location:home.php');
                }  
            }
            else
            {
            echo '<script>alert("Passwords dont Match")</script>';  
            }
        }  
    
    ?>

<Html>
<head>
<title>
SignUp Page
</title>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

.signupbtn {
   width: 100%;
}

.container {
  padding: 16px;
}

</style>

</head>
<body>


          <form name="Signupform" method="Post" style="border:1px solid #ccc">
          <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <p>Already a user?<a href="login.php"><u>Login Now</u></a></p>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="example@mailclient.com" id="email"  name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password"  name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="psw" required>

            <label for="psw-repeat"><b>Re-enter Password</b></label>
            <input type="password" placeholder="Repeat Password" name="re_password"  id="psw-repeat"  required>
            
           
            <p>By creating an account you agree to our <a href="terms.html" style="color:dodgerblue">Terms & Conditions</a>.</p>

            <div>
              <button type="submit" value="SignUp" name="reg" class="signupbtn">Sign Up</button>
            </div>
          </div>
        </form>

</body>
</Html>

                