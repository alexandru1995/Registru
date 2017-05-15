 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db="registru1";
// Create connection
$conn = mysqli_connect($servername, $username, $password,"registru1");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>