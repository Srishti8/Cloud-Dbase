<?php
$server="localhost";
$dbname="opencloud";
$dbusername="root";
$dbpassword="";

$First_Name=$_POST['First_Name'];
$Last_Name=$_POST['Last_Name'];
$email_id=$_POST['email_id'];
$domain=$_POST['domain'];
$password=$_POST['password'];
$password_confirm=$_POST['password_confirm'];
$date=$_POST['date'];
$month=$_POST['month'];
$year=$_POST['year'];
$country=$_POST['country'];
$code=$_POST['code'];
$number=$_POST['number'];

//print_r($_POST);
$enpas=base64_encode($password);
$enpas_confirm=base64_encode($password_confirm);

$con=mysql_connect($server,$dbusername,$dbpassword);
  mysql_select_db($dbname);

$query="insert into register (First_Name,Last_Name,email_id,domain,password,password_confirm,date,month,year,country,code,number) 
values ('$First_Name','$Last_Name','$email_id','$domain','$enpas','$enpas_confirm','$date','$month','$year','$country','$code','$number')";

$newquery="insert into userlogin (username,password) values ('$email_id','$enpas')";

$result=mysql_query($query);
$newresult=mysql_query($newquery);

	if($result)
	   header("Location:login.html");
	 //echo 'success'; 	 
    else
	  echo 're-enter';

?>