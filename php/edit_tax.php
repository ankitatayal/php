
<html>
<head>
	<title></title>
</head>
<body>
  <?php
    
    include ('db_con.php');
    $ev_id=$_GET['value'];
    $sql11 = "SELECT EV_ID,EV_NAME FROM taxonomy WHERE EV_ID=$ev_id";
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
	    <input type="text" name="name1" value="<?php echo $row5['EV_NAME']; ?>"></input>
	    <input type = "Submit" name="btn" value="EDIT"></input>
    </form>
    <?php 
          $name1 = $_POST['name1'];
          if(isset($_POST['btn']) && !empty($name1))
          {
          $sql20="UPDATE taxonomy SET EV_NAME='$name1' WHERE EV_ID='$ev_id'";
    mysql_query($sql20,$conn);

    header("Location: http://localhost/php_project/php/taxonomy.php");
}
    }
    ?>

</body>
</html>
