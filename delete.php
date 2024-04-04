<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM cars WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
