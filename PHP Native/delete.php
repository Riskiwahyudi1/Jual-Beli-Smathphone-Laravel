<?php
include 'koneksi.php';

if (isset($_GET['id_barang'])) {
    // Penghapusan barang di keranjang
    $id_barang = $_GET['id_barang'];
    $result = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_barang='$id_barang'");
    
    if ($result) {
        echo '<script type="text/javascript">';
        echo 'window.alert("Barang sudah dihapus");';
        echo 'window.location.href ="keranjang.php";'; 
        echo '</script>';
    } else {
        die(mysqli_error($koneksi));
    }
} 

$koneksi->close();
?>
    <?php

include 'koneksi.php';
$id_transaksi = $_GET['id_transaksi'];
$result = mysqli_query($koneksi, "DELETE FROM data_transaksi WHERE id_transaksi='$id_transaksi'");
?>