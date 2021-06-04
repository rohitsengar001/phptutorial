<?php
include 'connection.php';

$title = $_POST['etitle'];
$subject = $_POST['esubject'];
$content = $_POST['econtent'];

$sql = "UPDATE test SET title='$title',subject='$subject',content='$content' WHERE id=$_GET[id]";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo '<h2><a href="newlook.php">home<h2>';
} else {
    echo "Error in updating record: " . $conn->error;
}

$conn->close();

// Redirect browser
header("refresh:10;url=newlook.php");

exit;
?>