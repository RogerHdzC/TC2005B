<?php
$servername = "20.225.177.34";
$database = "TC4005B_401_1";
$username = "TC4005B_401_1";
$password = "h9S0#t-B&0PH9rI#";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>
