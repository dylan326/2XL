<?php
$servername = "127.0.0.1";
$username = "-----";
$password = "";
$dbname = "2XL";
$port = 3306;
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="add/add_team.php" method="post">
    <fieldset>
        <legend>Create Team</legend>
        <p><span>Team Name: </span><input type="text" name="name">
        <p><input type="submit" value="Create Team">
    </fieldset>
     <p><span><a href="index.php">Back</a></span></p>
</form>
<?php mysqli_close($conn); ?>
</body>
</html>

