Nama : Qaisya Dwi Aryana
NIM : 121140063
UAS PEMROGRAMAN WEB RA

**Pertanyaan-pertanyaan Bonus**
1.	Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
   1. Langkah pertama yang saya lakukan adalah mengunjungi situs web InfinityFree di www.infinityfree.com dan mendaftar untuk akun gratis.
   2. Setelah saya selesai mendaftar, InfinityFree memberikan saya pilihan antara menggunakan domain gratis yang mereka sediakan atau memilih subdomain dari lebih dari 25 ekstensi yang tersedia. Saya juga bisa menggunakan domain saya sendiri jika sudah punya.
   3. Dan saya memanfaatkan layanan gratis yang ditawarkan InfinityFree
      
2.	Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda.
Untuk saat ini Infinityfree adalah penyedia hosting yang gratis cocok untuk pemula yang menerapkan web sederhana. InfinityFree adalah pilihan gratis yang saya pilih saat
pertama kali ingin belajar membuat website tanpa harus mengeluarkan biaya awal. Meskipun ada beberapa batasan, saya rasa ini adalah pilihan yang bagus untuk memulai. Ini memberi saya kesempatan untuk eksplorasi dan belajar tanpa tekanan biaya.
  	
3.	Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
   Saya pastikan keamanan aplikasi web dengan memperbarui secara teratur, menggunakan SSL, melakukan pemantauan keamanan, backup berkala, dan mengontrol akses dengan ketat.
  	
4.	Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.
   Sebagai pengguna InfinityFree, saya tidak memiliki akses langsung ke konfigurasi server. Platform ini menyediakan lingkungan hosting terkelola di mana konfigurasi server tidak dapat diubah oleh pengguna. InfinityFree telah mengatur konfigurasi server untuk mendukung berbagai aplikasi web dengan standar konfigurasi yang umum dan optimal untuk kebanyakan pengguna.

   **Penjelasan Langkah Langkah**
   
**Bagian 1: Client-side Programming**
1.1 Buatlah sebuah halaman web sederhana yang memanfaatkan JavaScript untuk melakukan manipulasi DOM. 
1.2 Buatlah beberapa event untuk menghandle interaksi pada halaman web

// Function to add data to the table
function addDataToTable(data) {
    var table = document.getElementById("tableMahasiswa");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);

    cell1.innerHTML = data.nama;
    cell2.innerHTML = data.nim;
    cell3.innerHTML = data.jurusan;
    cell4.innerHTML = data.kuliah;
    cell5.innerHTML = data.tahunMasuk;
    cell6.innerHTML = data.tahunLulus;
    cell7.innerHTML = data.tanggal;
}

// Event handler for form submission
document.getElementById("formMahasiswa").addEventListener("submit", function(event) {
    event.preventDefault();
    var nama = document.getElementById("nama").value;
    var nim = document.getElementById("nim").value;
    var jurusan = document.getElementById("jurusan").value;
    var kuliah = document.querySelector('input[name="kuliah"]:checked').value;
    var tahunMasuk = document.getElementById("tahunMasuk").value;
    var tahunLulus = document.getElementById("tahunLulus").value;
    var tanggal = document.getElementById("tanggal").value;

    var data = {
        nama: nama,
        nim: nim,
        jurusan: jurusan,
        kuliah: kuliah,
        tahunMasuk: tahunMasuk,
        tahunLulus: tahunLulus,
        tanggal: tanggal
    };

    addDataToTable(data);
    this.reset();
});

Kode JavaScript diatas memanipulasi DOM dengan cara menambahkan data ke dalam sebuah tabel HTML dan menangani pengiriman formulir.
- Fungsi `addDataToTable` digunakan untuk menambahkan baris baru ke dalam tabel dengan data yang diberikan.
- Handler acara (event handler) digunakan untuk mengumpulkan data formulir dan menambahkannya ke dalam tabel menggunakan fungsi `addDataToTable` ketika formulir dikirim.
Fungsi `insertRow()` digunakan untuk membuat elemen `<tr>` kosong dan menambahkannya ke dalam tabel. Kemudian, metode `insertCell()` digunakan untuk menambahkan sel ke dalam baris yang telah dibuat. Setelah itu, data dimasukkan ke dalam sel-sel tersebut menggunakan properti `innerHTML`.

