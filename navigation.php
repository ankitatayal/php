<?php
include ('db_con.php');
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
// $role_id = 1;

?>
<html>
<script>$(function() {
  $("a[href*='" + location.pathname + "']").addClass("current");
});</script>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
</head>
<body>
  <div class="menu">
  
  	<div class="site_name">events.com</div>
    <?php 
      if ($content_name)
      {
        ?>
        
  	<ul>
  		<li><a href="index.php">HOME</a></li>
  		<li><a href="ev_display.php">EVENTS</a></li>
  		<?php 
  		if ( $role_id == 1)
  		{
  			?>
  		
  		<li><a href="role.php">ROLES</a></li>
  		<li><a href="taxonomy.php">TAXONOMY</a></li>
  		<li><a href="user_list.php">USERS</a></li>
  		<?php
  	    }
  		?>
  		<li><a href="#">CONTACTS</a></li>
  	</ul>
    
          <?php
        }
      ?>
    <div class="name">
      <p><?php  
echo "$content_name";
  ?></p>
  <a class="logout" href="logout.php">LOG OUT</a>
    </div>
  	

  </div>

</body>
</html>