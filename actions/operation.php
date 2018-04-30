<?php
require("user.php");
$obj = new User;
if(isset($_POST['register']))
{
	$fullname = $_POST['name'];
	$address = $_POST['address'];
	$postaladdress = $_POST['postal_address'];
	$gender = $_POST['gender'];
	$dateofbirth = $_POST['dob'];
	$emailaddress = $_POST['email'];
	$phoneno = $_POST['phone_no'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$obj->setFullname($fullname);
	$obj->setAddress($address);
	$obj->setPostaladdress($postaladdress);
	$obj->setGender($gender);
	$obj->setDateofbirth($dateofbirth);
	$obj->setEmailaddress($emailaddress);
	$obj->setPhoneno($phoneno);
	$obj->setUsername($username);
	$obj->setPassword($password);


	$obj->register();
		
}

if(isset($_POST['login']))
{
	$uname=$_POST['username'];
	$pass = $_POST['password'];

	$obj->setUsername($uname);
	$obj->setPassword($pass);

	$obj->login();
}

if (isset($_POST['updateprofile']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$postaddress = $_POST['postaddress'];
	$gender = $_POST['gender'];
	$dateofbirth = $_POST['dob'];
	$email = $_POST['email'];
	$phno = $_POST['phno'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$obj->setId($id);
	$obj->setFullname($name);
	$obj->setAddress($address);
	$obj->setPostaladdress($postaddress);
	$obj->setGender($gender);
	$obj->setDateofbirth($dateofbirth);
	$obj->setEmailaddress($email);
	$obj->setPhoneno($phno);
	$obj->setUsername($username);
	$obj->setPassword($password);

	$obj->updateprofile();
	header("location: ../login.php");

}

if (isset($_POST['post']))
{
	$obj=new statuspost;

	$post=$_POST['statusup'];
	$username = $_POST['usrname'];

	$obj->setPost($post);
	$obj->setPusername($username);

	$obj->Poststatus();
	header("location:../efcforum.php");
}

if(isset($_POST['postcomment']))
{
	$obj=new comment;

	$ucomment=$_POST['ncomment'];
	$cusername=$_POST['user'];
	$upostid=$_POST['pid'];

	$obj->setCcomment($ucomment);
	$obj->setCusername($cusername);
	$obj->setPostid($upostid);

	$obj->Commentry();
	header("location: ../efcforum.php");
}


if(isset($_POST['uploadCR']))
{
	$objC = new carupload;

	$car = $_POST['carnam'];
	$fueltype = $_POST['fuel'];
	$efficenct = $_POST['efficency'];
	$ratings = $_POST['rates'];
	$desc = $_POST['cardesc'];

	$carimg=$_FILES['img_cars']['name'];
	$cardest="../images/uploadedcars/".$car."".$carimg;
	$newpath="images/uploadedcars/".$car."".$carimg;
	$extension=pathinfo($cardest, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['img_cars']['tmp_name'],$cardest);


	$objC->setcrname($car);
	$objC->setfuel($fueltype);
	$objC->setefficiency($efficenct);
	$objC->setcrating($ratings);
	$objC->setdescription($desc);
	$objC->setcardest($cardest);
	$objC->setnewpath($newpath);
	$objC->setextension($extension);

	$objC-> UploadtheCar();

}

if(isset($_POST['Cupdate']))
{
	$CUobj= new carupload;
    $Ucrid=$_POST['crid'];
    $Ucrname=$_POST['Rname'];
    $Ufuel=$_POST['Rfuel'];
    $Uefficiency=$_POST['Reffciency'];
    $Urating=$_POST['Nrating'];
    $Udescription=$_POST['Rdescription'];
    
    $CUobj->setcid($Ucrid);
    $CUobj->setcrname($Ucrname);
    $CUobj->setfuel($Ufuel);
    $CUobj->setefficiency($Uefficiency);
    $CUobj->setcrating($Urating);
    $CUobj->setdescription($Udescription);

    $CUobj->UpdateCar();
}

if(isset($_POST['Cdelete'])){
    $CDobj= new carupload;
    $Dcrid=$_POST['crid'];
    
    $CDobj->setcid($Dcrid);
    $CDobj->DeleteCar();  
}

if (isset($_POST['store'])) {
	$objCC = new userliked;
	$Usr = $_POST['usernow'];
	$Carclk = $_POST['carclicked'];

	$objCC->setUsername($Usr);
	$objCC->setcrname($Carclk);
	$objCC->bookmarked();
}


if(isset($_POST['Fdelete'])){
    $FDobj= new userliked;
    $FDcrid=$_POST['fcrid'];
    
    $FDobj->setcid($FDcrid);
    $FDobj->DeleteFCar();  
}

?>