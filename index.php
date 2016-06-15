<?php
include ('db_con.php');
include('navigation.php');
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.1.js"></script>
<script src="js/a.js"></script>
</head>
<body>
<div class="background">
<?php 
  if(!isset($_SESSION['user']))  {
?>

	<form  method = "post" action = "login.php" name="login_form" class="login_form">
  <input type="text" class="user1"  name="username" placeholder="Username"></input>
  <input type="email" class="user1"  name="emailid" placeholder="Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1"  name="password" placeholder="Password"></input>
<br>
  <input type="submit" id="edit" class="login_btn" name="login1" value="SIGN IN"></input>
  </form>


  


  <br>
  <p class="register">Not a Member? Create Your Account.</p>
<?php   }  ?>
  <form name="signup_form" method = "post" action = "signin.php" class="signup_form">
<center><label class="signup_label">SIGN UP TO FIND OUT MORE!</label></center>
  <input type="text" class="user1 username"  name="username1" placeholder="Username"></input>
  <input type="email" class="user1"  name="emailid1" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1"  name="password1" placeholder="Password"></input>
  <br>
      <label class="role_label">Role:</label>
      <select name = "s1" class = "drp_role">
   <?php
   $sql7 = "SELECT USER_ID,USER_ROLE FROM roles WHERE USER_ID != 1";
    $r = mysql_query($sql7,$conn);
    
while($row = mysql_fetch_array($r)) 
   {
    
   $u_role = $row['USER_ROLE'];
   $role_id = $row['USER_ID'];
   echo '<option value = "'.$role_id.'"> '.$u_role.' </option>';

    }
    echo '</select>';
    ?>
    <br>
  <input type="submit" id="edit" name="signup" class="signin_btn" value="SIGN UP"></input>
  </form>
 <div class="disc">
 	<div class="discover">EXPLORE</div>
 </div> 

</div>

<div class="footer">
	
</div>


</body>
</html>





