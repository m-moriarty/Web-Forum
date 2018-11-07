<?php
//check if logout was submited
  if (isset($_POST['submit'])) {
//makes sure session if active then kiils and know atributs associated with session
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
  }
 ?>
