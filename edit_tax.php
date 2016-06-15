
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/common_forms.css">
</head>
<body>
  <?php
    
    include ('db_con.php');
    $ev_id = $_GET['value'];
    $sql11 = "SELECT EV_ID,EV_NAME FROM taxonomy WHERE EV_ID=$ev_id";
    $content_name = $_SESSION['user']; 
    $role_id = $_SESSION['role_id'];
    $role_id = 1;
    if($role_id == 1)
    {
      include('navigation.php');
       $ret=mysql_query($sql11,$conn);
	   $row5=mysql_fetch_array($ret); 
	    ?>
<div class="container">
	  <form method="post" action=" <?php $_PHP_SELF ?> " class="user"> 
    <div class="inpt">
	    <label class="lab">Enter Taxonomy Term:</label>
	    <input type="text" name="name1" class="user_edit" value="<?php echo $row5['EV_NAME']; ?>"></input>
    </div>
      <div class="inpt">
	    <input type = "Submit" name="btn" id="edit" value="EDIT TAXONOMY"></input>
      </div>
    </form>
    </div>
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
