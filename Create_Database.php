# creating_database.php

<?php
/*$servername = "localhost"; // !!!!!!!!!!!!!!!!!!!!!! PAY ATTENTION !!!!!!!!!!!!!!!!
$username="root"; 	      // !!!!!!!!!!!!!!!!!!!!!! PAY ATTENTION  !!!!!!!!!!!!!!!!!
$password="";            // !!!!!!!!!!!!!!!!!!!!!! PAY ATTENTION   !!!!!!!!!!!!!!!!!!
*/
session_start();
$servername=$_SESSION['server'];
$username_serv=$_SESSION['dbusername'];
$password_serv=$_SESSION['dbpassword'];

$connect = mysql_connect($servername, $username_serv, $password_serv)
	or die ( 'Unable to connect to server');

if(isset($_POST['create_button'])) {		
	$dbname = $_REQUEST["db"];
	$query="CREATE DATABASE IF NOT EXISTS $dbname";
	if (mysql_query($query)) {
		echo "Database <b>$dbname</b> created successfully <br>";
	} 
	else {
		echo "Error in creating database: <br><br>". mysql_error ();
	}
}

$list = null;
$result_set = mysql_list_dbs($connect);
$num_row=mysql_num_rows($result_set);
echo "Current Database: ";
for ($row = 0; $row < $num_row; $row++)
	$list .= mysql_tablename($result_set, $row) . " <br> ";
	//$db_select=$row->$list;
	//$_SESSION['db']=$db_select;

	?>
<html>
<head> 
<title>Creating Databases</title>
</head>
<body>
	<form action = "<?php echo $_SERVER['PHP_SELF'] ; ?>" 
		method="post">Current databases:<a href="Display_tables.php"> <?php echo $list; ?> </a><hr>
	Name:<input type="text" name="db">
<input type = "submit" name="create_button" value="Create Database" onClick='alert("Database Created..!!")'>
</form>
</body>
</html>