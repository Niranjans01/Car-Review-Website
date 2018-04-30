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

  $id= $userdata['id'];
  $name = $userdata['name'];
  $address=$userdata['address'];
  $postaladdress = $userdata['postal'];
  $gender = $userdata['gender'];
  $dateofbirth= $userdata['dob'];
  $emailaddress = $userdata['email'];
  $phnumber = $userdata['phone'];
  $username = $userdata['username'];
  $password = $userdata['password'];

  $object = new statuspost;
 $status = $object->Postget();
  
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>EFC forum</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
<link type="text/css" rel="stylesheet" href="CSS/users.css">
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

<h1>What's up <?php echo $name ?>
    <br> The forum was waiting for your Points...
  </h1>

<form action="actions/operation.php" method="post">

<div class="main" style="width: 500px; height: 210px; margin: auto; 
font-family: Arial; color: green ; background-color: #fff; margin-bottom: 20px; ">

  <div id="statpart" style="width: 100%; height: 30px; text-align: center; background-color: blue; ">
  </div>
  <textarea name="statusup" style="margin: 10px; " rows="8" cols="65" placeholder="Post your Question's here!"></textarea>

  <input type="submit" name="post" value='POST' style="color: #fff; 
  font-family: verdana; width:70px; height: 30px; background-color: blue; 
  border:none; padding: 2px; float: right; margin-right: 15px;">
  <input type="hidden" name="usrname" value="<?php echo $username?>">
  
</div>
</form>


<?php 
foreach($status as $post){

 ?>

  <div style="width: 470px; height: auto; padding: 1%; margin: auto; 
  margin-top: 10px; font-family: verdana; color: green; background-color: #fff; border-radius: 8px;">

    <div style="width: 100px; height: auto;">
      <img src="images/user.png">
      <?php echo $post['username']; ?>
    </div>
    <div style="width: 90%; height: auto; padding: 1%; margin: auto; background-color: lightblue;">
      <?php echo $post['status']; ?>
    </div>
    <?php
            $pid=$post['id'];
             $usrcommentobj = new comment;
             $usrcommentobj->setPostid($pid);
             $usercomment = $usrcommentobj->SelectComments();
            
          foreach($usercomment as $comment){

            ?> 
          <div class="commentator">
            <p style="margin-left: 40px; margin-top: 5px; color: #000 "><?php echo $comment['username']; ?>  </p>
          </div>

          <div class="comments" style="margin-left: 40px; margin-right: 20px; padding: 3px; 
          background-color: #3CB371; border-radius: 5px; color: #fff; ">
          <?php echo $comment['comment']; ?>
          </div>
    <?php } ?>

    <div style="width: 90%; height: auto; padding: 1%; margin: auto; margin-top: 3px;  background-color: lightblue;">
    Comments
    <form action="actions/operation.php" method="post">
    <textarea name="ncomment" rows="2" cols="55" placeholder="comment here..."></textarea>

    <input type="submit" name="postcomment" value="comment" style="color: #fff; font-family: verdana; width:65px; 
    height: 25px; background-color: blue; border:none; padding: 2px;">
    <input type="hidden" name="user" value="<?php echo $username; ?>">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
    </form>
    </div>   
  </div>

  <?php 
}
 ?>







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