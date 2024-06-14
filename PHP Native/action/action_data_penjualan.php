<?php
include "../koneksi.php";

$resultMessage = "";

if (isset($_POST["proses_simpan"])) {
    $id_barang = $_POST["id_barang"];
    $nama_barang = $_POST["nama_barang"];
    $brand = $_POST["brand"];
    $deskripsi_barang = $_POST["deskripsi_barang"];
    $harga_barang = $_POST["harga_barang"];
    $stok_barang = $_POST["stok_barang"];
    $username =  $_POST['username'];
    $direktori = "../file/foto barang/";

    // Mendapatkan informasi path file
    $pathInfo = pathinfo($_FILES["namaFile"]["name"]);

    // Mendapatkan ekstensi file
    $fileExtension = strtolower($pathInfo['extension']);

    // Memeriksa apakah ekstensi file diizinkan
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (in_array($fileExtension, $allowedExtensions)) {
        $foto_barang = $_FILES["namaFile"]['name'];

        move_uploaded_file($_FILES['namaFile']['tmp_name'], $direktori . $foto_barang);

        // Gunakan prepared statement
        $query = "INSERT INTO data_barang (id_barang, nama_penjual, nama_barang, brand, deskripsi_barang, harga, foto_barang, stok_barang) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Persiapkan statement
        $stmt = mysqli_prepare($koneksi, $query);

        // Bind parameter
        mysqli_stmt_bind_param($stmt, "sssssssi", $id_barang, $username, $nama_barang, $brand, $deskripsi_barang, $harga_barang, $foto_barang, $stok_barang);

        // Eksekusi statement
        $result = mysqli_stmt_execute($stmt);

        // Tutup statement
        mysqli_stmt_close($stmt);

        if ($result) {
            $resultMessage = "Barang sudah ditambahkan.";
        } else {
            $resultMessage = "Gagal menambahkan barang: " . mysqli_error($koneksi);
        }
    } else {
        $resultMessage = "Hanya file gambar (JPG, JPEG, PNG, GIF) yang diizinkan untuk diupload.";
    }
} elseif (isset($_POST["proses_update"])) {
    $id_barang = $_POST["id_barang"];
    $nama_barang = $_POST["nama_barang"];
    $brand = $_POST["brand"];
    $deskripsi_barang = $_POST["deskripsi_barang"];
    $harga_barang = $_POST["harga_barang"];
    $stok_barang = $_POST["stok_barang"];

    // Gunakan prepared statement
    $query = "UPDATE data_barang SET nama_barang=?, brand=?, deskripsi_barang=?, harga=?, stok_barang=? WHERE id_barang=?";

    // Persiapkan statement
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "ssssis", $nama_barang, $brand, $deskripsi_barang, $harga_barang, $stok_barang, $id_barang);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    // Tutup statement
    mysqli_stmt_close($stmt);

    if ($result) {
        $resultMessage = "Barang sudah diperbarui.";
    } else {
        $resultMessage = "Gagal memperbarui barang: " . mysqli_error($koneksi);
    }
} elseif (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    // Gunakan prepared statement
    $query = "DELETE FROM data_barang WHERE id_barang=?";

    // Persiapkan statement
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "s", $id_barang);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    // Tutup statement
    mysqli_stmt_close($stmt);

    if ($result) {
        $resultMessage = "Barang sudah dihapus.";
        echo '<script type="text/javascript">';
        echo 'window.location.href ="../data_produk.php";'; 
        echo "window.alert('$resultMessage');";
        echo '</script>';
        exit;
    } else {
        $resultMessage = "Gagal menghapus barang: " . mysqli_error($koneksi);
    }
}

echo '<script type="text/javascript">';
echo 'window.location.href ="../data_produk.php";'; 
echo "window.alert('$resultMessage');";
echo '</script>';
?>
