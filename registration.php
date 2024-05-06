<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'connect.php';
    $username=$_POST['username'];
    $mobileno=$_POST['mobileno'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $password=$_POST['password'];


    $sql="insert into registration(username,mobileno,address,age,email,password)values('$username','$mobileno','$address','$age',' $email','$password')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo"data inserted successfully";
    }
    else{
        die(mysqli_error($con));
    }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <title>Registration page</title>
</head>


<body>
    
   <div class="content">
    <div class="icon">
        <h2 class="logo"></h2>
    </div>
    <h1>

    PAW<span>
    <a href="#"><ion-icon name="paw-sharp"></ion-icon></a>
    sitive</span>ALLY</h1>
   </div>
    <div class="form"  >
           <h2>Registration Form </h2>
           <form action="registration.php" method="post">
           <input type="name" name="username" placeholder="Enter  Name">
           <input type="Mobile number" name="mobileno" placeholder="Enter  Mobile Number">
           <input type="Address" name="address" placeholder="Enter  Address">
           <input type="age" name="age" placeholder="Enter  Age">
           <input type="email" name="email" placeholder="Enter Email">
           

           

           <input type="password" name="password" placeholder="Create Password">
           
           <button type="submit" class="btnn">Register</button>
   
           <p class="link">Already have an account?<br>
               <a href="login1.html">Log In</a> here</a>
           </p>

           </form>
           <!-- <p class="liw">Log in with</p>

           <div class="icons">
               <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
               <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
               <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
               <a href="#"><ion-icon name="logo-google"></ion-icon></a>
               <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
           </div> -->
       </div>

       <!-- <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script> -->



        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>