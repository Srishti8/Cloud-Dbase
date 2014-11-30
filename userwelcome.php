<?php  
	include('session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome  <?php echo $login_session; ?></title>
<link href="css/defaultreg.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/page.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/storagelist.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<span class="icon"><img src="images/clouds.png" align="left" class="logoimage"/></span>
			<h1><a href="index.html">CLOUD-DBASE</a></h1>
			<span>An open cloud database service</span> 
        </div>
		<div id="menu">
			<ul>
				<li class="current_page_item">
				<a href="index.html" accesskey="1" title="">Home</a></li>
				<li><a href="#" accesskey="2" title="">Quick Guide</a></li>
				<li><a href="#" accesskey="3" title="">Contact Us</a></li>
				<li><a href="" accesskey="4" title="">Register</a></li>
				<li><a href="login.html" accesskey="5" title="">Login</a></li>
			</ul>
		</div>
	</div>
	</div>
	<div id="form_container">
    <div class="listofdb">    
    <div class="list">
    	<table class="listtab">
        	<tr>
            	<th id="slno"><div align="left">Sl.No.</div></th>
                <th><div align="left">Name of database</div></th>
                <th id="type"><div align="left">Type</div></th>
            </tr>
    <?php
			$server = "localhost";
			$dbname = "opencloud";
			$dbusername = "root";
			$dbpassword = "";

			$con=mysql_connect($server,$dbusername,$dbpassword);
  			mysql_select_db($dbname);
			
			$query="select s_id,s_name,s_type from storage;";
			if($result = mysql_query($query)){
				while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo "<tr>
						<td id='slno'>{$row['s_id']}</td>
						<td id='nameofdb'><a href=''>{$row['s_name']}</a></td>
						<td id='type'>{$row['s_type']}</td>
						</tr>
					";
				}
			}
			else
				echo "no database found</ br>";
			echo "<tr>
					<td colspan='3'>Creata a new one here....</td>
				  </tr>";
			echo "<form method='post' action='userwelcome.php'><tr>
					<td colspan='2'>Enter name : <input type='text' name='dbname' value=''></td>
					<td>Type : <select name='dbtype'>
						<option selected='selected'>Relational database</option>
						<option>Blob</option>
						<option>File</option>
						</select></td>
				  </tr>
				  <tr>
				  	<td colspan='3' id='submitbutton'>
						<input type='submit' value='Create' name='submit1' id='submitb'/>
					</td>
				  </tr>";	
				  
				if(isset($_POST['submit1']))  {
				if($_POST['dbname']!=''){
					$dbname = $_POST['dbname'];
					$dbtype = $_POST['dbtype'];
					//echo $dbname."</ br>".$dbtype;
					$createdb = "create database $dbname";
					if(mysql_query($createdb)) {
						
						$insert = "insert into storage (s_name,s_type) values ('$dbname', '$dbtype')";
						$result = mysql_query($insert);
						if($result){
							header('Location:userwelcome.php');
						}
						else
							echo "<tr>
									<td colspan='3'>Some error occured while inserting. Try again later.</td>
								  </tr>";
					}
					else
						echo "<tr>
								<td colspan='3'>Database cannot be created!</td>
							  </tr>";
				}	  
				}
	?> 
     </table>
    </div>   
   </div>
    
<div id="copyright">
	<p>&copy; Untitled. All rights reserved.</p>
</div>
</div>
</body>
</html>
