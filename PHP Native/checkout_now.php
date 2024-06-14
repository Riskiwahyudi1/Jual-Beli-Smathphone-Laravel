<?php
    session_start();

    if (!isset($_SESSION["user"])){
        header("Location:login.php");
        exit;
    }
    $user = $_SESSION['user']; 

    if (isset($_GET['logout'])) {

    session_destroy();

    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
    #carouselExampleDark {
        height: 450px;
        width: 1200px;
        margin: auto;
        border-radius: 200px;
    }

    .carousel-inner {
        height: 450px;
        width: 1200px;
    }

    .jarak-botton {
        margin-top: -10px;
    }

    #customNumber {
        width: 50px;

    }

    html {
        height: 100%;
        width: 100%;
    }

    .countainer {
        display: flex;
        justify-content: center;

    }

    .bottontambah {
        width: 20px;
        height: 20px;
        background-color: #D9D9D9;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin: 0 px
    }

    .bottonkurang {
        width: 20px;
        height: 20px;
        background-color: #D9D9D9;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin: 0 px
    }

    #angka {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .angka {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 5px
    }


    .bottontambah p {
        text-align: center;
        margin: 0;

    }

    .bottonkurang p {
        text-align: center;
        margin: 0;

    }
    </style>
</head>

<body>

    <!-- Navigation -->

    <?php
        include "navigasi.php";
                
        ?>
    <?php
include 'koneksi.php';
$id_barang = $_GET['id_barang'];

