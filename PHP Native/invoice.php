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
    <title>invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- navbar -->
    <!-- <?php
                include "koneksi.php";
                $username = $_SESSION['user'];
                $query = mysqli_query($koneksi, "SELECT * FROM login_pembeli WHERE username = '$username'");
                $foto_profil = mysqli_fetch_assoc($query)
        ?>

    <div style="height: 25px; width: 100%; background-color: #4682A9; margin-bottom: 70px;"></div>
    <nav class="navbar navbar-expand-lg fixed-top" style="height: 75px; background-color: #91C8E4; ;">
        <a href="beranda.php">
            <img src="logo/logo.png" style="height: 50px; width: 100px;" class="ms-3">
        </a>
        <div class="container-fluid">

            <div class="col d-flex justify-content-end">
                <form class="d-flex " role="search">
                    <input style="width: 550px; height: 40px;" class="form-control me-1" placeholder="Cari Barang"
                        aria-label="Search" name="cari_barang">
                    <button style="position: absolute; margin-left: 500px;" name="tombol_cari" class="btn ml-1"
                        type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col d-flex justify-content-end">
                <a href="keranjang.php">
                    <i class="fas fa-cart-plus me-5 text-dark"></i>
                </a>
                <a href="riwayat_transaksi.php">
                    <i class="fas fa-bag-shopping me-5 text-dark"></i>
                </a>
                <a href="">
                    <i class="fas fa-envelope me-5 text-dark"></i>
                </a>

                <img src="file/<?php echo $foto_profil['foto_profil'];?>" class="img-fluid" alt="..."
                    style="width: 25px; height: 25px; border-radius: 50%;">

                <a href="data_akun.php" style="text-decoration: none;">
                    <small class="ms-2 me-5  text-dark"><b><?php echo $foto_profil['username'];?></b></small>
                </a>
                <a href="?logout"><i class="fa-solid fa-sign-out-alt me-5 text-danger"></i></a>
            </div>

        </div>
    </nav> -->
    <?php
        include "koneksi.php";

        $id_transaksi = $_GET['id_transaksi'];
        $query = mysqli_query($koneksi, "SELECT * FROM data_transaksi WHERE id_transaksi='$id_transaksi'");
        $data = mysqli_fetch_assoc($query);
        if ($query) {
           
        } else {
            die(mysqli_error($koneksi));
        }
    ?>

    <div class="container-fluid col-md-9"
        style="margin-top:60px ;box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);background-color:#faf6f6; padding: 20px;">
        <center>
            <h5 class="text-primary">Invoice</h5>
        </center>
        <table>
            <tr>
                <td><b>Status Transaksi</b> </td>
                <td>:</td>
                <td><i><?php echo $data['status_transaksi'];?></i> </td>
            </tr>
            <tr>
                <td><b>Id Transaksi</b> </td>
                <td>:</td>
                <td><i><?php echo $data['id_transaksi'];?></i> </td>
            </tr>
            <tr>
                <td><b>Penjual</b></td>
                <td>:</td>
                <td><i><?php echo $data['nama_penjual'];?></i></td>
            </tr>
            <tr>
                <td><b>Tanggal</b></td>
                <td>:</td>
                <td><i><?php echo $data['tanggal_transaksi']; ?></i></td>
            </tr>
            <tr>
                <td><b>Pembayaran</b></td>
                <td>:</td>
                <td><i><?php echo $data['bank']; ?></i></td>
            </tr>
        </table>

        <div class="row mt-4" style="border-top: solid 1px black;">
            <div class="col-md-8  mt-1 mb-2">
                <small><b style="margin-left:50px;"> Nama Produk</b></small>
            </div>
            <div class=" col-md-1 ">
                <small><b> jumlah </b></small>
            </div>
            <div class=" col-md-2" style="">
                <small><b>Total Harga</b></small>
            </div>
        </div>
        <div class=" row mt-3">
            <div class="col-md-1 ">
                <img src="file/foto barang/<?php echo $data['foto_barang']; ?>" alt="" class="w-100 h-100 me-2"
                    style="margin-left:50px;">
            </div>
            <div class="col-md-7 crop-line">
                <p style="margin-left:40px;"><?php echo $data['nama_barang']; ?></p>
            </div>
            <div class="col-md-1 ">
                <p><?php echo $data['jumlah']; ?> Pcs</p>
            </div>
            <div class="col-md-2 " style="color:#FF7F09">
                <p>Rp.<?php echo $data['total_harga']; ?></p>
            </div>

        </div>

        <div class="row mt-3" style="border-top: solid 1px black;">
            <div class="col-md-9">
                <small><b style="margin-left:50px;">Jenis Kurir</b></small>
            </div>
            <div class=" col-md-2 ">
                <small><b>Ongkos Pengiriman</b></small>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-9">
                <p style="margin-left:50px;"><?php echo $data['kurir']; ?></p>
            </div>

            <div class=" col-md-2 " style=" color:#FF7F09">
                <p> Rp.35.000</p>
            </div>
        </div>
        <div class="row mt-1" style="background-color:#C2C0C0;">
            <div class="col-md-9">
                <b class="">Total Transaksi</b>
            </div>
            <div class="col-md-3" style="color:#FF7F09">
                <b class=""><?php echo $data['total_transaksi']; ?></b>
            </div>
        </div>
        <div class="col-md-4 mt-4" style="border-top: solid 1px black;">
            <b>Tujuan Pengiriman</b>
            <p><?php echo $data['alamat'];?> </P>
        </div>


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