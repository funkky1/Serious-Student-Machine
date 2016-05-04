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
<title>Index Page</title>
</head>
<body>
<div id="contentarea">
<div id="innercontentarea">
<a style="float:right;" href="logout.php">Log out</a>
<a style="float:left;" href="profile.php">User Profile</a>
<br>
<a style="float:left;" href="dashboard.php">Dashboard</a>
<br><hr>
<h2 style="color:green">Tasks Unlocked to Access on..</h2>
<ul class="profile-list">
<li>
<?php
if($user->task1 == "1"){?>
<a href="task1index.php"><h3>Level 1</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>
<li>
<?php
if($user->task2 == "1"){?>
<a href="task2index.php"><h3>Level 2</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>
<li>
<?php
if($user->task3 == "1"){?>
<a href="task3index.php"><h3>Level 3</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>
<li>
<?php
if($user->task4 == "1"){?>
<a href="task4index.php"><h3>Level 4</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>
<li>
<?php
if($user->task5 == "1"){?>
<a href="task5index.php"><h3>Level 5</h3></a>
<div class="clear"> </div>
<?php } ?>
</li>

</ul>
</div>
</div>
</body>
</html>