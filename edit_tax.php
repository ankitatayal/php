
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
  <?php
    
    include ('db_con.php');
    $ev_id=$_GET['value'];
    $sql11 = "SELECT EV_ID,EV_NAME FROM taxonomy WHERE EV_ID=$ev_id";
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
  <center><p class="roles">EDIT TAXONOMY TERM</p></center>
</div>
<center>
	  <form method="post" action=" <?php $_PHP_SELF ?> " id="user"> 
	  <label class="lab">Taxonomy Term:</label><br>
	    <input type="text" name="name1" class="user1" value="<?php echo $row5['EV_NAME']; ?>"></input><hr>
      <br>
	    <input type = "Submit" name="btn" id="edit" value="EDIT TAXONOMY"></input>
    </form>
    </center>
    <?php 
          $name1 = $_POST['name1'];
          if(isset($_POST['btn']) && !empty($name1))
          {
          $sql20="UPDATE taxonomy SET EV_NAME='$name1' WHERE EV_ID='$ev_id'";
    mysql_query($sql20,$conn);

    header("Location: http://events.com/taxonomy.php");
}
    }
    ?>

</body>
</html>
