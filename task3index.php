<?php
require('session.php');
require('user.php');
$user = new User();
if (!$user->isLoggedIn()){
header('location: login.php');
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8"/>
<link rel="stylesheet" href="style.css" />
<title>Task 3 Index Page</title>
</head>
<body>
<div id="contentarea">
<div id="innercontentarea">
<a style="float:left;" href="index.php">Home</a>
<a style="float:right;" href="logout.php">Log out</a>
<br><hr>
<h2 style="color:green">Daily Tasks for Level 3..</h2>
<br>
<ul class="profile-list">
<li>
<?php
if($user->task3day1 == "1"){?>
<a href="task3day1.php"><h3>Day 1</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>
<li>
<?php
if($user->task3day2 == "1"){?>
<a href="task3day2.php"><h3>Day 2</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>
<li>
<?php
if($user->task3day3 == "1"){?>
<a href="task3day3.php"><h3>Day 3</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>
<li>
<?php
if($user->task3day4 == "1"){?>
<a href="task3day4.php"><h3>Day 4</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>
<li>
<?php
if($user->task3day5 == "1"){?>
<a href="task3day5.php"><h3>Day 5</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>

</ul>
</div>
</div>
</body>
</html>