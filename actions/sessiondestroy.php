<?php 
session_start();
session_destroy();
unset($_SESSION['aid']);
unset($_SESSION['uid']);
header("location: ../login.php");
 ?>