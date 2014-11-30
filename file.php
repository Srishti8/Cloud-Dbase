<?php
session_start();
$i=$_SESSION['login_user']; 
echo "Hello $i" ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<html>
<head>
<title>File Uploading Form</title>
</head>
<body>
    <form action="file_uploader.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_file"><br>
        <input type="submit" value="Upload file">
    </form>
    <p>
        <a href="list_files.php">See all files</a>
    </p>
</body>
</html>
<body>
</body>
</html>