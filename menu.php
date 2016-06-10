
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/home.css">
  <script>$(function() {
  $("a[href*='" + location.pathname + "']").addClass("current");
});</script>
</head>
<body>
   <?php
   include('db_con.php');
   $content_name=$_SESSION['user']; 
   $role_id=$_SESSION['role_id'];
      ?>

  <div class="header">
    <p class="events"> EVENTS.com </p>
    <a href="login.php"><button class="sign">
      <?php 
    if ( $content_name != NULL) 
    echo "$content_name"; 
  else
    { echo "SIGN IN";
      }
      ?>
    </button>
  </a>
  <?php 
    if ( $content_name != NULL) 
    {
      ?>
    
  <a href="logout.php" class="logout">LOGOUT</a>
  <?php 
}
?>
  </div>
  
  	  

  <div class="menu">

  	<ul>
  <li><a href="index.php">HOME</a></li>

  <?php
// $role_id = 1;
     if ($role_id == 1)
     {
     	echo '<li><a href="role.php">ROLES</a></li> ';
        echo '<li><a href="taxonomy.php">TAXONOMY</a></li> ';
        
        echo '<li><a href="user_list.php">USERS</a></li> ';
     }
     echo '<li class="dropdown">
     <a class="dropbtn" href="#home">EVENTS</a>
      <div class="drop-content">
     <a href="ev_display.php">OUR EVENTS</a>';
     if($role_id == 2 || $role_id == 1)
     {
      
     echo '<a href="add_event.php">ADD EVENTS</a>
    </div>
    </li> ';
     }
  ?>

  <li><a href="#about">CONTACT</a></li>
 
	</ul>
    
  </div>


</body>
</html>