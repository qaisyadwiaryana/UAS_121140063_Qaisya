<!DOCTYPE html>
<html>
<head>
    <title>Formulir Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="center">
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
</html>
