<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Workarea</title>
<link href="css/defaultreg.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/userarea.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
body,td,th {
	font-family: "Source Sans Pro", sans-serif;
}
</style>
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
    <div id="screen">
	  <div id="workarea">
      <h3>QUERY BUILDER</h3>
      <br />
      <br />
        <form action="userarea.php" method="post">
        	select 
            <!-- Fields to be displayed -->
            <select multiple="multiple" size="1" name="fields[]">
            	<option value="*" selected="selected">*</option>
                <option value="s_id">S_ID</option>
                <option value="s_name">S_NAME</option>
                <option value="s_type">S_TYPE</option>
            </select> 
            <!-- table name -->
            from storage 
            <!-- where clause -->
            where 
            <!-- constrained field name (operand 1) -->
            <select name="oper1">
            	<option value="" selected="selected">NONE</option>
                <option value="s_id">S_ID</option>
                <option value="s_name">S_NAME</option>
                <option value="s_type">S_TYPE</option>
            </select> 
            <!-- operator -->
            <select name="oper">
                <option value="=">=</option>
                <option value="like">like</option>
                <option value=">">></option>
            </select> 
            <!-- operand 2 -->
            <input type="text" value="" name="oper2"  />
            <!-- group by -->
            group by 
            <select name="groupby">
            	<option value="" selected="selected">NONE</option>
                <option value="s_id">S_ID</option>
                <option value="s_name">S_NAME</option>
                <option value="s_type">S_TYPE</option>
            </select> 
            <!-- ordering -->
            order by 
            <select name="orderby">
            	<option value="" selected="selected">NONE</option>
                <option value="s_id">S_ID</option>
                <option value="s_name">S_NAME</option>
                <option value="s_type">S_TYPE</option>
            </select>
            <select name="ordering">
            	<option value="asc" selected="selected">ASCENDING</option>
                <option value="desc">DESCENDING</option>
            </select>
            <br />
            <br />
            <input type="submit" value="Submit" name="formSubmit" id="submitbutton"  style="float:right" />
    </form>
    
    <?php 
			$server = "localhost";
			$dbname = "opencloud";
			$dbusername = "root";
			$dbpassword = "";

			$con=mysql_connect($server,$dbusername,$dbpassword);
  			mysql_select_db($dbname);
			
			if(isset($_POST['formSubmit']) )
			{
			$fieldarray = "";
			$fields = $_POST['fields'];
			if( is_array($fields)){
				while (list ($key, $val) = each ($fields)) {
					$fieldarray = $fieldarray.','.$val;
					//echo "$val <br>";
				}
			}
			else {
				$fieldarray = $_POST['fields'];
			}
			$fieldarray = substr($fieldarray,1,strlen($fieldarray));
//			echo $fieldarray;
			$oper1 = $_POST['oper1'];
			$oper = $_POST['oper'];
			$oper2 = $_POST['oper2'];
			$groupby = $_POST['groupby'];
			$orderby = $_POST['orderby'];
			$ordering = $_POST['ordering'];
			
			$query = "select ".$fieldarray." from storage";
			
			if($oper1 != ''){
				$query = $query." where ".$oper1." ".$oper." ".$oper2;
			}
			//echo '<br>'.$query;
			if($groupby != ''){
				$query = $query.' group by '.$groupby;
			}	
			
			if($orderby != ''){
				$query = $query.' order by '.$orderby.' '.$ordering;
			}	
					
			$query = $query.';'; 		
			//echo '<br>'.$query;
			if($result = mysql_query($query)){
				
				// Print the column names as the headers of a table
				echo "<table align='center' style='border:solid;padding:5px;'><tr>";
				
				$num = mysql_num_fields($result);
				for($i = 0; $i < $num ; $i++) {
					$field_info[$i] = mysql_fetch_field($result, $i);
					echo "<th>{$field_info[$i]->name}</th>";
				}
				echo '</tr>';
				
				// Print the data
				while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
					echo "<tr>";
						for($i = 0; $i < $num ; $i++) {
							$fname = "{$field_info[$i]->name}";
							echo "<td style='border:groove;border-width:thin;padding:3px;'>{$row[$fname]}</td>";
						}
					echo "</tr>";
				}
				echo "</table>";
			}
		}
	?> 
    <div class="options">
    	<a href="tableinsert.php" id="insert">Insert</a>  
    	<a href="tableupdate.php" id="update">Update</a>
    </div>
    </div>
    
    <div id="table_list">
    	<table class="list_of_tables" align="center">
        	<tr>
            	<th colspan="2"><h3>TABLES</h3></th>
        	</tr>
    	<?php
			$server = "localhost";
			$dbname = "opencloud";
			$dbusername = "root";
			$dbpassword = "";

			$con=mysql_connect($server,$dbusername,$dbpassword);
  			mysql_select_db($dbname);
			
			$query="select t_id,t_name from tables";
			if($result = mysql_query($query)){
				echo "<tr>
						<th align='left'>t_id</th>
						<th align='center'>t_name</th>
					  </tr>";
				while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
					echo "<tr>
						<td id='slno'>{$row['t_id']}</td>
						<td id='tname' align='center'><a href=''>{$row['t_name']}</a></td>
						</tr>
					";
				}
			}
			echo "<tr>
					<td colspan='2'><br></td>
				  </tr>";			
			echo "<tr>
					<td colspan=''><br></td>
				  </tr>";	  
			echo "<tr>
					<td colspan='2'>Create a new one here....</td>
				  </tr>";
			echo "<form method='post' action='userarea.php'><tr>
					<td colspan='2'>Enter name : <input type='text' name='tname' value=''></td>
				  </tr>
				  <tr>
				  	<td colspan='2'>Type : <select name='ttype'>
						<option selected='selected'>Relational database</option>
						<option>Blob</option>
						<option>File</option>
						</select></td>
				  </tr>
				  <tr>
				  	<td colspan='3' id='submitbutton'>
						<input type='submit' value='Create' name='submit1'/>
					</td>
				  </tr>";	
				  
				if(isset($_POST['submit1']))  {
				if($_POST['tname']!=''){
					$tname = $_POST['tname'];
					$ttype = $_POST['ttype'];
					$insert = "insert into tables (s_id,t_id,t_name,t_type) values (1,3,'$tname', '$ttype')";
					$result = mysql_query($insert);
					if($result){
						header('Location:userarea.php');
					}
					else
						echo "<tr>
								<td colspan='3'>Some error occured while inserting. Try again later.
								</td>
							  </tr>";
					}	  
				}	  
				echo "</table>";
			?>
    </div>
    </div>
<!--    <div id="view_table">
    	this is option bar
    </div>-->
</div>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved.</p>
</div>

</body>
</html>
