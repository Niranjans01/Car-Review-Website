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
$carObj= new carupload;
$retrived = $carObj->Retrival();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit cars</title>
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


<div class="Ctable" style="margin: auto;">
	<h1>Make the Required Changes here,</h1>
    <table border="4" style="margin: auto; padding: 4%; background-color: #fff; color: #000; font-family:verdana;">
        <tr class="td1">
          <td>ID</td>
          <td>Car</td>
          <td>Fuel type</td>
          <td>Efficency</td>
          <td>Rating</td>
          <td>Description</td>
          <td>Update</td>
          <td>Delete</td>
        </tr>

    <?php
         foreach ($retrived as $setdata)
         {
    ?>
    
    <tr>
          <form method="post" action="actions/operation.php">

          <td><?php echo $setdata['id']; ?></td>
          <td><input type="text" name="Rname" value="<?php echo $setdata['car']; ?>" required=""></td>
          <td><input type="text" name="Rfuel" value="<?php echo $setdata['fueltype']; ?>" required=""></td>
          <td><input type="text" name="Reffciency" value="<?php echo $setdata['efficiency']; ?>" required=""></td>

          <td><label><?php echo $setdata['ratings'] ?></label>
          	<select name="Nrating">
          	<?php
          	 for ($p=1; $p<6; $p++)
          	 { 
	          ?>
	          <option><?php echo $p; ?></option>
	         <?php } ?>
	          </select>
	      </td>

	       <td><textarea name="Rdescription" required=""><?php echo $setdata['description']; ?></textarea></td>

	       <td><input type="submit" name="Cupdate" value="Update"></td>

          <td><input type="submit" name="Cdelete" value="Delete"></td>

          <input type="hidden" name="crid" value="<?php echo $setdata['id'] ?>">
          <input type="hidden" name="crname" value="<?php echo $setdata['car'] ?>">
      </form>
    </tr>
  <?php } ?>
</table>
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




