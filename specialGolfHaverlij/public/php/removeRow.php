<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel";

$id = $_POST['data'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM trainings WHERE id = (SELECT id FROM (SELECT id FROM trainings ORDER BY id LIMIT $id,1) AS tbl)";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();


?>