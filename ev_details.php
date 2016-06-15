
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/tables.css">
</head>
<body>
 <?php
   include ('db_con.php');
 ?>
   <?php
   include('navigation.php');
    $con_id=$_GET['value'];
    $sql15= "SELECT con_name, description, img from event where con_id='$con_id'";
    $ret=mysql_query($sql15,$conn);
    $row5=mysql_fetch_array($ret);
    $img1=$row5['img'];
    ?>
<div class="outer outer_ev">
<div>
  <p class="role_name">
      <?php echo $row5['con_name'];   ?></p><hr></div>
  <div class="outer_box">
  
      <div class="para"><p><?php echo $row5['description']; ?></p></div>
      <div class="ev_image"><?php echo "<img src='imgs/$img1' class='ev_img' width='150px' height='100px' >"; ?></div>
      
    </div>
    </div>

    
</body>
</html>