**Bagian 2: Server-side Programming**
2.1 Implementasikan script PHP untuk mengelola data dari formulir pada Bagian 1 menggunakan variabel global seperti `$_POST` atau `$_GET`.
Tampilkan hasil pengolahan data ke layar.
<?php
// Menangkap data dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];
$kuliah = $_POST['kuliah'];
$tahunMasuk = $_POST['tahunMasuk'];
$tahunLulus = $_POST['tahunLulus'];

// Memanggil fungsi tambah_mahasiswa yang sudah didefinisikan di file lain
require_once 'config.php';
tambah_mahasiswa($nama, $nim, $jurusan, $kuliah, $tahunMasuk, $tahunLulus);
?>

Kode di atas akan mengirimkan data dari form ke file config.php yang berisi fungsi tambah_mahasiswa . Fungsi tersebut akan memasukkan data ke database MySQL dengan query INSERT. Untuk menampilkan hasil pengolahan data ke layar, dapat menggunakan perintah echo seperti yang sudah dilakukan di dalam fungsi tambah_mahasiswa.

2.2 Buatlah sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu pada halaman web Anda.


**Bagian 3: Database Management**
3.1 Buatlah sebuah tabel pada database MySQL
-- Membuat database bernama pendaftaran_siswa
CREATE DATABASE pendaftaran_siswa;

-- Menggunakan database yang sudah dibuat
USE pendaftaran_siswa;

-- Membuat tabel bernama mahasiswa
CREATE TABLE mahasiswa (
    id INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(64) NOT NULL,
    nim VARCHAR(16) NOT NULL,
    jurusan VARCHAR(32) NOT NULL,
    kuliah VARCHAR(64) NOT NULL,
    tahunMasuk INT NOT NULL,
    tahunLulus INT NOT NULL,
    tanggal DATE NOT NULL DEFAULT CURRENT_DATE,
    PRIMARY KEY (id)
);

Kode di atas akan membuat sebuah database bernama pendaftaran_siswa dan sebuah tabel bernama mahasiswa di dalamnya. Tabel tersebut memiliki kolom-kolom seperti id, nama, nim, jurusan, kuliah, tahun masuk, tahun lulus, dan tanggal. Kolom id adalah kunci utama (primary key) yang akan diisi secara otomatis (auto increment). Kolom tanggal adalah tanggal saat data dimasukkan dan akan diisi secara otomatis dengan nilai default tanggal sekarang (current date).

3.2 Buatlah konfigurasi koneksi ke database MySQL pada file PHP. Pastikan koneksi berhasil dan dapat diakses.
<?php
// Menyimpan informasi koneksi ke variabel
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendaftaran_siswa";

// Membuat koneksi ke database MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika koneksi berhasil, tampilkan pesan
echo "Koneksi berhasil";
?>

Kode di atas akan membuat sebuah objek koneksi bernama $conn dengan menggunakan kelas mysqli yang disediakan oleh PHP. Objek tersebut akan menghubungkan file PHP dengan database MySQL yang sudah dibuat sebelumnya. Untuk memeriksa koneksi, dapat menggunakan properti connect_error yang akan mengembalikan nilai NULL jika koneksi berhasil, atau pesan error jika koneksi gagal. Jika koneksi gagal, Anda dapat menggunakan perintah die untuk menghentikan eksekusi skrip dan menampilkan pesan error. Jika koneksi berhasil, dapat menggunakan perintah echo untuk menampilkan pesan.

3.3 Lakukan manipulasi data pada tabel database dengan menggunakan query SQL. Misalnya, tambah data, ambil data, atau update data.


**Bagian 4: State Management**
4.1 Buatlah skrip PHP yang menggunakan session untuk menyimpan dan mengelola state pengguna. Implementasikan logika yang memanfaatkan session.
4.2 Implementasikan pengelolaan state menggunakan cookie dan browser storage pada sisi client menggunakan JavaScript.



