<?php
//include file 
include 'connection.php';

//declaration of variable that will useful to post data
$title = $_POST['ftitle'];
$subject = $_POST['fsubject'];
$content = $_POST['fcontent'];


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into test(title,subject,content)
  value(?,?,?)");
    $stmt->bind_param("sss", $title, $subject, $content);
    $stmt->execute();
    echo "successfully your blog has been added";
    echo "<br><a href='newlook.php'>home</a>";
    $stmt->close();
    $conn->close();
}
?>
<?php
header("refresh:2;url=newlook.php");
?>