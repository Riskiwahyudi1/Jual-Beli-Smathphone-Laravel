<?php
include "../koneksi.php";

if (isset($_POST['konfirmasi_btn'])) {
    $id_transaksi = $_POST["id_transaksi_hidden"];
    $konfirmasi_pesanan = $_POST["konfirmasi_brg"];

    // Gunakan prepared statement untuk mencegah SQL injection
    $query = "UPDATE data_transaksi SET status_transaksi=? WHERE id_transaksi=?";
    
    // Persiapkan statement
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "ss", $konfirmasi_pesanan, $id_transaksi);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo '<script type="text/javascript">';
        echo "window.alert('Konfirmasi pesanan diterima berhasil');";
        echo 'window.location.href ="../riwayat_transaksi.php";'; 
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'window.alert("Gagal memperbarui status transaksi: ' . mysqli_error($koneksi) . '");';
        echo '</script>';
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} elseif (isset($_GET['id_transaksi'])) {
    // Gunakan prepared statement untuk mencegah SQL injection
    $id_transaksi = $_GET['id_transaksi'];
    $query = "DELETE FROM data_transaksi WHERE id_transaksi=?";
    
    // Persiapkan statement
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "s", $id_transaksi);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'window.alert("Data transaksi sudah dihapus");';
        echo 'window.location.href ="../riwayat_transaksi.php";'; 
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'window.alert("Gagal menghapus data transaksi: ' . mysqli_error($koneksi) . '");';
        echo '</script>';
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>
