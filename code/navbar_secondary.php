<?php require_once 'imports/permission_levels/utils.php'; ?>

<div id="nav2">
  <a href="index.html"><input class="navCol" type="button" value="FedNews"></a><br>
  <a href="HTML/temp.html"><input class="navCol" type="button" value="Events"></a><br>
  <a href="HTML/temp.html"><input class="navCol" type="button" value="Headliners"></a><br>
    <?php
    if (has_permission('student')) { ?>
      <a href="student_news.php"><input class="navCol" type="button" value="Student News"></a><br>
      <a href="submit_article.php"><input class="navCol" type="button" value="Submit Article"></a><br>
    <?php } ?>

    <?php
    if (has_permission('staff')) { ?>
      <a href="staff_news.php"><input class="navCol" type="button" value="Staff News"></a><br>
      <a href="HTML/temp.html"><input class="navCol" type="button" value="RSS Feeds"></a><br>
      <a href="HTML/temp.html"><input class="navCol" type="button" value="Submit News"></a><br>
    <?php } ?>

    <?php
    if (has_permission('admin')) { ?>
      <a href="new_user.php"><input class="navCol" type="button" value="New User"></a><br>
    <?php } ?>

    <?php
    if (logged_in()) { ?>
      <a href="imports/logout.php"><input class="navCol" type="button" value="Logout"></a><br>
    <?php } else { ?>
      <a href="login.php"><input class="navCol" type="button" value="Log In"></a><br>
    <?php } ?>
</div>