
<html>
<head>
  <title></title>
</head>
<body>
 <?php
   include ('db_con.php');
 ?>
   <?php
    $con_id=$_GET['value'];
    $sql15= "SELECT con_name, description, img from event where con_id='$con_id'";
    $ret=mysql_query($sql15,$conn);
    $row5=mysql_fetch_array($ret);
    $img1=$row5['img'];
    echo "<h1>".$row5['con_name']."</h1>";
    echo "<pre>".$row5['description']."</pre>";
    echo "<img src='../imgs/$img1' width='100px' height='100px' >";
    echo "<br>";
   ?>
</body>
</html>