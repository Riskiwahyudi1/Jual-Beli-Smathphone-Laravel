<?php

$host = "localhost";
$user = "root";
$password = "";
$dataBaseName = "pbl_db";

$koneksi = mysqli_connect($host, $user, $password, $dataBaseName);
    if(!$koneksi){
        echo "gagal Terhubung ke database" . die(mysqli_error($koneksi));
    }


?>