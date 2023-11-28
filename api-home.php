<?php
include 'koneksi.php';

// Periksa apakah parameter kategori ada dalam URL
if (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];

    // Ubah kueri untuk mendapatkan data dari tabel kue berdasarkan kategori
    $query = "SELECT * FROM kue WHERE kategori = '$kategori'";
} else {
    // Jika tidak ada parameter kategori, ambil semua data kue
    $query = "SELECT * FROM kue";
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