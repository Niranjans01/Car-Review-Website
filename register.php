<?php
require("actions/user.php");
if(isset($_SESSION['uid']))
{
  header("location:actions/userhome.php");
}
if(isset($_SESSION['aid']))
{
  header("location:adminpannel.php");
}
if (isset($_GET['existalready']) && $_GET['existalready']=='userexist')
  {
    echo "<script> alert('Username already exist try different')</script>";
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>EcoPal cars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="CSS/makeups.css">
</head>
<body>
    <header>
 <ul>
  <li><a href="index.php">Home</a></li>
  <li><a class="active" href="register.php">Register now!!!</a></li>
  <li style="float:right"><a href="login.php">Log In</a></li>
</ul>
</header>

<div id="pannelhead">
    <h1>
        Register
    </h1>
<div class="formreg">
    <form action="actions/operation.php" method="post">
        <p><input type="text" name="name" placeholder="Enter your Full Name" required="" /></p>
        
        <p><input type="text" name="address" placeholder="Enter Your address" required=""></p>
        
        <p><input type="text" name="postal_address" placeholder="Enter your Postal Address" required=""></p>
        
         <p>
            Gender: </p>
                <p><input type="radio" name="gender" value="male" checked required="">Male
                <input type="radio" name="gender" value="female" checked required="">Female
                <input type="radio" name="gender" value="others" checked required="">Others
         </p>

        <p>Date of Birth</p>
        <p><input type="date" name="dob"></p>


        <p><input type="email" name="email" placeholder="Email Address" required=""/></p>
        <p><input type="text" name="phone_no" placeholder="Phone Number" required="" /></p>


        <p><input type="text" name="username" placeholder="Username" required=""/></p>
        <p><input type="password" name="password" placeholder="Password" required=""/></p>

     <p><input type="submit" name="register" /></p>
    </form>

</div>
</div>









<footer>

<div style="width: 100%; height: 150px; background-color: #000; margin-top: 100px; color: #fff">

   
<div style="padding-top:10px; padding-left: 25px; font-family: verdana; float: left; ">

<h3>Find us</h3>
  <li>FaceBook</li><br/>
  <li>Twitter</li><br/>
  <li>Instagram</li><br/>
  <li>Gmail</li><br/>
</div>

<div style="float: left; width: 110px; height: 80px; margin-left: 480px; margin-top: 30px; font-family: arial;"> 
    <a href="index.php" style="text-decoration: none; color: #fff;">Home</a><br/><br/>
    <a href="register.php" style="text-decoration: none; color: #fff;">Join us</a>

</div>

<div style="float: right; margin-top: 60px; margin-right: 60px; font-size: 12px;">
  <p>Developed By: </p>
  01developers empire &reg; <br/>
   Contact us: nkrsubedi@gmail.com
</div>

<div style=" float: left; width: 100%; margin-top: 23px; text-align: center; font-size: 14px;">
  <u> &copy;All rights Reserved efc 2018</u>

</div>

</div>
</footer>

</body>
</html>