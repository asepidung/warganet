<?php
session_start(); // Memulai session
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nmuser = $_POST['nmuser'];
   $passuser = $_POST['passuser'];

   // Mengamankan input pengguna untuk mencegah SQL Injection
   $nmuser = $conn->real_escape_string($nmuser);
   $passuser = $conn->real_escape_string($passuser);

   $sql = "SELECT * FROM user WHERE nmuser='$nmuser' AND passuser='$passuser'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      // Login berhasil, set session
      $_SESSION['login'] = true;
      $_SESSION['nmuser'] = $nmuser;

      // Arahkan ke index.php
      header("Location: index.php");
      exit();
   } else {
      // Login gagal, tampilkan pesan kesalahan
      echo "Username atau password salah.";
   }
}
