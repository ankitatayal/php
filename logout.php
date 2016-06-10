
  <?php


// Delete certain session
  include('db_con.php');
// unset($_SESSION['username']);
// Delete all session variables
session_destroy();

// Jump to login page
header('Location: http://events.com/index.php');

?>
