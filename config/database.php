<?php
// Ubah kredensial ini sesuai konfigurasi MySQL lokal/hosting Anda.
$DB_HOST = 'localhost';
$DB_NAME = 'nusindo_wisata';
$DB_USER = 'root';
$DB_PASS = '';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    $conn->set_charset('utf8mb4');
} catch (Throwable $e) {
    http_response_code(500);
    exit('Database belum tersambung. Pastikan database nusindo_wisata sudah diimpor dan config/database.php sudah benar.');
}
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function rupiah($amount) { return 'Rp' . number_format((float)$amount, 0, ',', '.'); }
?>
