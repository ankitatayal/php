<?php
  $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'inno';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('db_event');
$role_id=$_SESSION['role_id'];
   $content_name=$_SESSION['user']; 
   //$role_id=1;
   if($role_id==2 || $role_id==1)       //show content only if the logged in user is content manager or admin  
	   {
$con_id=$_GET['value'];
$sql4 = "DELETE FROM event WHERE con_id= '$con_id' ";
  mysql_query($sql4);
  header("Location: http://localhost/php_project/php/ev_display.php");
  }
//if logged in user isn't content manager or admin
else
{
	echo "SORRY YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
  ?>