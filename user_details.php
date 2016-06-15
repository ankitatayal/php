
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="css/tables.css">
</head>
<body>
<?php
include ('db_con.php');                     //from role.php
$content_name = $_SESSION['user']; 
$role_id = $_SESSION['role_id'];
//$role_id=1;
?>
 <?php
 if($role_id == 1)
 {
    include('navigation.php');
$user_id = $_GET['value'];
$sql5 = "SELECT USER_ROLE FROM roles WHERE USER_ID=$user_id"; //for role name
$sql3 = "SELECT U_ID,USERNAME,EMAILID,USER_ROLE FROM users,roles WHERE roles.USER_ID=users.USER_ID AND roles.USER_ID= $user_id ";   //for enteries under role name
$retval = mysql_query($sql3,$conn);
$result = mysql_query($sql5);
$row1 = mysql_fetch_array($result);
echo '<div class="outer"><div>
  <p class="role_name">MEMBERS REGISTERED UNDER ROLE: ' . $row1['USER_ROLE'] . '</p><hr>
</div>';
?>
<div class="outer_box">
<div class="tabular">
  <?php  
   echo "<table>";
   echo "<tr> <th>USER ID</th> <th>USER NAME</th> <th>EMAIL</th> </tr>";
   while($row = mysql_fetch_array($retval)) 
   { 
    $u_id = $row['U_ID'];
    $u_name = $row['USERNAME'];
    $u_mail = $row['EMAILID'];
    echo "<tr>";
    echo '<td>' . $u_id . '</td>';
    echo '<td>' . $u_name . '</td>';
    echo '<td>' . $u_mail . '</td>';

    echo "</tr>"; 
  } 
    
    echo "</table> </div></div></div>";
  }


  else{
    echo "SORRY YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
  }
 ?>
</body>
</html>