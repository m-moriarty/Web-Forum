<?php
if (isset($_POST['submit'])) {
  include_once'dbm.inc.php';

  $first  =  mysqli_real_escape_string($conn, $_POST['first']);
  $last   =  mysqli_real_escape_string($conn, $_POST['last']);
  $email  =  mysqli_real_escape_string($conn, $_POST['email']);
  $uid    =  mysqli_real_escape_string($conn, $_POST['uid']);
  $pass   =  mysqli_real_escape_string($conn, $_POST['pass']);

  //ERRRORRS
  //Check empty field
  if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pass)) {
    header("Location: ../signup.php?signup=empty");
    exit();
  }else {
    //for valid characters
    if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
      header("Location: ../signup.php?signup=invalid");
      exit();
    }else{
      //check email format
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?signup=email");
        exit();
      //check if username already exists
      } else {
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $Check = mysqli_num_rows($result);

        if ($Check > 0) {
          header("Location: ../signup.php?signup=taken");
		  //find way to add subtext to/after "form" stating email already used
          //add check to ensure emails are only used once. or add system var that checks if email has already been verified (toggle on and off if an account is closed/terminated)
		  exit();
        }else {
          // Pass encrypt
          $encryptPass = password_hash($pass, PASSWORD_DEFAULT);
          //adding users to Database
          $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pass)
                    VALUES('$first','$last','$email','$uid','$encryptPass');";
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=sucess");
                    exit();
        }
      }
    }
  }
} else {
  header("Location: ../signup.php");
  exit();
}
