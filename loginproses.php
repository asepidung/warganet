<?php
session_start();
require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nmuser = $_POST['nmuser'];
   $passuser = $_POST['passuser'];

   // Mengamankan input pengguna untuk mencegah SQL Injection
   $nmuser = $conn->real_escape_string($nmuser);

   // Mengambil data pengguna dari database
   $sql = "SELECT * FROM user WHERE nmuser='$nmuser'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      // Verifikasi password
      if (password_verify($passuser, $row['passuser'])) {
         // Login berhasil, set session dan arahkan ke index.php
         $_SESSION['login'] = true;
         $_SESSION['nmuser'] = $row['nmuser'];
         header("Location: index.php");
         exit();
      } else {
         // Password salah, tampilkan pesan kesalahan
         echo "Password salah.";
      }
   } else {
      // Username tidak ditemukan, tampilkan pesan kesalahan
      echo "Username tidak ditemukan.";
   }
} else {
   echo "Invalid request method.";
}
