<?php
$servername = "127.0.0.1";
$username = "------";
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
<form action="add/add_question.php" method="post">
    <fieldset>
        <legend>Write Question</legend>
        <p><span>Topic:</span>
        <select name='topic'>
        <?php
            $sql = "SELECT * FROM topic";
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)) {
                echo ("<option value='". $row['topic_id'] ."'>". $row['topic_name'] ."</option>");
            }
        ?>
        </select>
        <p><span>8-Track:</span>
        <select name='8track'>
        <?php
            $sql = "SELECT cartridge_id, title FROM 8track";
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)) {
                echo ("<option value='". $row['cartridge_id'] ."'>". $row['title'] ."</option>");
            }
        ?>
        </select>

        <p><span>Question: </span><input type="text" name="question">
        <p><span><input type='radio' name='answer' value='A' checked/>A:</span> <input type="text" name="option_A">
        <p><span><input type='radio' name='answer' value='B'/>B:</span> <input type="text" name="option_B">
        <p><span><input type='radio' name='answer' value='C'/>C:</span> <input type="text" name="option_C">
        <p><span>Hint:</span> <input type="text" name="hint">
        <p><input type="submit" value="Write Question">
    </fieldset>
     <p><span><a href="index.php">Back</a></span></p>
</form>
<?php mysqli_close($conn); ?>
</body>
</html>
