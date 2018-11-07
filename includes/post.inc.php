<?php
session_start();
if (isset($_POST['submit'])) {
  include_once'dbm.inc.php';

  $context  =   mysqli_real_escape_string($conn, $_POST['context']);
  $date     =   date("d/m/y h:i:s");
  $user     =   $_SESSION['u_uid'];

  //errrrorrrs
  //check for empty dialogue
  if (empty($context)) {
    header("Location: ../forum.php?form=empty");
    exit();
  // when dialog box contains characters
  }else {
        $sql = "INSERT INTO posts (p_context, p_date, p_user)
              VALUES('$context','$date','$user');";
              mysqli_query($conn, $sql);
              header("Location: ../post.php?post=sucess");
              exit();
  }

} else {
  header("Location: ../post.php");
  exit();
}
