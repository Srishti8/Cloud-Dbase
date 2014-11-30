<?php

$servername=$_POST['servername'];
$username_serv=$_POST['username_serv'];
$password_serv=$_POST['password_serv'];


$server=$servername;
$dbusername=$username_serv;
$dbpassword=$password_serv;



$con=mysql_connect($server,$dbusername,$dbpassword) or die("Couldn't connect");

if($con)
{
	session_start();
	$_SESSION['server']=$servername;
$_SESSION['dbusername']=$username_serv;
$_SESSION['dbpassword']=$password_serv;
header("Location:Create_Database.php");
}
else
echo "error";


?>