$result = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE id_barang='$id_barang'");
$data = mysqli_fetch_array($result)

   
?>
    <form action="" method="post">
        <div class="countainer-fluid col-md-10 mx-auto"
            style="margin: 70px 30px; border: 50px; background-color:#faf6f6;box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);">
            <div class="container-fluid" style="margin-top:50px; ">
                <center>
                    <h5 style="padding-top:15px;" class="text-primary">Halaman Checkout</h5>
                </center>
                <div class="row">
                    <div class="col-md-3 mt-1 mb-3 me-1">
                        <b>Penjual : <span id="getNamaPenjual"> <?php echo $data['nama_penjual'];?></span></b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 me-5 mt-1 mb-2" style="margin-left:50px;">
                        <small><b>Nama Barang</b></small>
                    </div>
                    <div class=" col-md-2 ">
                        <small><b> jumlah Produk</b></small>
                    </div>
                    <div class=" col-md-3 " style="">
                        <small><b> Harga Produk</b></small>
                    </div>
                </div>
                <div class=" row" style="border-bottom: solid 1px black;">
                    <div class="col-md-1 " style="margin-left:50px;">
                        <img src="file/foto barang/<?php echo $data['foto_barang'];?>" alt="" class="w-75 h-75 me-2">
                        <input type="hidden" name="" id="getFoto" value="<?php echo $data['foto_barang'];?>">
                    </div>
                    <div class="col-md-5 me-5">
                        <p id="getNamaBarang"> <?php echo $data['nama_barang']; ?></p>
                    </div>
                    <div class="col-md-2 mb-2">
                        <div class="d-flex align-items-center">
                            <div class="bottonkurang">
                                <p class="">-</p>
                            </div>
                            <div id="angka" class="mx-2">
                                <p class="angka" id="getJumlahBarang">1</p>
                            </div>
                            <div class="bottontambah">
                                <p class="">+</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <p style="color: #FF7F09;">Rp.<span class="harga" data-harga="10"
                                id="getHargaBarang"><?php echo $data['harga'];?></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 mb-3 me-1">
                        <b>Pengiriman</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 me-5 mt-1 mb-2" style="margin-left:50px;">
                        <small><b>Alamat Pengiriman</b></small>
                    </div>
                    <div class=" col-md-2 ">
                        <small><b></b></small>
                    </div>
                    <div class=" col-md-2 ">
                        <small><b>Kurir Pengiriman</b></small>
                    </div>
                    <div class=" col-md-3 " style="">
                        <small><b>Ongkos Kirim</b></small>
                    </div>
                </div>
                <?php
              include 'koneksi.php';
              $username = $_SESSION['user'];
              $result = mysqli_query($koneksi, "SELECT * FROM login_pembeli WHERE username='$username'");
              $dataAlamat = mysqli_fetch_array($result)
              ?>
                <div class=" row" style="border-bottom: solid 1px black;">
                    <div class="col-md-4 me-5" style="margin-left:50px;">
                        <p id="getAlamat"><?php echo $dataAlamat['nama_pengguna'];?> | <?php echo $dataAlamat['no_hp'];?> | <?php echo $dataAlamat['alamat'];?></p>
                    </div>
                    <div class=" col-md-2 ">
                        <a href="data_akun.php"
                            class="text-decoration-none " style="color:#FF7F09;">Ubah Alamat</a>
                    </div>

                    <div class=" col-md-2 ">
                        <select name="kurir" id="kurir">
                            <option value="">--Pilih--</option>
                            <option value=" JNT">JNT</option>
                            <option value="Sicepat">Sicepat</option>
                            <option value="JNE">JNE</option>
                            <option value="Ninja Express">Ninja Express</option>
                        </select>
                    </div>
                    <div class=" col-md-2 " style=" color:#FF7F09">
                        <p>Rp. <span class="ongkos">35.000</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3 mb-3 me-1">
                        <b>Pembayaran</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 me-5 mt-1 mb-2" style="margin-left:50px;">
                        <small><b> Metode Pembayaran</b></small>
                    </div>
                    <div class=" col-md-2 ">
                        <small><b> Jenis Bank</b></small>
                    </div>
                </div>
                <div class=" row" style="border-bottom: solid 1px black;">
                    <div class="col-md-6 me-5" style="margin-left:50px;">
                        <p>Transfer Bank </p>
                    </div>
                    <div class="col-md-2 ">
                        <select name="bank" id="bank">
                            <option value="">--Pilih Bank--</option>
                            <option value="Bank BCA">Bank BCA</option>
                            <option value="Bank Mandiri">Bank Mandiri</option>
                            <option value="Bank BNI">Bank BNI</option>
                            <option value="Bank BRI">Bank BRI</option>
                            <option value="Bank BSI">Bank BSI</option>
                            <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="col-md-10 mt-3 d-flex justify-content-end">
                        <b>Total Bayar</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 mt-3 mb-3 d-flex justify-content-end " style="color:#FF7F09;">
                        <p class="me-5" id="gettotalTransaksi">Rp.<span
                                class="total"><?php echo $data['harga'];?></span></p>

                        <input type="hidden" name="nama_barang" id="hiddenNamaBarang"
                            value="<?php echo $data['nama_barang'];?>">
                        <input type="hidden" name="harga_barang" id="hiddenHargaBarang" value="">
                        <input type="hidden" name="jumlah_barang" id="hiddenJumlahBarang" value="">
                        <input type="hidden" name="alamat" id="hiddenAlamat"
                            value="<?php echo $dataAlamat['alamat'];?>">
                        <input type="hidden" name="status_transaksi" id="" value="Menunggu Konfirmasi">
                        <input type="hidden" name="foto" id="hiddenFoto" value="<?php echo $data['foto_barang'];?>">
                        <input type="hidden" name="ongkos_kirim" id="ongkos_kirim" value="">
                        <input type="hidden" name="nama_penjual" id="nama_penjual"
                            value="<?php echo $data['nama_penjual'];?>">
                        <input type="hidden" name="total_transaksi" id="total_transaksi" value="">
                        <button type="submit" name="keranjang" class="btn btn-primary pt-2">Bayar</button>

                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- value untuk database -->



    <script>
    // manipulasi input checout

    const jumlahBarang = document.getElementById('hiddenJumlahBarang')
    const totalHargaBarang = document.getElementById('hiddenHargaBarang')
    const alamat = document.getElementById('hiddenAlamat')
    const getAlamat = document.getElementById('getAlamat')
    const getJumlahBarang = document.getElementById('getJumlahBarang')
    const inputOngkosPengiriman = document.getElementById('ongkos_kirim')
    const total_transaksi = document.getElementById('total_transaksi')
    const gettotalTransaksi = document.getElementById('gettotalTransaksi')
    const angka = document.querySelector(".angka");


    // manipulasi total harga ke inputHiden
    const tambahButtons = document.querySelector(".bottontambah");
    const kurangButtons = document.querySelector(".bottonkurang");
    const hargaElement = document.querySelector(".harga");
    const ongkos = document.querySelector(".ongkos");
    const total = document.querySelector(".total");

    // ubah int
    const harga = parseFloat(hargaElement.innerText.replace(/\./g, ''), 10);
    const ongkosPengiriman = parseFloat(ongkos.innerText.replace(/\./g, ''), 10);
    const totalBiaya = harga + ongkosPengiriman;
    const jmlHarga1 = parseFloat(hargaElement.innerText.replace(/\./g, ''), 10);


    // ubh strg
    inputOngkosPengiriman.value = ongkosPengiriman.toLocaleString('id-ID');
    total.innerText = totalBiaya.toLocaleString('id-ID');
    let i = 1;
    let hargaValue = parseInt(hargaElement.innerHTML.replace(/\./g, ''), 10);
    total_transaksi.value = gettotalTransaksi.innerText;
    totalHargaBarang.value = jmlHarga1.toLocaleString('id-ID');
    jumlahBarang.value = angka.innerText;
    alamat.value = getAlamat.innerText;
    console.log(alamat.value)
    
    
    function tambah() {
        tambahButtons.addEventListener("click", function() {
            i++;
            angka.innerHTML = i;
            hargaElement.innerHTML = (i * hargaValue).toLocaleString('id-ID');
            // total byr setelah btn tambah
            const jmlHarga = parseFloat(hargaElement.innerText.replace(/\./g, ''), 10);
            total.innerText = (jmlHarga + ongkosPengiriman).toLocaleString('id-ID');
            jumlahBarang.value = angka.innerText
            totalHargaBarang.value = jmlHarga.toLocaleString('id-ID');
            total_transaksi.value = gettotalTransaksi.innerText;
        });
    }

    function kurang() {
        kurangButtons.addEventListener("click", function() {
            if (i > 1) {
                i--;
                angka.innerHTML = i;
                hargaElement.innerHTML = (i * hargaValue).toLocaleString('id-ID');

                // total byr setelah btn kurang
                const jmlHarga = parseFloat(hargaElement.innerText.replace(/\./g, ''), 10);
                total.innerText = (jmlHarga + ongkosPengiriman).toLocaleString('id-ID');
                jumlahBarang.value = angka.innerText
                totalHargaBarang.value = jmlHarga.toLocaleString('id-ID');

                // aksi total harga
                total_transaksi.value = gettotalTransaksi.innerText;
               

            }
        });
    }

    tambah();
    kurang();

    
    </script>
    <?php

        include "koneksi.php";

        date_default_timezone_set("Asia/Jakarta");

        if(isset($_POST["keranjang"])){

            $namaBarang = $_POST['nama_barang'];
            $harga_barang = $_POST['harga_barang'];
            $jumlahBarang = $_POST['jumlah_barang'];
            $alamat = $_POST['alamat'];
            $status = $_POST['status_transaksi'];
            $penjual = $_POST['nama_penjual'];
            $bank = $_POST['bank'];
            $kurir = $_POST['kurir'];
            $ongkosKirim = $_POST['ongkos_kirim'];
            $totalTransaksi = $_POST['total_transaksi'];
            $foto = $_POST['foto'];
            $tanggal = date(" d/m/Y");
            $user = $_SESSION["user"];
            $query = "INSERT INTO data_transaksi (nama_barang, username_pembeli, total_harga, jumlah, alamat, tanggal_transaksi, kurir, ongkos_kirim, nama_penjual, status_transaksi, bank, foto_barang, total_transaksi) VALUES ('$namaBarang', '$user', '$harga_barang','$jumlahBarang','$alamat','$tanggal', '$kurir', '$ongkosKirim','$penjual','$status', '$bank', '$foto', '$totalTransaksi')";
            $result = mysqli_query($koneksi, $query);
            
            
            if ($result) {
                echo '<script type="text/javascript">';
                echo 'window.alert("transaksi Berhasil");';
                echo 'window.location.href ="riwayat_transaksi.php";'; 
                echo '</script>';
            } else {
                die(mysqli_error($koneksi));
            }
            
        }
        
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>