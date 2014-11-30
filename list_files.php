<?php
// Connect to the database
session_start();
$i=$_SESSION['login_user'];
$server="";
$dbname="opencloud";
$dbusername="root";
$dbpassword="";

$con = mysql_connect($server,$dbusername,$dbpassword);
  mysql_select_db($dbname);
if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
// Query for a list of all existing files
$sql ="select ID,username,name,mime,size,data,created from file where username = '$i'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($count == 0) {
        echo '<p>There are no files in the database</p>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                    <td><b>Name</b></td>
                    <td><b>Mime</b></td>
                    <td><b>Size (bytes)</b></td>
                    <td><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = mysql_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mime']}</td>
                    <td>{$row['size']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file.php?id={$row['ID']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    
}
else
{
    echo 'Error! SQL query failed:';
    //echo "<pre>{$dbLink->error}</pre>";
}
 
// Close the mysql connection

?>