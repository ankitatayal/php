


<html>
<head>
  <title></title>
  <style>
  body{margin: 0;
  background-color: #1bbc9b;}

      .left{ position: fixed;
        float: left;
        width: 20%;
        height: 100%;
        background-color: #353b47;
        top:12.5%;
        
      }
      
        



              .div4{ position: relative;
        background-color: #32ac97;
        width: 40%;
        height: 40%;
        z-index: -1;
       
       }
       form{
        height: 44%;
        width: 30%;
        margin-top: 20%;
        display: inline-block;
        background-color: #eeeff1;
        margin-left: 40%;
        border: 5px solid #20af8e;
        border-radius: 10px;
       }
.user1
{
height:35px;
    width: 60%;
    border: none;
outline: none;
margin-top: 6%;
margin-left: 20%;
border-radius: 6px;
}
 select{
  width: 40%;
  display: inline-block;
  margin-left: 30%;
  margin-top: 5%;
 }
  #signup{ cursor: pointer;
      color: #52789a;
      /*background: linear-gradient(to bottom, #eaf4f8, #e3f0f5, #dbecf3, #d5e9f1, #cde5ef) ;*/
      background-color: #1abc9b;
      border: 1px solid #23a78c;
      width:60%;
      height: 38px;
      box-shadow: none;
        margin-top: 5%;
       outline:none;
       border-radius: 6px;
       color: white;
       margin-left: 20%;
    }
      .btn{
        cursor: pointer;
        width: 40%;
        height: 40px;}
        .btn1{
          margin-top: 30%;
        }

       

        </style>
</head>
<body>
<?php
include ('db_con.php');
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
if($role_id == 1)
{
?>

<div class="left">
     <a href="role.php"><button class="btn1 btn">ROLES</button></a> 
    <a href="taxonomy.php"><button class="btn btn2"><span>TAXONOMY</span></button></a>
    <a href="add_users.php"><button class="btn btn3"><span>CLICK3</span></button></a>
    <a href="#"><button class="btn btn3"><span>CLICK4</span></button></a>
</div>


<form name="signup_form" method = "post" action = "<?php $_PHP_SELF ?>">
  <input type="text" class="user1" id="user_id" name="username1" placeholder="Username"></input>
  <input type="email" class="user1" id="email_id" name="emailid1" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1" id="pass" name="password1" placeholder="Password"></input>
  
  <?php

    $sql7= "SELECT USER_ID,USER_ROLE FROM roles";
    $r=mysql_query($sql7,$conn);
    echo '<br><select name="s1">';
while($row = mysql_fetch_array($r)) {
    
   $u_role=$row['USER_ROLE'];
    $user_id=$row['USER_ID'];
    if($u_role != "admin" && $u_role != "user")
   echo '<option value="'.$user_id.'"> '.$u_role.' </option>';

    }
    echo '</select>';



  ?>
  
  <input type="submit" id="signup" name="signup" value="SIGN UP"></input>
  </form>

  


<?php
   
        $username1 = $_POST['username1'];
        $pass = $_POST['password1'];
        $mail1 = $_POST['emailid1'];
        $user_type1 = $_POST['s1'];
        
      $password = md5($pass);
       if(!empty($username1)&& !empty($password) && !empty($mail1))

   {     $sql12= "SELECT * FROM users WHERE USERNAME='$username1' ";
          $result= mysql_query($sql12,$conn);
          $result1= mysql_fetch_array($result);
        if($result1)
          {
           echo "<p>Username already exists</p>";
          }
          else
          {
            $sql8= "INSERT INTO users(USERNAME,EMAILID,PASS,PASSWORD,USER_ID)VALUES('$username1','$mail1','$pass','$password',$user_type1)";
         
             mysql_query($sql8, $conn);
             echo"<p>thank you for registering</p>";
          }
   }
 }
 else 
 {
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
 }

  ?>


</body>
</html>