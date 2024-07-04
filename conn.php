<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warganet";

// membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
