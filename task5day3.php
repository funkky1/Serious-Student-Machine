<?php
require('session.php');
require('user.php');
$user = new User();
if (!$user->isLoggedIn()){
header('location: login.php');
exit;
}
$action = (!empty($_POST['btn_submit']) &&
($_POST['btn_submit'] === 'Save')) ? 'save_article'
: 'show_form';
switch($action){
case 'save_article':
try {
$connection = new MongoClient();
$database = $connection->selectDB('testblog');
$collection = $database->selectCollection('articles');
$article = array(
'title' => $_POST['title1'],
'content' => $_POST['content1'],
'saved_at' => new MongoDate()
);
$collection->insert($article);


$collection2 = $database->selectCollection('users');
	  
$collection2->update(array("username"=>$user->username), 
      array('$set'=>array("task5day4"=>"1")));

} catch(MongoConnectionException $e) {
die("Failed to connect to database ".
$e->getMessage());
}
catch(MongoException $e) {
die('Failed to insert data '.$e->getMessage());
}
break;
case 'show_form':
default:
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;
charset=utf-8"/>
<link rel="stylesheet" href="style.css"/>
<title>Task 5 Day 3</title>
</head>
<body>
<div id="contentarea">
<div id="innercontentarea">
<h2 style="color:green">Seeing Clearly..(Day 3)..</h2>
<a href="task5index.php"><h3>Level-5 Index</h3></a>
<br>
<?php if ($action === 'show_form'): ?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>"
method="post">
<h3 style="color:red">Write down the situations that really "get to you"</h3>
<h3>Title</h3>
<input type="text" name="title1" id="title/">

<h3>Details</h3>
<textarea name="content1" rows="10" cols="60"></textarea>
<input type="submit" name="btn_submit"
value="Save"/>
</p>
</form>
<?php else: ?>
<p>
Article saved. _id:<?php echo $article['_id'];?>.
<a href="dashboard.php">
View it?</a>
</p>
<?php endif;?>
</div>
</div>
</body>
</html>