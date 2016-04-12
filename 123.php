<form name="login_form" method = "post" action = "<?php $_PHP_SELF ?>">
  <input type="text" class="user1" id="user_id" name="username" placeholder="Username"></input>
  <input type="email" class="user1" id="email_id" name="emailid" placeholder="EMAIL ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1" id="p1" name="password" placeholder="Password"></input>
  <select name="user_type">
  <option value="admin">ADMIN</option>
    <option value="content_manager">CONTENT MANAGER</option>
    <option value="user">OTHERS</option>
  </select>
  <input type="submit" id="signup" name="login1" value="LOGIN"></input>
  </form>



<?php

       $username = $_POST['username'];
       $emailid = $_POST['emailid'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
     

if(!empty($username)&& !empty($password)&& !empty($emailid))
{
  $sql2= 'SELECT * FROM users';

  $p = mysql_query($sql2, $conn);

  while($row = mysql_fetch_array($p))
  { $a_user=$row['USERNAME'];
   $a_pass=$row['PASSWORD'];
   $a_mail=$row['EMAILID'];
    $a_password=md5($a_pass);
  if ($username == $a_user && $password == $a_pass && $emailid == $a_mail && $user_type="admin")
               {
                  
                  echo"admin";
               }
               elseif($username == $a_user && $password == $a_pass && $emailid == $a_mail && $user_type="content_manager")
               {
                
                  echo"ad";
               }
                elseif($username == $a_user && $password == $a_pass && $emailid == $a_mail && $user_type="user")
               {
              
                  echo"admin1";
               }
  }



}
?>





<?php

//This is the directory where images will be saved
$target = "image";
$target = $target . basename( $_FILES['image']['name']);

//This gets all the other information from the form

$file_name = ($_FILES['image']['name']);

$name1 = $_POST['name1'];
   $brief = $_POST['brief'];
   $description = $_POST['description'];



//Writes the information to the database
$sql1= "INSERT INTO event(con_name,brief,img,description) VALUES('$name1','$brief','$file_name','$description')";
         mysql_query($sql1,$conn);
               echo "YOU HAVE UPLOADED: $file_name";

//Writes the photo to the server
if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
{

//Tells you if its all ok
echo "The file ". basename( $_FILES['image']['name']). " has been uploaded, and your event's information has been added to the directory";
}
else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}
?>
   <?php
    /* $name = $_POST['name1'];
   $brief = $_POST['brief'];
   $description = $_POST['description'];
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_name,"..images/".$file_name);
         echo "Success";
         $sql1= "INSERT INTO event(con_name,brief,img,description) VALUES('$name','$brief','$file_name','$description')";
         mysql_query($sql1,$conn);
               echo "YOU HAVE UPLOADED: $file_name";
      }else{
         print_r($errors);
      }

   } */




   <?php
$name = $_POST['name1'];
   $brief = $_POST['brief'];
   $description = $_POST['description'];
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = ($_FILES['image']['name']);
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_temp,"image/".$file_name);
         echo "Success";
         $sql1= "INSERT INTO event(con_name,brief,img,description) VALUES('$name','$brief','$file_name','$description')";
         $retval= mysql_query($sql1,$conn);
         if(!$retval)
               echo "YOU HAVE UPLOADED: $file_name";
      }else{
         print_r($errors);
      }

   } 
   ?>


