<?php require_once 'imports/permission_levels/utils.php'; ?>

<div id="nav2">
  <input class="navCol" type="button" value="FedNews" onclick="location.href='index.php';">
  <input class="navCol" type="button" value="Events" onclick="location.href='HTML/temp.html';">
  <input class="navCol" type="button" value="Headliners" onclick="location.href='HTML/temp.html';">
    <?php
    if (has_permission('student')) { ?>
      <input class="navCol" type="button" value="Student News" onclick="location.href='student_news.php';">
      <input class="navCol" type="button" value="Submit Article" onclick="location.href='submit_article.php';">
    <?php } ?>

    <?php
    if (has_permission('staff')) { ?>
      <input class="navCol" type="button" value="Staff News" onclick="location.href='staff_news.php';">
      <input class="navCol" type="button" value="RSS Feeds" onclick="location.href='HTML/temp.html';">
    <?php } ?>

    <?php
    if (has_permission('admin')) { ?>
      <input class="navCol" type="button" value="New User" onclick="location.href='new_user.php';">
      <input class="navCol" type="button" value="Pending Articles" onclick="location.href='pending_articles.php';">
    <?php } ?>

    <?php
    if (logged_in()) { ?>
      <input class="navCol" type="button" value="Logout" onclick="location.href='imports/logout.php';">
    <?php } else { ?>
      <input class="navCol" type="button" value="Log In" onclick="location.href='login.php';">
    <?php } ?>
</div>