<?php
// Konfigurasi koneksi ke database MySQL
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'webb');

// Koneksi ke database MySQL
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Membuat tabel 'mahasiswa' pada database 'kasih_tahu'
$sql = "CREATE TABLE mahasiswa (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    nim VARCHAR(255) NOT NULL,
    jurusan VARCHAR(255) NOT NULL,
    kuliah VARCHAR(255) NOT NULL,
    tahunMasuk INT(11) NOT NULL,
    tahunLulus INT(11) NOT NULL,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabel mahasiswa berhasil dibuat";
} else {
    echo "Gagal membuat tabel: " . $conn->error;
}

$conn->close();
?>