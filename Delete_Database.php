<?php
$servername = "localhost";###################### PAY ATTENTION ######################
$username="root"; 	###################### PAY ATTENTION ######################
$password="";###################### PAY ATTENTION ######################

$connect = mysql_connect($servername, $username, $password)
	or die ( 'Unable to connect to server');

if(isset($_POST['delete_button'])) {		
	$dbname = $_REQUEST["db"];


	$query="DROP DATABASE $dbname";
	if (mysql_query($query)) {
		echo "Database <b>$dbname</b> deleted successfully <br>";
	} 
	else {
		echo "Error in deleting database: <br><br>". mysql_error ();
	}
}

$list = null;
$result_set = mysql_list_dbs($connect);
for ($row = 0; $row < mysql_num_rows($result_set); $row++)
	$list .= mysql_tablename($result_set, $row) . " | ";
?>

<html>
<head> <title>Deleting Databases</title> </head>
<body>
	<form action = "<?php echo $_SERVER['PHP_SELF'] ; ?>" 
		method="post">Current databases: <?php echo $list; ?> <hr>
	Name:<input type="text" name="db">
	<input type = "submit" name="delete_button" value="Delete database" onClick='alert("Database Deleted..!!")'>
	</form>
</body>
</html>