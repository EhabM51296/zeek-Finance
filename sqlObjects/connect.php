<?php
$servername = "localhost";
$username = "zeekfina_RA";
$password = "123456RA@admin";
$dbname = "zeekfina_ZFdb";

// Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>