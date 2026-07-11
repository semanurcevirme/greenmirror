<?php
// db.php - Veritabanı Bağlantısı
$baglanti = new mysqli('localhost', 'root', '', 'greenmirror_db');

if ($baglanti->connect_error) {
    die('Bağlantı hatası: ' . $baglanti->connect_error);
}

$baglanti->set_charset('utf8mb4');
?>
