
  

  
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

<div class="role">
 <form  method = "post" action = "new_taxonomy.php">
  <input type="text" class="user1" id="event_id" name="tax" placeholder="EVENT TYPE"></input>
  <?php
    $sql11= "SELECT EV_ID,EV_NAME FROM taxonomy";
 
$retval=mysql_query($sql11,$conn);
$tax = $_POST['tax'];
$num_rows = mysql_num_rows($retval);
$num= $num_rows+1;
 echo "<br>existing event types number".$num_rows;

echo '<br><select name="s1">';
while($row = mysql_fetch_array($retval )) {
    
   $ev_tax=$row['EV_NAME'];
  
   echo '<option value="'.$ev_tax.'"> '.$ev_tax.' </option>';
  $x=$row['EV_ID']+1;
   $y=$x-1;
    }
    echo '</select>';

if(!empty($tax))
   {
   	$sql12= "INSERT INTO taxonomy(EV_NAME) VALUES('$tax')";
    mysql_query($sql12,$conn);
    

}

echo "<br>ID OF LATEST ADDED ROLE=". $y ."<br>";

echo "<br>you have to add event type number:".$num;
?>


  <input type="submit" id="signup" name="add2" value="ADD EVENT"></input>
  </form>

  <?php
  if(isset($_POST['add2']))
  {
  header("Location: http://localhost/php_project/new_taxonomy.php#");

  }?>
	
</div>
</body>
</html>