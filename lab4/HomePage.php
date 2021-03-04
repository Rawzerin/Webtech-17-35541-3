<html>
<head>
    <title>Home Page</title>
<style>
 slideshow-container {
     max-width: 500px;
     position: relative;
     margin: auto;
 }
 .slideshow-images{
     object-fit: fill;
     height: 300px;
     max-width: 500px;
     border: black 5px solid;
     margin-top: 30px;
     margin-bottom: 20px;
 }
 .content {
     max-width: 500px;
     margin: auto;
 }
</style>
</head>
<body>
<?php
$GLOBALS['activeHomePage'] = "active";
$GLOBALS['activeLoginPage'] = $GLOBALS['activeRegistrationPage'] = "";
require "header.php";
?>
<div class="content">
    <div class="slidesShow-container">
        <img src="img/bp_1.jpg" class="slideshow-images">
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>
