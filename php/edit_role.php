
<html>
<head>
	<title></title>
</head>
<body>
  <?php
    
    include ('db_con.php');
    $r_id=$_GET['value'];
    $sql11 = "SELECT USER_ID,USER_ROLE FROM roles WHERE USER_ID = $r_id";
    
    $content_name=$_SESSION['user']; 
    $role_id=$_SESSION['role_id'];
    //$role_id=1;
    if($role_id == 1)
    {
       $ret=mysql_query($sql11,$conn);
	   $row5=mysql_fetch_array($ret); 
	    ?>
	  <form method="post" action=" <?php $_PHP_SELF ?> "> 
	  <p> ENTER EVENT'S TYPE</p>
	    <input type="text" name="name1" value="<?php echo $row5['USER_ROLE']; ?>"></input>
	    <input type = "Submit" name="btn" value="EDIT"></input>
    </form>
    <?php 
          $name1 = $_POST['name1'];
          if(isset($_POST['btn']) && !empty($name1))
          {
          $sql20="UPDATE roles SET USER_ROLE='$name1' WHERE USER_ID='$r_id'";
    mysql_query($sql20,$conn);

    header("Location: http://localhost/php_project/php/role.php");
}
    }
    ?>

</body>
</html>
