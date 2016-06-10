
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
  <?php
    
    include ('db_con.php');
    $r_id=$_GET['value'];
    $sql11 = "SELECT USER_ID,USER_ROLE FROM roles WHERE USER_ID = $r_id";
    
    $content_name=$_SESSION['user']; 
    $role_id=$_SESSION['role_id'];
    $role_id=1;
    if($role_id == 1)
    {  
      include('menu.php');
       $ret=mysql_query($sql11,$conn);
	   $row5=mysql_fetch_array($ret); 
	    ?>
      <div class="div_role">
  <center><p class="roles">EDIT ROLE NAME</p></center>
</div>
<center>
	  <form method="post" action=" <?php $_PHP_SELF ?> " id="user"> 
<label class="lab">Role Name:</label><br>
	    <input type="text" class="user1" name="name1" value="<?php echo $row5['USER_ROLE']; ?>"></input>
      <hr><br>
	    <input type = "Submit" name="btn" id="edit" value="EDIT ROLE"></input>
    </form>
    </center>
    <?php 
          $name1 = $_POST['name1'];
          if(isset($_POST['btn']) && !empty($name1))
          {
          $sql20="UPDATE roles SET USER_ROLE='$name1' WHERE USER_ID='$r_id'";
    mysql_query($sql20,$conn);

    header("Location: http://events.com/role.php");
}
    }
    else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
    ?>

</body>
</html>
