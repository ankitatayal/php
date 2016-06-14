
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/common_forms.css">
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
    {  include('navigation.php');
       $ret=mysql_query($sql11,$conn);
	   $row5=mysql_fetch_array($ret); 
	    ?>
<div class="container">
	  <form method="post" action=" <?php $_PHP_SELF ?> " class="user"> 
    <div class="inpt">
    <label class="lab">Username:</label><br>  
	    <input type="text" class="user_edit" value="<?php echo $row5['USERNAME']; ?>"></input>
      </div>
      <div class="inpt">
      <label class="lab">Email Id:</label><br>
	    <input type="text" class="user_edit" value="<?php echo $row5['EMAILID']; ?>"></input>
      </div>
      <div class="inpt">
      <label class="lab_role">Role:</label>
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
      </div>
      <div class="inpt">
	    <input type = "Submit" name="edit" id="edit" value="EDIT USER"></input></div>
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