<?php
require("actions/user.php");
if(!isset($_SESSION['aid']))
{
  header("location:login.php");
}
if(isset($_SESSION['aid']))
{
  $id = $_SESSION['aid'];

    $obj=new user;
  $obj->setId($id);
  $data=$obj->getUsers();

  $id = $data['id'];
  $name=$data['name'];
  $username=$data['username'];
  $address = $data['address'];
  $postaladdress= $data['postal'];
  $gender = $data['gender'];
  $dateofbirth = $data['dob'];
  $emailaddress = $data['email'];
  $phnumber = $data['phone'];
  $username = $data['username'];
  $password = $data['password'];

}


?>








<!DOCTYPE html>
<html lang="en">
<head>
  <title>EcoPal Cars</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="CSS/users.css">
</head>
<body id="profilebody">

<div class="navbar">
  <a href="adminpannel.php">Admin Home</a>
  <a href="editcar.php">Edit Car's</a>


  <div class="dropdown" style="float: right">
    <button class="dropbtn">Profile
    </button>
    <div class="dropdown-content">
      <a href="admincustomize.php">Edit</a>
      <a href="actions/sessiondestroy.php">Log Out</a>
    </div>

  </div> 
</div>


<div id="detailbox" >
<form action="actions/operation.php" method="post">
  <p style="float: right;">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
  </p>
    <p>Name
    <input type="text" name="name" value="<?php echo $name; ?>"/></p>

    <p>Address
      <input type="text" name="address" value="<?php echo $address; ?>"></p>

    <p>Postal Address
      <input type="text" name="postaddress" value="<?php echo $postaladdress; ?>"></p>

    <p>Gender
      <input type="radio" name="gender" value="male" checked="<?php $male; ?>"/>male
      <input type="radio" name="gender" value="female" checked="<?php $female; ?>"/>female
      <input type="radio" name="gender" value="others" checked="<?php $others; ?>"/>other
    </p>

    <p>Date of Birth
      <input type="date" name="dob" value="<?php echo $dateofbirth; ?>"></p>

    <p>Email id
      <input type="email" name="email" value="<?php echo $emailaddress; ?>"></p>

    <p>phone number
      <input type="text" name="phno" value="<?php echo $phnumber; ?>"></p>

    <p>Username
      <input type="text" name="username" value="<?php echo $username; ?>"></p>

    <p>Password
      <input type="password" name="password" value="<?php echo $password; ?>"></p>

      <input type="submit" name="updateprofile" value="Update">

    </form>
</div>






<footer>

<div style="width: 100%; height: 150px; background-color: #000; margin-top: 100px; color: #fff">

   
<div style="padding-top:10px; padding-left: 25px; font-family: verdana; float: left; ">

<h3>Find us</h3>
  <li>FaceBook</li>
  <li>Twitter</li>
  <li>Instagram</li>
  <li>Gmail</li>
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