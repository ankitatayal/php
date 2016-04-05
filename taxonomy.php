
<html>
<head>
	<title></title>
</head>
<body>
    <?php
$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'inno';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('db_event');
   ?>
   <?php
$sql1= "SELECT * FROM taxonomy";
$retval=mysql_query($sql1,$conn);
 echo '<form method = "post" action ="taxonomy.php">';
   echo "<table>";
  echo "<tr> <th>EVENT ID</th> <th>EVENT TYPE</th> <th>SELECT</th> </tr>";

 
  while($row = mysql_fetch_array($retval )) {
    
 $ev_id= $row['EV_ID'];
  $ev_name=$row['EV_NAME'];

    
    echo "<tr>";
    echo '<td>' . $ev_id . '</td>';
    echo '<td>' . $ev_name . '</td>';
    echo '<td><input type="Checkbox" name="checkbox_ev" value="'.$ev_id.'"></input></td>';
    echo "</tr>"; 
  } 
    
  echo "</table>";
  echo '<a href=""><input type="submit" id="ev" name="ev_add" value="ADD NEW EVENT TYPE"></input></a>';
echo '<input type="submit" id="del" name="delete_ev" value="delete"></input>';
echo '</form>';

$checkbox = $_POST['checkbox_ev'];
if(isset($_POST['delete_ev']))
  {
  $sql4 = "DELETE FROM taxonomy WHERE EV_ID=".$checkbox;
  mysql_query($sql4);
  header("Location: http://localhost/php_project/taxonomy.php#");

  }
?>
</body>
</html>