<?php
require("user.php");
if(!isset($_SESSION['uid']))
{
  header("location:../login.php");
}
if(isset($_SESSION['uid']))
{
  $id = $_SESSION['uid'];
  $obj = new User;
  $obj-> setId($id);
  $userdata = $obj->getUsers();

  $name = $userdata['name'];
  $address=$userdata['address'];
  $postaladdress = $userdata['postal'];
  $gender = $userdata['gender'];
  $dateofbirth= $userdata['dob'];
  $emailaddress = $userdata['email'];
  $phnumber = $userdata['phone'];
  $username = $userdata['username'];
  $password = $userdata['password'];
}

$carObj= new carupload;
$retrived = $carObj->Retrival();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>EcoPal Cars</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="../CSS/users.css">
</head>
<body>

<div class="navbar">
  <a href="userhome.php">Recent Feeds</a>
  <a href="../efcforum.php">EFC forum</a>
  <a href="../savedcar.php">Saved Cars</a>
  <div class="dropdown" style="float: right">
    <button class="dropbtn">Profile
    </button>
    <div class="dropdown-content">
      <a href="../customize.php">Edit</a>
      <a href="sessiondestroy.php">Log Out</a>
    </div></div> </div>
  <h1>Welcome <?php echo $name; ?></h1>
<div style="height: 20px; background-color: white; padding: 10px; margin-top: 10px; margin-bottom: 30px;">
  <p style="text-align: center;">Some Latest Car's</p>
</div>
<div id="cars" style="width: 1000px; height: auto; margin: auto;">

  <?php
         foreach ($retrived as $userview)
         {
    ?>

<div class="cmainuser" style="margin: 30px;">
  
  <div class="carpics">
      <img src="<?php echo $userview['imagepath']; ?>">
  </div>

  <div class="aboutcar" style="margin-left: 20px; color: #fff; font-family: verdana;">
    <form action="operation.php" method="post">
      <input type="hidden" name="usernow" value="<?php echo $userdata['username']; ?>">
      <input type="hidden" name="carclicked" value="<?php echo $userview['car']; ?>">
    <input type="submit" name="store" value="  BookMark  ">
</form>
    <p><b>Name:</b> <?php echo $userview['car']; ?> </p>
    <p><b>Fuel-Type:</b> <?php echo $userview['fueltype']; ?> </p>
    <p><b>Efficiency:</b> <?php echo $userview['efficiency']; ?> </p>
    <p><b>Rating:</b> <?php echo $userview['ratings']; ?>/5 </p>
    <p><b>More:</b> <?php echo $userview['description']; ?> </p>
  </div>
<hr></hr>
</div>
<?php } ?> 
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