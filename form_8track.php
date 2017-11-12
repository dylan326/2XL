<?php
    $servername = "127.0.0.1";
    $username = "---";
    $password = "";
    $dbname = "2XL";
    $port = 3306;
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
     }
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   <form action="add/add_8track.php" method="post">
    <fieldset>
        <legend>Create New 8-Track</legend>
        <p><span>Title: </span>
          <input type="text" name="title">
        <p><span>Topic:</span>
          
<select name='topic'>
<?php
    $sql = "SELECT * FROM topic";
    $rs = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC))
    {
         echo ("<option value='". $row['topic_id'] ."'>". $row['topic_name'] ."</option>");
     }
?>
</select>
    <p><span>Topic:</span>
<select name='author'>
<?php
    $sql = "SELECT user_id,username FROM users";
    $rs = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)) 
    {
         echo ("<option value='". $row['user_id'] ."'>". $row['username'] ."</option>");
      }
?>
</select>
     <p><input type="submit" value="Create 8-Track">
   </fieldset>
     <p><span><a href="index.php">Back</a></span></p>
</form>
<?php 
  mysqli_close($conn); 
?>
  
</body>
</html>
