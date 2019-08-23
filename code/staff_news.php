<html>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="CSS/staff_news.css">
</head>
<body>
<div id="Header"></div>
<?php require_once 'imports/navbar_primary.php'; ?>
<div id="strip"></div>
<div id="background">
  <br>
  <div id="bond">
      <?php require_once 'navbar_secondary.php'; ?>
    <h1 id="title">Staff News</h1>
    <div id="search"></div>
    <div id="lRSS"><a href="HTML/temp.html">RSS Feed</a></div>
    <div id="filters">
      <form Name="filters">
        <br>
        Filter:
        <SELECT NAME="audience" id="audience">
          <OPTION>Staff</OPTION>
          <OPTION>Student</OPTION>
          <OPTION>Public</OPTION>
        </SELECT>
        <SELECT NAME="eventType" id="eventType">
          <OPTION>Type1</OPTION>
          <OPTION>Type2</OPTION>
          <OPTION>Type3</OPTION>
        </SELECT>
        <SELECT NAME="location" id="location">
          <OPTION>Location1</OPTION>
          <OPTION>Location2</OPTION>
          <OPTION>Location3</OPTION>
        </SELECT>
        <input class="button" type="Reset">
        <p> Dates: <input type="text" id="Date1"> : <input type="text" id="Date2">
      </form>
    </div>
    <br>
    <a href="HTML/article1.html">
      <div id="sArt1">
        <div id="pic1"></div>
        <div id="text">Text text text text text text tex text text text text text text text text text text text text
          text text text text text text text text text text text tex text text text text text text text text text text
          text text text text text text text text text text text text text tex text text text text text text text text
          text text text text text text text text text text text text text text text tex text text text text text text
          text text text text text text text text text text text text
        </div>
      </div>
    </a>
    <br>
    <a href="HTML/article2.html">
      <div id="sArt2">
        <div id="pic2"></div>
        <div id="text">Text text text text text text tex text text text text text text text text text text text text
          text text text text text text text text text text text tex text text text text text text text text text text
          text text text text text text text text text text text text text tex text text text text text text text text
          text text text text text text text text text text text text text text text tex text text text text text text
          text text text text text text text text text text text text
        </div>
      </div>
    </a>
    <br>
    <a href="HTML/article3.html">
      <div id="sArt3">
        <div id="pic3"></div>
        <div id="text">Text text text text text text tex text text text text text text text text text text text text
          text text text text text text text text text text text tex text text text text text text text text text text
          text text text text text text text text text text text text text tex text text text text text text text text
          text text text text text text text text text text text text text text text tex text text text text text text
          text text text text text text text text text text text text
        </div>
      </div>
    </a>
  </div>
</div>
<div id="footer">
  <br>
  <div id="line"></div>
</div>
</body>
</html>