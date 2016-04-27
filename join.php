<?php
$username = "root";
$pass = "";
$server = "127.0.0.1";
$db = "DB";
$conn = new mysqli($server, $username, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["FName"])) {
    $FName = $_POST["FName"];
    $LName = $_POST["LName"];
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/ex8/all.css">
    <title>Join</title>
    <header><h2>Enter First and Last Name</h2></header>
</head>
<body>

<form class = "form-signin" role = "form"
      action = "join.php" method = "post">
    <input type = "text" class = "form-control"
           name = "FName" placeholder = "first name"
           required autofocus></br>
    <input type = "text" class = "form-control"
           name = "LName" placeholder = "last name" required>
    <button class="button" type = "submit"
            name = "submit">Login</button>
</form>
<div>
    <?php
    if(isset($FName)) {
        $sql = "SELECT * FROM People WHERE FName = '$FName' AND LName = '$LName'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
                echo "You are alredy in the database" . "<br>";
        } else {
            $sql = "INSERT INTO People(FName, LName)
        VALUES('$FName', '$LName')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $sql = "SELECT * FROM People";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Current Entries: <br/>";
            while ($row = $result->fetch_assoc()) {
                echo $row['FName'] . " " . $row['LName'] . "<br/>";
            }
        }
    }
    ?>
</div>
</body>
</html>

