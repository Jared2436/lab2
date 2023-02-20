<?php
$servername = "192.168.150.213";
$username = "webprogmi212";
$password = "b3ntRhino98";
$dbname = "webprogmi212";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, website, comment, gender, reg_date FROM jbdeleon_myguest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br> id: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<a href="index.php">Index</a>