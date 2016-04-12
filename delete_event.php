<?php
  $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'inno';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('db_event');
$con_id=$_GET['value'];
$sql4 = "DELETE FROM event WHERE con_id= '$con_id' ";
  mysql_query($sql4);
  header("Location: http://localhost/php_project/ev_display.php#");
  ?>