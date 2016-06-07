
<html>
<head>
	<title></title>
</head>
<body>
   <?php
    
    include ('db_con.php');
    $u_id=$_GET['value'];
    $sql11 = "SELECT U_ID,USERNAME,EMAILID FROM users WHERE U_ID = $u_id";
    $sql12 = "SELECT USER_ID, USER_ROLE FROM roles WHERE USER_ID != 1";
    $content_name=$_SESSION['user']; 
    $role_id=$_SESSION['role_id'];
    //$role_id=1;
    if($role_id == 1)
    {
       $ret=mysql_query($sql11,$conn);
	   $row5=mysql_fetch_array($ret); 
	    ?>
	  <form method="post" action=" <?php $_PHP_SELF ?> "> 
	  <p> ENTER USER INFORMATION</p>
	    <input type="text" name="name" value="<?php echo $row5['USERNAME']; ?>"></input>
	    <input type="text" name="mail" value="<?php echo $row5['EMAILID']; ?>"></input>
	    <?php
	    //dropdown for roles
	    $retval = mysql_query($sql12,$conn);
	    echo '<br><select name="drpdown">';
	while($row = mysql_fetch_array($retval )) {
	    
	    $r_name=$row['USER_ROLE'];
	    $r_id=$row['USER_ID'];
	  
	   echo '<option value="'.$r_id.'"> '.$r_name.' </option>';
	   
	    }
	    echo "</select>";
	    ?>
	    <input type = "Submit" name="edit" value="EDIT"></input>
    </form>
    <?php 
          $name = $_POST['name'];
          $mail = $_POST['mail'];
          $drpdown = $_POST['drpdown'];
          
          if(isset($_POST['edit']) && !empty($name) && !empty($mail))
          {  
          $sql20="UPDATE users SET USERNAME='$name' , EMAILID = '$mail' , USER_ID = $drpdown WHERE U_ID = $u_id";
    mysql_query($sql20,$conn);

   header("Location: http://localhost/php_project/php/user_list.php");
          }
    }
    ?>

</body>
</html>