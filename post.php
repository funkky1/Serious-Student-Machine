<?php
 $id = $_GET['id'];
 try {
 $connection = new MongoClient();
 $database = $connection->selectDB('testblog');
 $collection = $database->selectCollection('articles');
 } catch(MongoConnectionException $e) {
 die("Failed to connect to database ".$e->getMessage());
 }
 $article = $collection->findOne(array('_id' =>
 new MongoId($id)));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
 lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html;
 charset=utf-8"/>
 <link rel="stylesheet" href="style.css" />
 <title>Post View</title>
 </head>
 <body>
 <div id="contentarea">
 <div id="innercontentarea">
 <h2 style="color:green">Post Saved</h2>
 <h3 ><?php echo $article['title']; ?></h3>
 <p><?php echo $article['content']; ?></p>
 <a href="dashboard.php"><h3>Dashboard</h3></a>
 </div>
 </div>
 </body>
</html>