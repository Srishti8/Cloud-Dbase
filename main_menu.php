<?php

session_start();
$i=$_SESSION['login_user']; 
echo "Hello $i" ;
'<br>'


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
</head>

<body>

<input type=button onClick="parent.location='file.php'" value='File upload/download'>
<br />
<input type=button onClick="parent.location='server_login.html'" value='Server login'>
</body>
</html>