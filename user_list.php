
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="css/role.css">

</head>
<body>

<?php                       //the list of all the users
include ('db_con.php');
//when checkbox is checked and delete is pressed
//print_r($check);
//print_r($_POST['delete']);
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
$role_id = 1;
$id=$_SESSION['u_id'];

  if($role_id==1)
 {
  include('menu.php');
$check = $_POST['checkbox'];
if(isset($_POST['delete']))
  {
    foreach ($check as $chk) 
    {
      $sql14 = "DELETE FROM users WHERE U_ID=" . $chk;
      mysql_query($sql14);
    }

      
      header("Location: http://events.com/user_list.php");
  }

?>
<div class="div_role">
  <center><p class="roles">LIST OF USERS</p></center>
</div>

  <?php
   $sql1= "SELECT U_ID,USERNAME,EMAILID,USER_ROLE FROM users LEFT OUTER JOIN roles ON users.USER_ID = roles.USER_ID";
   $retval=mysql_query($sql1,$conn);
   ?>
   <center>
     <div class="del_add">
<p style="display: inline-block;">Click on ADD USER if you want to add a new user</p>
       <?php echo '<a href="add_user.php"><button name="add" id="add">ADD USER</button></a>'; ?>
       </div>
  </center>
   <form method = "post" action ="user_list.php">
<center>
  <div class="del_add" style="margin-top: 2%">
    <p style="display: inline-block;">Select the taxonomy terms you want to delete and then press DELETE button.</p>
    <?php    echo '<input type="submit" id="del" name="delete" value="DELETE"></input>';  ?>


  </div>
  </center>

    <div class="view">
    <div class="tab">TABLE VIEW</div>
  <div class="grid">GRID VIEW</div>
  </div>
  
<center><div class="tabular">
  <table>
   <tr> <th>ID</th> <th>USERNAME</th> <th>EMAIL ID</th><th>ROLE</th><th>EDIT</th> <th>DELETE</th> 
<?php

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
    echo '<td> <a href="edit_user.php?value='.$u_id. '">Edit User Information</a> </td>';
    echo '<td><input type="Checkbox" name="checkbox[]" value="'.$u_id.'"></input></td>';
    
    echo "</tr>"; 
  } 
    
    echo "</table>";

   

echo '</form>';

  echo "</div></center>";

  }

else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
  ?>
</body>
</html>