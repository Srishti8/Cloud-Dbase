<?php
/****************
Purpose: display all table structure for a specific database
****************/

//connection variables
//$database = "db_1";###################### PAY ATTENTION ######################---------------------------->>>>>>> issue
//$servername = "localhost";###################### PAY ATTENTION ######################
//$username="root"; 	###################### PAY ATTENTION ######################
//$password="";###################### PAY ATTENTION ######################
//connection to the database
session_start();
$servername=$_SESSION['server'];
$username_serv=$_SESSION['dbusername'];
$password_serv=$_SESSION['dbpassword'];
mysql_connect($servername, $username_serv, $password_serv)
or die ('cannot connect to the database: ' . mysql_error());
$db_select=$_SESSION['db'];

//select the database
mysql_select_db($db_select)
or die ('cannot select database: ' . mysql_error());

//loop to show all the tables and fields
$loop = mysql_query("SHOW tables FROM $database")
or die ('cannot select tables');

while($table = mysql_fetch_array($loop))
{

    echo "
        <table cellpadding=\"2\" cellspacing=\"2\" border=\"0\" width=\"75%\">
            <tr bgcolor=\"#666666\">
                <td colspan=\"5\" align=\"center\"><b><font color=\"#FFFFFF\">" . $table[0] . "</font></td>
            </tr>
            <tr>
                <td>Field</td>
                <td>Type</td>
                <td>Key</td>
                <td>Default</td>
                <td>Extra</td>
            </tr>";

    $i = 0; //row counter
    $row = mysql_query("SHOW columns FROM " . $table[0])
    or die ('cannot select table fields');

    while ($col = mysql_fetch_array($row))
    {
        echo "<tr";

        if ($i % 2 == 0)
            echo " bgcolor=\"#CCCCCC\"";

        echo ">
            <td>" . $col[0] . "</td>
            <td>" . $col[1] . "</td>
            <td>" . $col[2] . "</td>
            <td>" . $col[3] . "</td>
            <td>" . $col[4] . "</td>
        </tr>";

        $i++;
    } //end row loop

    echo "</table><br/><br/>";
} //end table loop
?>