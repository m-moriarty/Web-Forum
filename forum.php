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
    //display 30 most recent posts.
    include 'includes/dbm.inc.php';
    if(mysqli_connect_errno()){echo "Failed to connect to database";}
    $sql="SELECT p_id, p_user, p_context FROM posts ORDER BY p_id";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);
    if($rows < 1){
      echo 'sorry no dice';
    }
    else{
      echo 'array initated';
    }

    ?>
  </div>
</section>
<?php
  include_once 'footer.php';
?>
