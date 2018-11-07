<?php

session_start();

if (isset($_POST['submit'])) {
    include 'dbm.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    //Errrorrrs
    //empty input fileds
    if (empty($uid) || empty($pass)) {
      header("Location: ../index.php?login=empty");
      exit();
    } else {
      $sql="SELECT * FROM users WHERE user_uid='$uid' OR user_email ='$uid'";
      $result = mysqli_query($conn, $sql);
      $check = mysqli_num_rows($result);
      if ($check < 1) {
        header("Location: ../index.php?login=error1");
        exit();
      } else {
        if ($row = mysqli_fetch_assoc($result)) {
          //decrypt password
          $encryptPass = password_verify($pass, $row['user_pass']);
          if ($encryptPass == false) {
            header("Location: ../index.php?login=error2");
            exit();
          } elseif ($encryptPass == true) {
            //user info logged include
            $_SESSION['u_id'] = $row['user_id'];
            $_SESSION['u_first'] = $row['user_first'];
            $_SESSION['u_last'] = $row['user_last'];
            $_SESSION['u_email'] = $row['user_email'];
            $_SESSION['u_uid'] = $row['user_uid'];
            header("Location: ../index.php?login=sucess");
            exit();
          }
        }
      }
    }
}else {
      header("Location: ../index.php?login=error");
      exit();
}
