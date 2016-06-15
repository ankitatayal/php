
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
   $content_name=$_SESSION['user']; 


      $role_id = $_SESSION['role_id'];

 if($role_id == 1)
 {
  include('navigation.php');
  ?>
<div class="outer">
<?php
$sql1 = "SELECT EV_ID,EV_NAME FROM taxonomy";
$retval=mysql_query($sql1,$conn);
 echo '<form method = "post" action ="taxonomy.php" enctype="multipart/form-data">';
 ?>
  <div class="add">
  <input type="text" class="new" placeholder="Enter Taxonomy Term" name="new"></input>
  <input type="submit" class="add_btn" name="add_ev"  value="ADD TAXONOMY"></input>
  </div>
  
 
  <div class="view">
    <div class="tab">TABLE VIEW</div>
  <div class="grid">GRID VIEW</div>
  </div>
  <div class="outer_box">
  <div class="delete">  
   <input type="submit" class="del_btn" name="delete_ev" value="DELETE TAXONOMY"></input>';  
  </div>
   <div class="container">
  <?php

   while($row = mysql_fetch_array($retval )) 
   { 
   $ev_id= $row['EV_ID'];
   $ev_name=$row['EV_NAME'];
   ?>
    <div class="box">
  <h3> <?php echo '<a href="user_details.php?value='.$ev_id.'">'.$ev_name.'</a>'; ?></h3>
  <hr>
  <p>EVENT ID: <?php echo $ev_id; ?></p>
<?php
  
  echo ' <a href="edit_tax.php?value='.$ev_id. '">Edit Taxonomy Term</a> ';

    echo '<br><p style="display:inline">Delete This Taxonomy Term</p><input type="Checkbox" name="checkbox_ev[]" value="'.$ev_id.'"></input>';
    ?>
</div>
<?php 
}
?>
</div>

<div class="tabular">
<table>
 <?php

  echo "<tr> <th>TAXONOMY ID</th> <th>TAXONOMY TERM</th> <th>EDIT</th> <th>SELECT </th> </tr>";

 $retval=mysql_query($sql1,$conn);
  while($row = mysql_fetch_array($retval ))
   {
    
 $ev_id= $row['EV_ID'];
  $ev_name=$row['EV_NAME'];

    
    echo "<tr>";
    echo '<td>' . $ev_id . '</td>';
    echo '<td>' . $ev_name . '</td>';
    echo '<td> <a href="edit_tax.php?value='.$ev_id. '">Edit This </a> </td>';
    echo '<td><input type="Checkbox" name="checkbox_ev[]" value="'.$ev_id.'"></input></td>';
    
    echo "</tr>"; 
  } 
    
   echo "</div></div></form></div>";

 
  if (isset($_POST['add_ev'])) {
    $new = $_POST['new'];
    $sql12= "INSERT INTO taxonomy(EV_NAME) VALUES('$new')";
    mysql_query($sql12,$conn);
    header("Location: http://events.com/taxonomy.php");
  }
$checkbox = $_POST['checkbox_ev'];
if(isset($_POST['delete_ev']))
  {
    foreach ($checkbox as $check) 
    {
        $sql4 = "DELETE FROM taxonomy WHERE EV_ID = ".$check;
  mysql_query($sql4);
    }

  header("Location: http://events.com/taxonomy.php");
  }
}
else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
?>

</body>
</html>