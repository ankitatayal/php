
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
 <?php
   include ('db_con.php');
 ?>
   <?php
   include('menu.php');
  
    $con_id=$_GET['value'];
    $sql15= "SELECT con_name, description, img from event where con_id='$con_id'";
    $ret=mysql_query($sql15,$conn);
    $row5=mysql_fetch_array($ret);
    $img1=$row5['img'];
    ?>

      <div class="ev_details">
      <p class="ev_p"><?php echo $row5['con_name'];   ?></p>
      <hr>
      <div class="para"><p><?php echo $row5['description']; ?></p></div>
      
      <?php echo "<img src='imgs/$img1' class='ev_img' width='100px' height='100px' >"; ?>
    </div>

    
</body>
</html>