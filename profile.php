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
<title>Welcome <?php echo $user->username; ?></title>
</head>
<body>
<div id="contentarea">
<div id="innercontentarea">
<a style="float:left;" href="index.php">Home</a>
<a style="float:right;" href="logout.php">Log out</a>
<br><hr>
<h2>Hello <?php echo $user->username; ?></h2>
<ul class="profile-list">
<li>
<span class="field">Username</span>
<span class="value">
<?php echo $user->username; ?>
</span>
<div class="clear"> </div>
</li>
<li>
<span class="field">Name</span>
<span class="value">
<?php echo $user->name; ?>
</span>
<div class="clear"> </div>
</li>
<li>
<span class="field">Reason</span>
<span class="value">
<?php echo $user->usereason;  ?>
</span>
<div class="clear"> </div>
</li>
<li>
<span class="field">Time Constraints</span>
<span class="value">
<?php echo $user->timeconstr; ?>
</span>
<div class="clear"> </div>
</li>

<span class="field">Name</span>
<span class="value">
<?php
if($user->name == "tesst")
 echo $user->name; 
else echo "NOOO";?>
</span>
<div class="clear"> </div>
</li>

</ul>
</div>
</div>
</body>
</html>