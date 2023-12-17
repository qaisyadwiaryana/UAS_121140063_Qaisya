1.1 - Client-side Programming (HTML + JavaScript)

html
Download
Copy code
<!DOCTYPE html>
<html>
<head>
    <title>Formulir Mahasiswa</title>
</head>
<body>
    <h2>Formulir Pendaftaran Kelulusan</h2>
    <form id="formMahasiswa">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br>

        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required><br>

        <label for="jurusan">Jurusan:</label><br>
        <input type="text" id="jurusan" name="jurusan" required><br>

        <label for="kuliah">Kuliah Keahlian:</label><br>
        <input type="radio" id="rplsi" name="kuliah" value="rplsi">
        <label for="rplsi">RPLSI</label><br>
        <input type="radio" id="aide" name="kuliah" value="aide">
        <label for="aide">AIDE</label><br>
        <input type="radio" id="kasper" name="kuliah" value="kasper">
        <label for="kasper">Kasper</label><br>

        <label for="tahunMasuk">Tahun Masuk:</label><br>
        <input type="number" id="tahunMasuk" name="tahunMasuk" required><br>

        <label for="tahunLulus">Tahun Lulus:</label><br>
        <input type="number" id="tahunLulus" name="tahunLulus" required><br>

        <label for="tanggal">Tanggal Penginputan:</label><br>
        <input type="date" id="tanggal" name="tanggal" required><br>

        <input type="submit" value="Submit">
    </form>

    <table id="tableMahasiswa" border="1">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Kuliah Keahlian</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
            <th>Tanggal Penginputan</th>
        </tr>
    </table>

    <script>
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
    </script>
</body>
</html>></s>

Bagian 3: Database Management (Bobot: 20%) 3.1 (5%) Buatlah sebuah tabel pada database MySQL Panduan:
Lampirkan langkah-langkah dalam membuat basisdata dengan syntax basisdata
3.2 (5%) Buatlah konfigurasi koneksi ke database MySQL pada file PHP. Pastikan koneksi berhasil dan dapat diakses. Panduan:

Gunakan konstanta atau variabel untuk menyimpan informasi koneksi (host, username, password, nama database).
3.3 (10%) Lakukan manipulasi data pada tabel database dengan menggunakan query SQL. Misalnya, tambah data, ambil data, atau update data. Panduan:

Gunakan query SQL yang sesuai dengan skenario yang diberikan.
Bagian 4: State Management (Bobot: 20%) 4.1 (10%) Buatlah skrip PHP yang menggunakan session untuk menyimpan dan mengelola state pengguna. Implementasikan logika yang memanfaatkan session. Panduan:

Gunakan session_start() untuk memulai session.
Simpan informasi pengguna ke dalam session.
4.2 (10%) Implementasikan pengelolaan state menggunakan cookie dan browser storage pada sisi client menggunakan JavaScript. Panduan:

Buat fungsi-fungsi untuk menetapkan, mendapatkan, dan menghapus cookie.

Gunakan browser storage untuk menyimpan informasi secara lokal.

Pertimbangkan untuk memberikan komentar pada kode Anda untuk menjelaskan langkah-langkah atau alasan tertentu.


Koneksi Database dan Penambahan Tabel:
php
Download
Copy code
// Konfigurasi koneksi ke database MySQL
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kasih_tahu');

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
Manipulasi Data pada Tabel:
php
Download
Copy code
// Fungsi untuk menambah data mahasiswa
function tambah_mahasiswa($nama, $nim, $jurusan, $kuliah, $tahunMasuk, $tahunLulus) {
    global $conn;

    $sql = "INSERT INTO mahasiswa (nama, nim, jurusan, kuliah, tahunMasuk, tahunLulus)
    VALUES ('$nama', '$nim', '$jurusan', '$kuliah', '$tahunMasuk', '$tahunLulus')";

    if ($conn->query($sql) === TRUE) {
        echo "Data mahasiswa berhasil ditambahkan";
    } else {
        echo "Gagal menambahkan data: " . $conn->error;
    }
}

