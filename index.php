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

$carObj= new carupload;
$retrived = $carObj->Retrival();

$viewers= new visitorCount;
$totalvisitor=$viewers->pagevisitors();


?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <title>EcoPal Cars</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="CSS/makeups.css">
</head>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="register.php">Register now!</a></li>
  <li style="float:right"><a href="login.php">Log In</a></li>
</ul>

<div style=" font-family: verdana; padding: 5px; color:#000;">
  You are our <?php echo $totalvisitor ?> th visitor
</div>

<div id="main">

<div class="mainpage">
  <h1 id="sc" style="position: absolute; top:70px; left: 350px">
Welcome to the EcoPalCars </h1>

<h2 id="sc" style="position: absolute; top:250px; left: 350px">
Review We provide establishes a 'BRAND'</h2>

<?php 
  foreach ($retrived as $getimg) {
 ?>
<div class="mySlides fade">
  <img src="<?php echo $getimg['newpath']; ?>" >
</div>

<?php 
  }
 ?>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<a href="register.php">
<div id="join" style="position: absolute; top:400px; left: 600px">
<h3>JOIN US</h3>
</div></a>

</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3500); 
}
</script>





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