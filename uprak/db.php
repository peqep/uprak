<?php
$host = "localhost";
$user = "root";
$pass = ""; // atau sesuaikan dengan password MySQL kamu
$db = "pemesanan_makanan";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start();

if (!isset($_SESSION['stock'])) {
    $result = $conn->query("SELECT * FROM menu");
    $_SESSION['stock'] = [];
    while ($row = $result->fetch_assoc()) {
        $_SESSION['stock'][] = $row;
    }
}
?>
