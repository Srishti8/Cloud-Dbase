<?php

session_start();
$_SESSION['view']=true;
header("Location:main_menu.php");
/*if(isset($_SESSION['views']))
{
	echo '<form action="destroy.php">';
	echo '<input type ="submit" value="Log Out">';
	//header('Location:index.php');
}
else
$_SESSION['views']=1;
echo "Views=". $_SESSION['views'];
*/
?>