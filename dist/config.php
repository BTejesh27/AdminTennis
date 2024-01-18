<?php

// Create connection
$conn = mysqli_connect("localhost", "root", " ", "scores");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>