<?php
require("actions/user.php");
if(!isset($_SESSION['uid']))
{
  header("location:login.php");
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

$carfObj= new userliked;
$retrivedf = $carfObj->Retrivefav();
?>









<!DOCTYPE html>
<html lang="en">
<head>
  <title>EcoPal Cars</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="CSS/users.css">
</head>
<body>

<div class="navbar">
  <a href="actions/userhome.php">Recent Feeds</a>
  <a href="efcforum.php">EFC forum</a>
  <a href="savedcar.php">Saved Cars</a>


  <div class="dropdown" style="float: right">
    <button class="dropbtn">Profile
    </button>
    <div class="dropdown-content">
      <a href="customize.php">Edit</a>
      <a href="actions/sessiondestroy.php">Log Out</a>
    </div>

  </div> 
</div>











<div class="Cfav" style="margin: auto;">
  <h1>Make the Required Changes here,</h1>
    <table border="4" style="margin: auto; padding: 4%; background-color: #fff; color: #000; font-family:verdana;">
        <tr class="td1">
          <td>ID</td>
          <td>Car</td>
          <td>Delete</td>
        </tr>

    <?php
         foreach ($retrivedf as $setdata)
         {
          $user = $setdata['username'];
          if ($user == $username)
          {
    ?>
    
    <tr>
      
          <form method="post" action="actions/operation.php">

          <td><?php echo $setdata['id']; ?></td>
          <td><input type="text" name="Rname" value="<?php echo $setdata['carname']; ?>" required=""></td>

          <td><input type="submit" name="Fdelete" value="Remove"></td>

          <input type="hidden" name="fcrid" value="<?php echo $setdata['id'] ?>">
      </form>
    </tr>
  <?php }} ?>
</table>
</div>























</body>


</html>