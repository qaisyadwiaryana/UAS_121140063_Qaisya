<?php
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
?>