<?php
                              $host='localhost';
							  $user='root';
							  $pass='1234';
							  $db='test';
							if( !mysql_connect($host,$user,$pass) || !mysql_select_db($db))
							{
							die('could not connect');
							}else
							{
								//echo' conected';
							}

?>