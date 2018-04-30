<?php
session_start();
require("connections.php");

class User extends Connection
{
	public $id;
	public $fullname;
	public $address;
	public $postaladdress;
	public $gender;
	public $dateofbirth;
	public $emailaddress;
	public $phoneno;
	public $username;
	public $password;

    

    public function setId($id)
	{
      $this->id = $id;
	}

	public function setFullname($fname)
	{
      $this->fullname = $fname;
	}

	public function setAddress($adres)
	{
      $this->address = $adres;
	}

	public function setPostaladdress($postaladres)
	{
      $this->postaladdress = $postaladres;
	}


	public function setGender($gndr)
	{
      $this->gender = $gndr;
	}

	public function setDateofbirth($dobrth)
	{
      $this->dateofbirth = $dobrth;
	}

	public function setEmailaddress($emailadres)
	{
      $this->emailaddress = $emailadres;
	}

	public function setPhoneno($phnno)
	{
      $this->phoneno = $phnno;
	}

	public function setUsername($uname)
	{
      $this->username = $uname;
	}

	public function setPassword($pass)
	{
      $this->password = $pass;
	}



  public function register()
  {
  $checkname="select * from user_table where username='$this->username'";
  $reguser= mysqli_query($this->conn,$checkname);
  $chkname=mysqli_num_rows($reguser);

  if ($chkname>0)
  {
    header("location: ../register.php?existalready=userexist");
  }

  else
  {
     $query="insert into user_table values(NULL,'$this->fullname','$this->address','$this->postaladdress','$this->gender','$this->dateofbirth','$this->emailaddress','$this->phoneno','$this->username','$this->password','user')";
    mysqli_query($this->conn,$query);
     header("location: ../login.php");
  }

   
  }



  public function login()
  {
    if(isset($_COOKIE['count']) && $_COOKIE['count']>2)
      {
        echo "<script> alert('You are blocked for 5 minutes')</script>";
        die();
      }

    $query = "select * from user_table where username='$this->username' && password='$this->password'";
    $res = mysqli_query($this->conn,$query);
    $count = mysqli_num_rows($res);


    if ($count>0)
    {
      $data=mysqli_fetch_array($res);
      $usertype = $data['usertype'];
      $id = $data['id'];

      if($usertype=='admin')
      {
        $_SESSION['aid']=$id;
        header("location: ../adminpannel.php"); 

      }
      else
      {
        $_SESSION['uid']=$id;
        header("location: userhome.php");
      }

    }
    else
    {
           header("location:../login.php?invalid=userlogin");
              if(isset($_COOKIE['count']))

    {
      if($_COOKIE['count']<=2)
      {
        $new_counter=$_COOKIE['count']+1;
        setcookie('count', $new_counter,time()+300);
      }
      
    }
    else
    {
    $counter=1;
    setcookie('count',$counter);
    }
    }
  }


	

	public function updateprofile(){
		
		$query="update user_table set name='$this->fullname', address='$this->address',
		postal='$this->postaladdress', gender='$this->gender', dob='$this->dateofbirth',email='$this->emailaddress',phone='$this->phoneno', username='$this->username',password='$this->password' where id='$this->id'";
		mysqli_query($this->conn,$query);

	}

	public function getUsers(){
		$query = "Select * from user_table where id='$this->id'";
		$res = mysqli_query($this->conn, $query);
		$userdata = mysqli_fetch_array($res);
		return $userdata;
	}


}


/**
* 
*/
class statuspost extends connection
{
	public $id;
  	public $post;
  	public $username;
	
	public function setPost($post)
  	{
    $this->post =$post;
  	}
   
   public function setPusername($username)
  	{
    $this->username =$username;
  	}


  	public function Poststatus()
   {
    $query="insert into forumquery (status,username) values ('$this->post','$this->username')";
    mysqli_query($this->conn,$query);
   }


	public function Postget(){
    $select="select * from forumquery";
    $res=mysqli_query($this->conn,$select);
    return $res;

  }

}



/**
* 
*/
class comment extends connection
{
	public $cid;
  	public $comment;
  	public $postid;
  	public $username;

