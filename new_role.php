
<html>
<head>
	<title></title>

</head>
<body>
  <?php                  //to add new user roles
include ('db_con.php');
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
//$role_id=1;
   
 if($role_id==1)
 {?>
<div class="role">
 <form  method = "post" action = "new_role.php">
  <input type="text" class="user1" id="user_id" name="role" placeholder="ROLE NAME"></input>
  <?php
    $sql11= "SELECT USER_ID,USER_ROLE FROM roles";  
 
$retval=mysql_query($sql11,$conn);
$role = $_POST['role'];
$num_rows = mysql_num_rows($retval);
$num= $num_rows+1;
 echo "<br>existing roles number".$num_rows;

echo '<br><select name="s1">';
while($row = mysql_fetch_array($retval )) {
    
   $u_role=$row['USER_ROLE'];
  
   echo '<option value="'.$u_role.'"> '.$u_role.' </option>';
   $x=$row['USER_ID']+1;
   $y=$x-1;

    }
    echo '</select>';

if(!empty($role))
   {
   	$sql12= "INSERT INTO roles VALUES('$x','$role')";
    mysql_query($sql12,$conn);
    

}

echo "<br>ID OF LATEST ADDED ROLE=". $y ."<br>";

echo "<br>you have to add role number:".$num;
?>


  <input type="submit" id="signup" name="add1" value="ADD ROLE"></input>
  </form>

  <?php
  if(isset($_POST['add1']))
  {
  header("Location: http://localhost/php_project/php/role.php");

  }
  }
  //if logged in user isn't admin
else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}?>
	
</div>
</body>
</html>