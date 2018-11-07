<?php
session_start();
 include_once 'header.php';
?>
<section class="main-container">
  <div class="main-wrap">
    <h2>Post</h2>
    <form class="Post-form" action="includes/post.inc.php"method="POST">
      <input type="text" name="context" placeholder="Words...">
      <button type="submit" name="submit">Post</button>
    </form>
    <?php
//     if(isset($_SESSION['id'])) {
//   echo $_SESSION['u_uid'];
// } else {
//   echo "error.";
// }
    ?>
  </div>
</section>
<?php
  include_once 'footer.php';
?>
