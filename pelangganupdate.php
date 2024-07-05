<?php
session_start();
if (!isset($_SESSION['login'])) {
   header("location: login.php");
   exit;
}

require "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $idpel = $_POST['idpel'];
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
   $idpel = $conn->real_escape_string($idpel);
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

   $sql = "UPDATE pelanggan SET 
              nmpel='$nmpel', 
              tglgabung='$tglgabung', 
              ssid='$ssid', 
              passwifi='$passwifi', 
              iprouter='$iprouter', 
              userrouter='$userrouter', 
              passrouter='$passrouter', 
              userpppoe='$userpppoe', 
              passpppoe='$passpppoe', 
              remoteip='$remoteip' 
           WHERE idpel='$idpel'";

   if ($conn->query($sql) === TRUE) {
      // Redirect to datapelanggan.php after successful update
      header("Location: pelanggan.php");
      exit();
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
}

$conn->close();
