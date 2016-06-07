
<html>
<head>
	<title></title>
	<style>
      table,th,td{
      	border:1px solid black;
      }
      table
      {
      	border-collapse: collapse;
      }

	</style>

</head>
<body>

<?php                       //the list of all the users
include ('db_con.php');
//when checkbox is checked and delete is pressed
//print_r($check);
//print_r($_POST['delete']);
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
//$role_id = 1;
$id=$_SESSION['u_id'];

  if($role_id==1)
 {
$check = $_POST['checkbox'];
if(isset($_POST['delete']))
  {
    foreach ($check as $chk) 
    {
      $sql14 = "DELETE FROM users WHERE U_ID=" . $chk;
      mysql_query($sql14);
    }

      
      header("Location: http://localhost/php_project/php/user_list.php");
  }

?>

  <?php
   $sql1= "SELECT U_ID,USERNAME,EMAILID,USER_ROLE FROM users LEFT OUTER JOIN roles ON users.USER_ID = roles.USER_ID";
   $retval=mysql_query($sql1,$conn);
   echo '<form method = "post" action ="user_list.php">';
   echo "<table>";
   echo "<tr> <th>ID</th> <th>USERNAME</th> <th>EMAIL ID</th><th>ROLE</th><th>SELECT</th> ";


   while($row = mysql_fetch_array($retval )) 
   { 
   $u_id= $row['U_ID'];
   $u_user=$row['USERNAME'];
   $u_mail=$row['EMAILID'];
   $u_role=$row['USER_ROLE'];
    
    echo "<tr>";
    echo '<td>' . $u_id . '</td>';
    echo '<td>' . $u_user . '</td>';
    echo '<td id="abc">' . $u_mail . '</td>';
    echo '<td>' . $u_role . '</td>';
    echo '<td> <a href="edit_user.php?value='.$u_id. '">Edit</a> </td>';
    echo '<td><input type="Checkbox" name="checkbox[]" value="'.$u_id.'"></input></td>';
    
    echo "</tr>"; 
  } 
    
    echo "</table>";
    if($role_id==1)
    {
    echo '<input type="submit" id="del" name="delete" value="delete"></input>';
}
echo '</form>';
if($role_id==1)
{
echo '<a href="add_user.php"><button name="add" id="add">ADD USERS</button></a>';
}
  }

else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
  ?>
</body>
</html>