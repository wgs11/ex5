<?php
$username = "root";
$pass = "";
$server = "127.0.0.1";
$db = "DB";

$conn = new mysqli($server,$username,$pass, $db);
if($conn->connect_error){
    die("error".$conn->connect_error);
}

$sql = "CREATE TABLE People (
    LName VARCHAR(20), FName VARCHAR(20))";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>