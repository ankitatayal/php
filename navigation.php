<?php
include ('db_con.php');
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
// $role_id = 1;

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
</head>
<body>
  <div class="menu">
  
  	<p class="site_name">events.com</p>
  	<ul>
  		<li><a href="#">HOME</a></li>
  		<li><a href="#">EVENTS</a></li>
  		<?php 
  		if ( $role_id == 1)
  		{
  			?>
  		
  		<li><a href="#">ROLES</a></li>
  		<li><a href="#">TAXONOMY</a></li>
  		<li><a href="#">USERS</a></li>
  		<?php
  	    }
  		?>
  		<li><a href="#">CONTACTS</a></li>
  	</ul>
  	<p style="display: inline; color: white; position: absolute; left: 90%;"><?php  
echo "$content_name";
  ?></p>
  </div>

</body>
</html>