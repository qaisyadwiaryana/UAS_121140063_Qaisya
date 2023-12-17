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