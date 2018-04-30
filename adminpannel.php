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


}


?>

















<!DOCTYPE html>
<html>
<head>
	<title>EFC car's(admin*)</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
<link type="text/css" rel="stylesheet" href="CSS/users.css">
</head>
<body>
	
	<div class="navbar">
  <a class="active" href="adminpannel.php">Admin Home</a>
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

<div class="admin_info" style=" padding: 20px; color: #000; font-family: verdana; float: right;">
Admin: <?php echo $name; ?> <br>
Admin id: <?php echo $id; ?>
<p>Date: <span id="datetime"></span></p>

<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
</script>

</div>

<h1 style="font-family: verdana; padding: 10px;">Upload Car's</h1>

<div class="car_register">
<form action="actions/operation.php" method="post" enctype="multipart/form-data">
	<p>Car Name</p>
	<p><input type="text" name="carnam"></p>

	<p>Fuel Type</p>
	<p><input type="text" name="fuel"></p>

	<p>Efficency</p>
	<p><input type="text" name="efficency"></p>

	<p>Ratings</p>
	<select name="rates">
          	<?php
          	 for ($p=1; $p<6; $p++) { 
	          ?>
	          <option> <?php echo $p; ?> </option>
	         <?php } ?>
	</select>

	<p>More About car</p>
	<p><textarea name="cardesc" rows="5" cols="40"></textarea></p>

	Upload Car image
	<p><input type="file" name="img_cars"></p>
	<hr></hr>


	<p><input type="submit" name="uploadCR" style="float: right; background-color: blue; color: #fff; border-color: #000; border-radius: 0;"></p>

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
