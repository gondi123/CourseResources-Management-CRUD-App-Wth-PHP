<html>
<head>
<style>
body{
	background-image:url("1.jpg");
		      
   }
h1{
background-color:rgb(123,165,210); 
	height:70;
	text-align:center;
	font-size:38px;
transform:skewy(80);
}

	</style></head>
<body>
<br/><br/>
<center><h1>Upload Here</h1></center>
<br/><br/>
<?php
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

//include 'library/config.php';
include 'connect.inc.php';

$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

mysql_query($query) or die('Error, query failed');
//include 'library/closedb.php';

echo "<br>File $fileName uploaded<br>";
}
?>
<form method="post" enctype="multipart/form-data" action='upload.php'>
<fieldset>
<legend><font color='blue'>Upload</font></legend>
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile" >
<br/><br/>
<input name="upload" type="submit"  value=" Upload "></td>
</fieldset>
</form>

</body>
</html>
