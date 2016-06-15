
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="css/common_forms.css">
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
      include('navigation.php');
       $ret=mysql_query($sql11,$conn);
	   $row5=mysql_fetch_array($ret); 
	    ?>
     
     <div class="container">
 
	  <form method="post" action=" <?php $_PHP_SELF ?> " class="user"> 
<div class="inpt">
<label class="lab">Enter Role:</label>

	    <input type="text" class="user_edit" name="name1" value="<?php echo $row5['USER_ROLE']; ?>"></input>
 </div>   
<div class="inpt">

	    <input type = "Submit" name="btn" id="edit" value="EDIT ROLE"></input>
      </div>
    </form>
    </div>
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