// Fungsi untuk mengambil data mahasiswa
function ambil_mahasiswa() {
    global $conn;

    $sql = "SELECT * FROM mahasiswa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mengeluarkan data mahasiswa dalam format tabel
        echo "<table><tr><th>ID</th><th>Nama</th><th>NIM</th><th>Jurusan</th><th>Kuliah</th><th>Tahun Masuk</th><th>Tahun Lulus</th><th>Tanggal</th></tr>";
        // Mengulangi seluruh baris dan mengeluarkan selnya
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nama"]. "</td><td>" . $row["nim"]. "</td><td>" . $row["jurusan"]. "</td><td>" . $row["kuliah"]. "</td><td>" . $row["tahunMasuk"]. "</td><td>" . $row["tahunLulus"]. "</td><td>" . $row["tanggal"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

// Fungsi untuk mengupdate data mahasiswa
function update_mahasiswa($id, $nama, $nim, $jurusan, $kuliah, $tahunMasuk, $tahunLulus) {
    global $conn;

    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan', kuliah='$kuliah', tahunMasuk='$tahunMasuk', tahunLulus='$tahunLulus' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data mahasiswa berhasil diupdate";
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
}

// Fungsi untuk menghapus data mahasiswa
function hapus_mahasiswa($id) {
    global $conn;

    $sql = "DELETE FROM mahasiswa WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data mahasiswa berhasil dihapus";
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
}
Menjalankan Query dan Menggunakan Fungsi:
php
Download
Copy code
require 'db_config.php';

// Tambah data mahasiswa
tambah_mahasiswa('Nama Mahasiswa', '1234567890', 'Jurusan', 'Kuliah', 2018, 2022);

// Ambil data mahasiswa
ambil_mahasiswa();

// Update data mahasiswa
update_mahasiswa(1, 'Nama Mahasiswa Update', '1234567890', 'Jurusan Update', 'Kuliah Update', 2017, 2021);

// Hapus data mahasiswa
hapus_mahasiswa(1);

$conn->close();
Pastikan file db_config.php berada dalam folder yang sama dengan file PHP ini. Selain itu, periksa kembali nama database, tabel, dan koneksi. Jika masih mengalami kendala, periksa error message yang dihasilkan oleh MySQL dan periksa dokumentasi MySQL untuk penjelasan lebih lanjut..</s>




apa data sql nya?


Jika anda menginginkan perbedaan antara tabel dan data SQL, maka tabel adalah struktur data yang telah didefinisikan, biasanya dengan kolom-kolom yang berisi informasi berbeda tentang baris data. Data SQL, begitu pula, adalah fakta yang secara tepat atau tidak dikategorikan menjadi baris-baris data yang ada di dalam tabel.

Dalam penggunaan, tabel dapat dipertimbangkan sebagai tempat untuk menyimpan data, dan data SQL itu sendiri adalah fakta yang ada di dalam tabel. Misalnya, dalam tabel pegawai, kita memiliki beberapa baris data, setiap baris berisi informasi tentang satu pegawai.

Misalkan kita memiliki tabel berikut:

Download
Copy code
CREATE TABLE pegawai (
 id INT PRIMARY KEY,
 nama VARCHAR(50),
 alamat VARCHAR(100),
 email VARCHAR(50)
);
Dalam tabel ini, kita memiliki kolom id, nama, alamat, dan email. Dalam sasaran, data SQL yang kita pertimbangkan adalah informasi yang diberikan oleh pengguna dan disimpan di dalam tabel. Contoh data SQL dalam tabel ini adalah:

Download
Copy code
INSERT INTO pegawai (id, nama, alamat, email)
VALUES (1, 'John Doe', '123 Easy Street', 'john.doe@example.com');
Dalam contoh ini, kita menambahkan data baru (john.doe@example.com) ke dalam tabel pegawai. Ini adalah contoh data SQL yang ada di dalam tabel.

Mari kita selesaikan dengan bahwa perbedaan antara tabel dan data SQL adalah:

Tabel: merupakan struktur data yang telah didefinisikan, biasanya dengan kolom-kolom yang berisi informasi berbeda tentang baris data.
Data SQL: merupakan fakta yang ada di dalam tabel, dan dapat dipertimbangkan sebagai data yang telah diinput atau diinputkan ke dalam tabel.
