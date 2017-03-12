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
<center><h1>Download Here</h1></center>

<?php
    require 'connect.inc.php';

    $query = "SELECT id, name FROM upload";
    $result = mysql_query($query) or die('Error, query failed');

    if(mysql_num_rows($result)==0){
        echo "Database is empty <br>";
    }
    else{
        while(list($id, $name) = mysql_fetch_array($result)){
            echo "<a href=\"download.php?id=\$id\">$name</a><br>";
        }
    }

    if(isset($_GET['id'])){
        $id    = $_GET['id'];   
        $query = "SELECT name, type, size, content FROM upload WHERE id = '$id'";       
        $result = mysql_query($query) or die('Error, query failed');
        list($name, $type, $size, $content) =  mysql_fetch_row($result);
        header("Content-Disposition: attachment; filename=\"$name\"");
        header("Content-type: $type");
        header("Content-length: $size");
        print $content;
    }
?>
</body>
</head>