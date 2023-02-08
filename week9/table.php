<?php
$servername = "localhost";
$username = "webprogmi212";
$password = "webprogmi212";
$dbname = "webprogmi212";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE jbdeleon_myguest (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
website VARCHAR(100),
comment TEXT,
gender VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table jbdeleon_myguest created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>