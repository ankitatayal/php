
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
   <?php
    
    include ('db_con.php');
    $u_id=$_GET['value'];
    $sql11 = "SELECT U_ID,USERNAME,EMAILID FROM users WHERE U_ID = $u_id";
    $sql12 = "SELECT USER_ID, USER_ROLE FROM roles WHERE USER_ID != 1";
    $content_name=$_SESSION['user']; 
    $role_id=$_SESSION['role_id'];
    $role_id=1;
    if($role_id == 1)
    {  include('menu.php');
       $ret=mysql_query($sql11,$conn);
	   $row5=mysql_fetch_array($ret); 
	    ?>
      <div class="div_role">
  <center><p class="roles">EDIT USER INFORMATION</p></center>
</div>
      <center>
	  <form method="post" action=" <?php $_PHP_SELF ?> " id="user"> 
    <label class="lab">Username:</label><br>
	    <input type="text" class="user1" value="<?php echo $row5['USERNAME']; ?>"></input><hr>
      <label class="lab">Email Id:</label><br>
	    <input type="text" class="user1" value="<?php echo $row5['EMAILID']; ?>"></input><hr>
      <br>
      <label>Role:</label>
      <select name="drpdown" class="drp_role">
	    <?php
	    //dropdown for roles
	    $retval = mysql_query($sql12,$conn);
	while($row = mysql_fetch_array($retval )) {
	    
	    $r_name=$row['USER_ROLE'];
	    $r_id=$row['USER_ID'];
	  
	   echo '<option value="'.$r_id.'"> '.$r_name.' </option>';
	   
	    }
	    echo "</select>";
	    ?>
      <br>
	    <input type = "Submit" name="edit" id="edit" value="EDIT"></input>
    </form>
    </center>
    <?php 
          $name = $_POST['name'];
          $mail = $_POST['mail'];
          $drpdown = $_POST['drpdown'];
          
          if(isset($_POST['edit']) && !empty($name) && !empty($mail))
          {  
          $sql20="UPDATE users SET USERNAME='$name' , EMAILID = '$mail' , USER_ID = $drpdown WHERE U_ID = $u_id";
    mysql_query($sql20,$conn);

   header("Location: http://events.com/user_list.php");
          }
    }
    else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
    ?>

</body>
</html>