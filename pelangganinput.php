<?php
session_start();
if (!isset($_SESSION['login'])) {
   header("location: login.php");
   exit;
}

require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nmpel = $_POST['nmpel'];
   $tglgabung = $_POST['tglgabung'];
   $ssid = $_POST['ssid'];
   $passwifi = $_POST['passwifi'];
   $iprouter = $_POST['iprouter'];
   $userrouter = $_POST['userrouter'];
   $passrouter = $_POST['passrouter'];
   $userpppoe = $_POST['userpppoe'];
   $passpppoe = $_POST['passpppoe'];
   $remoteip = $_POST['remoteip'];

   // Mengamankan input pengguna untuk mencegah SQL Injection
   $nmpel = $conn->real_escape_string($nmpel);
   $tglgabung = $conn->real_escape_string($tglgabung);
   $ssid = $conn->real_escape_string($ssid);
   $passwifi = $conn->real_escape_string($passwifi);
   $iprouter = $conn->real_escape_string($iprouter);
   $userrouter = $conn->real_escape_string($userrouter);
   $passrouter = $conn->real_escape_string($passrouter);
   $userpppoe = $conn->real_escape_string($userpppoe);
   $passpppoe = $conn->real_escape_string($passpppoe);
   $remoteip = $conn->real_escape_string($remoteip);

   $sql = "INSERT INTO pelanggan (nmpel, tglgabung, ssid, passwifi, iprouter, userrouter, passrouter, userpppoe, passpppoe, remoteip)
           VALUES ('$nmpel', '$tglgabung', '$ssid', '$passwifi', '$iprouter', '$userrouter', '$passrouter', '$userpppoe', '$passpppoe', '$remoteip')";

   if ($conn->query($sql) === TRUE) {
      // Redirect to datapelanggan.php after successful insertion
      header("Location: pelanggan.php");
      exit();
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
}

$conn->close();
