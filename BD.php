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
$date=array();
$sql = "SELECT * FROM `facultate` ";
$result = $conn->query($sql);

if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        array_push($date, $row);
    }
} else {
    echo "0 results";
}

echo json_encode($date);


?> 
