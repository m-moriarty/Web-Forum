<?php
 include_once 'header.php';
?>
<section class="main-container">
  <div class="main-wrap">
    <h2> HOME</h2>
    <?php
            if (isset($_SESSION['u_id'])) {
              header("Location: post.php");
              //echo $_SESSION['u_uid'];
              // header("Location: forum.php")

            } else {
              header("Location: signup.php");

            }

            ?>
  </div>
</section>
<?php
  include_once 'footer.php';
?>

<!--
https://code.tutsplus.com/tutorials/how-to-create-a-phpmysql-powered-forum-from-scratch--net-10188
https://www.w3schools.com/php/default.asp
https://www.w3schools.com/sql/default.asp/
-->
