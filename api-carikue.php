<?php
include 'koneksi.php';

// Ambil nilai parameter dari URL
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$nama_kue = isset($_GET['nama_kue']) ? $_GET['nama_kue'] : '';

// Ubah kueri untuk mendapatkan data kue berdasarkan kategori atau nama_kue
$query = "SELECT * FROM kue WHERE 1";

if (!empty($kategori) || !empty($nama_kue)) {
    $query .= " AND (";

    if (!empty($kategori)) {
        $query .= "kategori = '$kategori'";
    }

    if (!empty($kategori) && !empty($nama_kue)) {
        $query .= " OR ";
    }

    if (!empty($nama_kue)) {
        $query .= "nama_kue LIKE '%$nama_kue%'";
    }

    $query .= ")";
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
    echo "Gagal mengambil data kue";
} else {
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        // Mengonversi data blob ke dalam format base64 agar dapat disertakan dalam JSON
        $row['gambar'] = base64_encode($row['gambar']);
        $data[] = $row;
    }

    echo json_encode($data);
}
?>
