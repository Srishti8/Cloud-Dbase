<?php



$server="localhost";
$dbname="opencloud";
$dbusername="root";
$dbpassword="";

$i=$_POST['username'];
$pd=$_POST['password'];
$p= base64_encode($pd);


$con = mysql_connect($server,$dbusername,$dbpassword);
  mysql_select_db($dbname);

$sql="select username from userlogin where username = '$i'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
    
	if($count==1)
	{
		$pass="select password from userlogin
				where username = '$i' and password ='$p'";
		$rest = mysql_query($pass);
		$c = mysql_num_rows($rest);

		 if($c==1)
		  {	
		  session_start();
		  	$_SESSION['login_user'] = $i;
			
			header ('Location:connect.php');
		  }
		  else 
		  {
			header("location:login.html");
		  }
	}
    else
	{
		header("location:login.html");
	}
?>