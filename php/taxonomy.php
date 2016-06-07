
<html>
<head>
	<title></title>
</head>
<body>
    <?php
    include ('db_con.php');
   ?>
   <?php
   $content_name=$_SESSION['user']; 

//$role_id=1;
      $x=$_SESSION['role_id'];
 if($x==1)
 {

$sql1 = "SELECT EV_ID,EV_NAME FROM taxonomy";
$retval=mysql_query($sql1,$conn);
 echo '<form method = "post" action ="taxonomy.php" enctype="multipart/form-data">';
   echo "<table>";
  echo "<tr> <th>EVENT ID</th> <th>EVENT TYPE</th> <th>SELECT</th> </tr>";

 
  while($row = mysql_fetch_array($retval ))
   {
    
 $ev_id= $row['EV_ID'];
  $ev_name=$row['EV_NAME'];

    
    echo "<tr>";
    echo '<td>' . $ev_id . '</td>';
    echo '<td>' . $ev_name . '</td>';
    echo '<td> <a href="edit_tax.php?value='.$ev_id. '">Edit</a> </td>';
    echo '<td><input type="Checkbox" name="checkbox_ev[]" value="'.$ev_id.'"></input></td>';
    
    echo "</tr>"; 
  } 
    
  echo "</table>";
    echo '<input type="text" name="new"></input>';
  echo '<input type="submit" name="delete_ev" value="delete"></input>';
  echo '<input type="submit" name="add_ev" value="ADD"></input>';
  echo '</form>';
  //echo '<a href="new_taxonomy.php"><button>Add Event Type</button></a>';
  //echo '<a href="edit_tax.php?value = '$new' "><button name="btn2">Add Event Type</button></a>';
 
  if(isset($_POST['add_ev']))
  { $new = $_POST['new'];
    $sql12= "INSERT INTO taxonomy(EV_NAME) VALUES('$new')";
    mysql_query($sql12,$conn);
    header("Location: http://localhost/php_project/php/taxonomy.php");
  }
$checkbox = $_POST['checkbox_ev'];
if(isset($_POST['delete_ev']))
  {
    foreach ($checkbox as $check) 
    {
        $sql4 = "DELETE FROM taxonomy WHERE EV_ID=".$check;
  mysql_query($sql4);
    }

  header("Location: http://localhost/php_project/php/taxonomy.php");
  }
}
else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
?>
</body>
</html>