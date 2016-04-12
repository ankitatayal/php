<html>
<head>
  <title></title>
  <style>
  body{margin: 0;
  background-color: #1bbc9b;}

      .left{ position: fixed;
        width: 20%;
        height: 100%;
        background-color: #353b47;
        display: inline-block;
        float: left;
        top: 12.5%;
      }
      table{
        border-collapse: collapse;
        width: 60%;
        border:1px solid #ddd;
        display: inline-block;
        
      }
      th,td{
        width: 30%;
        text-align: left;
        padding: 8px;
        border:1px solid #ddd;
        text-align: justify;
      }
      th{
        background-color: #353b47;
        color: white;
      }
      tr{background-color: #ebf1ef;}
      tr:nth-child(odd){background-color: #f17c72;}


      form{
        width: 35%;
        height: 10px;
        margin-top: 200px;
        position: relative;
        display: inline-block;
        margin-left: 30%;
        margin-top: 0;
      }
      #del{ cursor: pointer;
      color: #52789a;
      /*background: linear-gradient(to bottom, #eaf4f8, #e3f0f5, #dbecf3, #d5e9f1, #cde5ef) ;*/
      background-color: #353b47;
      border: 1px solid #23a78c;
      width:30%;
      height: 38px;
      box-shadow: none;
        margin-top: 5%;
       outline:none;
       border-radius: 6px;
       color: white;
       float: right;
    }
    #add{
      margin-top: 50%;
    }

      </style>
      </head>
      <body>
        <?php
include ('master.php');
?>

<div class="left">

</div>


<?php
$sql1= "SELECT U_ID,USERNAME,EMAILID,USER_ROLE FROM users,roles where users.USER_ID = roles.USER_ID";
$retval=mysql_query($sql1,$conn);
?>
 <form method = "post" action ="role.php">
  <table>
 <tr> <th>ID</th> <th>USERNAME</th> <th>EMAIL ID</th><th>ROLE</th><th>SELECT</th> </tr>

 <?php
  while($row = mysql_fetch_array($retval )) {
    
 $u_id= $row['U_ID'];
  $u_user=$row['USERNAME'];
   $u_mail=$row['EMAILID'];
   $u_role=$row['USER_ROLE'];
    
    echo "<tr>";
    echo '<td>' . $u_id . '</td>';
    echo '<td>' . $u_user . '</td>';
    echo '<td>' . $u_mail . '</td>';
    echo '<td>' . $u_role . '</td>';
    echo '<td><input type="Checkbox" name="checkbox" value="'.$u_id.'"></input></td>';
    echo "</tr>"; 
  } 
  ?>
    
 </table>
  
<input type="submit" id="del" name="delete" value="delete"></input>
</form>
<a href="new_role.php"><button name="add" id="add">ADD NEW ROLE</button></a>
<?php
$checkbox = $_POST['checkbox'];
if(isset($_POST['delete']))
  {
  $sql4 = "DELETE FROM users WHERE U_ID=".$checkbox;
  mysql_query($sql4);
  header("Location: http://localhost/php_project/role.php#");

  }
?>

      </body>

      </html>

