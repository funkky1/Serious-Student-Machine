<?php
$action = (!empty($_POST['register']) &&
($_POST['register'] === 'Register user')) ? 'register'
: 'show_form';

switch($action)
{
case 'register':
$username = $_POST['username'];
$password = $_POST['password'];
$usereason = $_POST['usereason'];
$thing1 = $_POST['thing1'];
$thing2 = $_POST['thing2'];
$thing3 = $_POST['thing3'];
$timeconstr = $_POST['timeconstr'];

if ($username==null) {
$errorMessage = "Enter username";
break;
} 
else if ($password==null){
$errorMessage = "Enter Password";
break;
} 
else if ($usereason==null){
$errorMessage = "Enter all details";
break;
} 
else if ($timeconstr==null){
$errorMessage = "Enter all details";
break;
} 
else{

require('dbconnection.php');
$mongo = DBConnection::instantiate();
$collection = $mongo->getCollection('users');
$users = array(
array(
'name' => $username,
'username' => $username,
'password' => md5($password),
'usereason' => $usereason,
'thing1' => $thing1,
'thing2' => $thing2,
'thing3' => $thing3,
'timeconstr' => $timeconstr,
'task1'=>1,
'task2'=>0,
'task3'=>0,
'task4'=>0,
'task5'=>0,
'task1day1'=>1,
'task1day2'=>0,
'task1day3'=>0,
'task1day4'=>0,
'task1day5'=>0,
'task2day1'=>0,
'task2day2'=>0,
'task2day3'=>0,
'task2day4'=>0,
'task2day5'=>0,
'task3day1'=>0,
'task3day2'=>0,
'task3day3'=>0,
'task3day4'=>0,
'task3day5'=>0,
'task4day1'=>0,
'task4day2'=>0,
'task4day3'=>0,
'task4day4'=>0,
'task4day5'=>0,
'task5day1'=>0,
'task5day2'=>0,
'task5day3'=>0,
'task5day4'=>0,
'task5day5'=>0,
)
);
foreach($users as $user)
{
try{
$collection->insert($user);
} catch (MongoCursorException $e) {
die($e->getMessage());
}
}

echo 'User Registered Successfully..';
header('location: login.php');
}
case 'show_form':
default:
$errorMessage = NULL;
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
<title>User Login</title>
</head>
<body>
<div id="contentarea">
<div id="innercontentarea">
<h2 style="color:green">Enter the Details for Registering</h2>
<div id="register-box">
<div class="inner">
<form id="register" action="create_users.php" method="post"
accept-charset="utf-8">
<ul>
<?php if(isset($errorMessage)): ?>
<li><?php echo $errorMessage; ?></li>
<?php endif ?>
<li>
<label>Username </label>
<input class="textbox" tabindex="1"
 name="username"
autocomplete="off"/>
</li>
<li>
<label>Password </label>
<input class="textbox" tabindex="2"
type="password" name="password"/>
</li>
<li>
<label>Why have you decided to use this app? </label>
<input class="textbox" tabindex="3"
type="text" name="usereason"/>
</li>
<li>
<label>What 3 things would you like to get out of using this app? </label>
<input class="textarea2" tabindex="4"
type="text" name="thing1"/>
<input class="textarea2" tabindex="5"
type="text" name="thing2"/>
<input class="textarea2" tabindex="6"
type="text" name="thing3"/>
</li>

<li>
<label>What time constraints do you foresee and how can you plan around them? </label>

<textarea name="timeconstr" rows="10"></textarea>
</li>

<li>
<input id="register-submit" name="register"
tabindex="7" type="submit"
value="Register user" />
</li>
<li class="clear"></li>
</ul>
</form>
</div>
</div>
</div>
</div>
</body>
</html>