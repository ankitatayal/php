
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="css/role.css">
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
  include('menu.php');
  ?>
  <div class="div_role">
  <center><p class="roles">TAXONOMY TERMS</p></center>
</div>
<?php
$sql1 = "SELECT EV_ID,EV_NAME FROM taxonomy";
$retval=mysql_query($sql1,$conn);
 echo '<form method = "post" action ="taxonomy.php" enctype="multipart/form-data">';
 ?>
 <center>
  <div class="del_add">
    <p style="display: inline-block;">Select the taxonomy terms you want to delete and then press DELETE button.</p>
    <?php    echo '<input type="submit" id="del" name="delete_ev" value="DELETE"></input>';  ?>
    <br>
    <p>Enter a taxonomy term if you want to add a new taxonomy term</p>
    <?php echo '<input type="text" id="new" name="new"></input>';
      echo '<input type="submit" id="add" name="add_ev" value="ADD"></input>'; ?>

  </div>
  </center>
  <center>
  <div class="view">
    <div class="tab">TABLE VIEW</div>
  <div class="grid">GRID VIEW</div>
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
</center>
<center><div class="tabular">
<table>
 <?php

  echo "<tr> <th>TAXONOMY ID</th> <th>TAXONOMY TERM</th> <th>EDIT</th> <th>DELETE </th> </tr>";

 $retval=mysql_query($sql1,$conn);
  while($row = mysql_fetch_array($retval ))
   {
    
 $ev_id= $row['EV_ID'];
  $ev_name=$row['EV_NAME'];

    
    echo "<tr>";
    echo '<td>' . $ev_id . '</td>';
    echo '<td>' . $ev_name . '</td>';
    echo '<td> <a href="edit_tax.php?value='.$ev_id. '">Edit This Taxonomy Term</a> </td>';
    echo '<td><input type="Checkbox" name="checkbox_ev[]" value="'.$ev_id.'"></input></td>';
    
    echo "</tr>"; 
  } 
    
  echo "</table>";
  echo "</div></center>";
  //   echo '<input type="text" name="new"></input>';
  // echo '<input type="submit" name="delete_ev" value="delete"></input>';
  // echo '<input type="submit" name="add_ev" value="ADD"></input>';
  echo '</form>';
  //echo '<a href="new_taxonomy.php"><button>Add Event Type</button></a>';
  //echo '<a href="edit_tax.php?value = '$new' "><button name="btn2">Add Event Type</button></a>';
 
  if(isset($_POST['add_ev']))
  { $new = $_POST['new'];
    $sql12= "INSERT INTO taxonomy(EV_NAME) VALUES('$new')";
    mysql_query($sql12,$conn);
    header("Location: http://events.com/taxonomy.php");
  }
$checkbox = $_POST['checkbox_ev'];
if(isset($_POST['delete_ev']))
  {
    foreach ($checkbox as $check) 
    {
        $sql4 = "DELETE FROM taxonomy WHERE EV_ID=".$check;
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