
<html>
<head>
	<title></title>
</head>
<body>
   <?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'inno';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db('db_event');
      session_start();
   ?>
</body>
</html>