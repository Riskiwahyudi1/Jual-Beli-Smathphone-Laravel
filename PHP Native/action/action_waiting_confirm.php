<?php
include "../koneksi.php";

if (isset($_POST['konfirmasi']) || isset($_POST['batal'])) {
    $id_transaksi = mysqli_real_escape_string($koneksi, $_POST["transaksi"]);

    if (isset($_POST['konfirmasi'])) {
        $status_transaksi = mysqli_real_escape_string($koneksi, $_POST["dalam_pengiriman"]);
        $message = "Berhasil Mengkonfirmasi Pesanan";
    } elseif (isset($_POST['batal'])) {
        $status_transaksi = mysqli_real_escape_string($koneksi, $_POST["batalkan"]);
        $message = "Transaksi Dibatalkan";
    }

    $result = mysqli_query($koneksi, "UPDATE data_transaksi SET status_transaksi='$status_transaksi' WHERE id_transaksi='$id_transaksi'");

    if ($result) {
        echo '<script type="text/javascript">';
        echo "window.alert('$message');";
        echo 'window.location.href ="../data_transaksi.php";'; 
        echo '</script>';
    } else {
        echo "Gagal memperbarui status transaksi: " . mysqli_error($koneksi);
    }
}
?>
