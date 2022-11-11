<?php
$hostname = "mysql.freehostia.com";
$username = "tamlat6_juniortest";
$password = "Tamerlan29102002!";
$dbname = "tamlat6_juniortest";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>