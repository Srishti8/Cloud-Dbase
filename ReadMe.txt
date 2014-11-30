******************************************************************************************************************************************************************************************************************************
CREATE DATABASE & TABLE (contd....)
******************************************************************************************************************************************************************************************************************************
HOW TO IMMEDIATELY RUN THESE FILES.....!!!!! ( Create_Database.php + Create_Table.php)
******************************************************************************************************************************************************************************************************************************
SET THE FOLLOWING VALUES
$servername = "localhost"; // !!!!!!!!!!!!!!!!!!!!!! PAY ATTENTION !!!!!!!!!!!!!!!!
$username="root"; 	      // !!!!!!!!!!!!!!!!!!!!!! PAY ATTENTION  !!!!!!!!!!!!!!!!!
$password=" ";            // !!!!!!!!!!!!!!!!!!!!!! PAY ATTENTION   !!!!!!!!!!!!!!!!!!(blank)

******************************************************************************************************************************************************************************************************************************
TO RUN (Delete_Database.php)

1. COPY the files in "htdocs".
2. GOTO XAMPP CONTROL PANEL START the APACHE ,MYSQL SERVERS.
3. OPEN any browser .GO TO ==> localhost/Delete_Database.php.
4.  ENTER name of database e.g. db_1. CLICK "Delete Database".
5.  A javascript alert will be displayed "Database Deleted".
******************************************************************************************************************************************************************************************************************************
TO RUN (Display_Tables.php)

1. COPY the files in "htdocs".
2. GOTO XAMPP CONTROL PANEL START the APACHE ,MYSQL SERVERS.
3. In CODE set these values accordingly-
$database = "db_1";  // ENTER ANY TABLE WHICH  IS ALREADY PRESENT IN DATABASE
$servername = "localhost";
$username="root"; 	
$password=" ";
******************************************************************************************************************************************************************************************************************************BIG ISSUES----->(I Tried really hard but didn't came up with solution .Still Trying.... )
1. Display_Tables.php displays the table already present in a database , which has been already created.
2. Tables are displayed but can't be edited.
 +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
phpMyEdit-5.7.1 is a utility which automatically generates php code for tables which then can be copied to the page.