  public function setCcomment($ucomment){
    $this->comment=$ucomment;
  }
  public function setPostid($upostid){
    $this->postid=$upostid;
  }
  public function setCusername($cusername){
    $this->username=$cusername;
  }

  public function Commentry(){
    $cmnt="insert into forumconv(comment,username,postid) values ('$this->comment','$this->username','$this->postid')";
    mysqli_query($this->conn,$cmnt);
  }

  public function SelectComments(){
    $selects="select * from forumconv where postid='$this->postid'";
    $rest=mysqli_query($this->conn,$selects);
    return $rest;
  }




}


/**
* 
*/
class carupload extends connection
{
	public $crid;
    public $crname;
    public $fuel;
    public $efficiency;
    public $crating;
    public $desc;
    public $cardest;
    public $newpath;
    public $extension;


    public function setcid($cid)
    {
      $this->crid=$cid;
    }

    public function setcrname($crname)
    {
      $this->crname=$crname;
    }

    public function setfuel($fueltype)
    {
      $this->fuel=$fueltype;
    }

    public function setefficiency($efficiency)
    {
      $this->efficiency=$efficiency;
    }

    public function setcrating($crating)
    {
      $this->crating=$crating;
    }

    public function setdescription($description)
    {
      $this->desc=$description;
    }
     public function setcardest($cardest)
    {
      $this->cardest=$cardest;
    }
     public function setnewpath($newpath)
    {
      $this->newpath=$newpath;
    }
     public function setextension($extension)
    {
      $this->extension=$extension;
    }


    public function UploadtheCar()
  	{
          $upload="insert into car_table(car,fueltype,efficiency,ratings,description,imagepath,extension,newpath) values('$this->crname','$this->fuel','$this->efficiency','$this->crating','$this->desc','$this->cardest','$this->extension','$this->newpath')";
          mysqli_query($this->conn,$upload);
          header("location:../adminpannel.php");
  	}

  	public function Retrival()
    {
      $getCar="select * from car_table";
      $dwcar=mysqli_query($this->conn,$getCar);
      return $dwcar;
    }


    public function UpdateCar(){
    $update="update car_table set car='$this->crname', fueltype='$this->fuel', efficiency='$this->efficiency', ratings='$this->crating', description='$this->desc' where id='$this->crid'";
    mysqli_query($this->conn,$update);
     header("location:../editcar.php");
  	}

  	public function DeleteCar(){
    $delete="delete from car_table where id='$this->crid'";
    mysqli_query($this->conn,$delete);
    header("location:../editcar.php");
	}

    public function Rssefc(){
    $rssf="select * from car_table";
    $res=mysqli_query($this->conn,$rssf);
    return $res;
    }

}


class visitorCount extends connection
  {
    public function pagevisitors()
    {
      $choose="select * from visitors where id=1";
      $viewercount=mysqli_query($this->conn,$choose);
      $totalvisit=0;
      while($viewreport=mysqli_fetch_array($viewercount))
      {
        $totalvisit=$viewreport['viewer'];
      }
      $updatevisit="update visitors set viewer=viewer+1 where id=1";
      mysqli_query($this->conn,$updatevisit);
      return $totalvisit;
    }

  }



class userliked extends connection
{
  public $crid;
  public $crname;
  public $username;

  public function setcid($cid)
    {
      $this->crid=$cid;
    }

  public function setUsername($uname)
  {
      $this->username = $uname;
  }

  public function setcrname($crname)
    {
      $this->crname=$crname;
    }
  public function bookmarked()
  {
    $save = "insert into userfav values(NULL,'$this->username','$this->crname')";
    mysqli_query($this->conn,$save);
    header("location:userhome.php");


  }

  public function Retrivefav()
    {
      $getFCar="select * from userfav";
      $favcar=mysqli_query($this->conn,$getFCar);
      return $favcar;
    }

  public function DeleteFCar()
  {
    $fdelete="delete from userfav where id='$this->crid'";
    mysqli_query($this->conn,$fdelete);
    header("location:../savedcar.php");
  }
}





?>