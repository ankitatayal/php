
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="css/tables.css">

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
  include('navigation.php');
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


  <?php
   $sql1= "SELECT U_ID,USERNAME,EMAILID,USER_ROLE FROM users LEFT OUTER JOIN roles ON users.USER_ID = roles.USER_ID";
   $retval=mysql_query($sql1,$conn);
   ?>
<div class="outer">
     <div class="add">
       <a href="add_user.php"><button name="add" class="add_btn">ADD NEW USER</button></a>
       </div>
<div class="outer_box">
   <form method = "post" action ="user_list.php">

  <div class="delete">
    <input type="submit" class="del_btn" name="delete" value="DELETE USER"></input>
  </div>

  
<div class="tabular">
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

  echo "</div></div>";

  }

else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
  ?>
</body>
</html>