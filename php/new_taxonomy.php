
  

  
<html>
<head>
	<title></title>

</head>
<body>
  <?php
include ('db_con.php');
session_start();
$admin_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
//$role_id=1;
   if($role_id==1)       //show content only if the logged in user is content manager      
   {  echo "WELCOME $admin_name";
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
  </div>

  <?php
  if(isset($_POST['add2']))
  {
  header("Location: http://localhost/php_project/php/taxonomy.php");

  }
  }
  //if logged in user isn't admin
  else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
  ?>
	

</body>
</html>