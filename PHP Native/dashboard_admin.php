<?php
    session_start();

    if (!isset($_SESSION["user"])){
        header("Location:login_penjual.php");
        exit;
    }
    $user = $_SESSION['user']; 

    if (isset($_GET['logout'])) {

    session_destroy();

    header("Location:index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ADMINISTRATOR</title>
    <style>
    .conten-hover {
        transition: transform 0.2s ease-in-out;
    }

    .conten-hover:hover {
        transform: scale(1.1);
        cursor: pointer;
    }

    .click-transaksi-menu {
        cursor: pointer;
    }

    .hide-transaksi-menu {
        display: none;
    }

    .show-transaksi-menu {
        display: block;
        transition: 0.5s ease-in-out;
        border-bottom: 1px solid gray;
    }
    .click-barang-menu {
        cursor: pointer;
    }

    .hide-barang-menu {
        display: none;
    }

    .show-barang-menu {
        display: block;
        transition: 0.5s ease-in-out;
        border-bottom: 1px solid gray;
    }

    </style>
</head>

<body>
    <div class="row no-gutters mt-0 h-100">
        <div class="col-md-2 pr-3 pt-4 d-none d-md-block"
            style="background:linear-gradient(180deg,#749BC2, #749BC2, white); padding-bottom: 35vh; position: fixed;">
            <ul class="nav flex-column ml-3 mb-5 ">
                <li class="nav-item ">
                    <img src="logo.jhpg" width="100" alt="">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard_admin.php"><i class="fas fa-shop me-2"></i>
                        <?php echo $user; ?>
                    </a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item ">
                    <a class="nav-link active text-dark bg-white rounded " href="dashboard_admin.php"><i
                            class="fas fa-tachometer-alt me-2 "></i>Dashboard
                    </a>
                    <hr class="bg-secondary">
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white click-barang-menu" href="#"><i class="fas fa-box me-2"></i>Data Produk</a>
                    <div class="naav-item">
                        <a class="nav-link text-white ms-4 hide-barang-menu" href="data_produk.php">Penjualan Barang</a>
                        <a class="nav-link text-white ms-4 rounded hide-barang-menu"
                            href="kategori_produk.php">Kategori Barang</a>
                    </div>
                    <hr class="bg-secondary">

                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white click-transaksi-menu"><i class="fas fa-dollar me-2"></i>Data
                        Transaksi</a>
                    <div>
                        <a class="nav-link text-white ms-4 hide-transaksi-menu" href="data_transaksi.php">Menunggu
                            Konfirmasi</a>
                        <a class="nav-link text-white ms-4 hide-transaksi-menu" href="data_pengiriman.php">Proses
                            Pengiriman</a>
                        <a class="nav-link text-white ms-4 hide-transaksi-menu" href="transaksi_selesai.php">Transaksi
                            Selesai</a>
                        <a class="nav-link text-white ms-4 hide-transaksi-menu"
                            href="transaksi_dibatalkan.php">Transaksi
                            Dibatalkan</a>
                    </div>
                    <hr class="bg-secondary ">
                    <div class="accordion" id="accordionExample">

                </li>
                <li class="nav-item pb-5">
                    <a class="nav-link text-white" href="?logout"><i
                            class="fas fa-right-from-bracket me-2"></i>Logout</a>
                    <hr class="bg-secondary ">
                </li>
            </ul>
        </div>


        <div class="col-md-10 p-5 pt-2 mt-3" style="margin-left: 300px;">
            <center>
                <h3>Dashboard <?php echo $user ?></h3>

            </center>
            <hr>
            <table class="table table-striped table-bordered">
                <div class="container text-center">
                    <div class="row mr-5">
                        <?php
                        include "koneksi.php";
                        $penjual = $_SESSION['user'];
                        $query = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE nama_penjual='$penjual'");

                        if ($query) {
                            $jumlah_kolom = mysqli_num_rows($query);
                        } else {
                            
                            echo "Error: " . mysqli_error($koneksi);
                        }

                        mysqli_close($koneksi);
                        ?>

                        <div class="col-md-3 mr-5 mt-3 conten-hover"
                            style="height:200px;background: linear-gradient(180deg,#749BC2, white, #749BC2); margin: 0 10px 0 3vw; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5); border-radius: 20px;">
                            <i class="fas fa-box-open mr-2 fa-3x " style="margin-top: 70px;"></i>
                            <h5 class="mt-2"><b> <?php echo $jumlah_kolom; ?> </b>Total Produk</h5>
                        </div>

                        <?php
                        include "koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT brand, MIN(nama_barang) FROM data_barang WHERE nama_penjual='$penjual' GROUP BY brand");
                        if ($query) {
                            $jumlah_brand = mysqli_num_rows($query);
                        } else {
                            
                            echo "Error: " . mysqli_error($koneksi);
                        }

                        mysqli_close($koneksi);
                        ?>

                        <div class="col-md-3 mr-5 mt-3 conten-hover"
                            style="height:200px;background: linear-gradient(180deg,#749BC2, white, #749BC2); margin: 0 10px 0 3vw; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5); border-radius: 20px;">
                            <i class="fas fa-layer-group mr-2 fa-3x" style="margin-top: 70px;"></i>
                            <h5 class="mt-2"><?php  echo  $jumlah_brand; ?> Kategori Produk</h3>
                        </div>

                        <?php
                        include "koneksi.php";
                        
                        $query = mysqli_query($koneksi, "SELECT status_transaksi FROM data_transaksi WHERE nama_penjual = '$penjual' AND status_transaksi = 'Menunggu Konfirmasi';");

                        if ($query) {
                            $jumlah_Menunggu_konfirmasi = mysqli_num_rows($query);
                        } else {
                            
                            echo "Error: " . mysqli_error($koneksi);
                        }

                        mysqli_close($koneksi);
                        ?>

                        <div class="col-md-3 mr-5 mt-3 conten-hover"
                            style="height:200px;background: linear-gradient(180deg,#749BC2, white, #749BC2); margin: 0 10px 0 3vw; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5); border-radius: 20px;">
                            <i class="fas fa-hourglass-start mr-2 fa-3x" style="margin-top: 70px;"></i>
                            <h5 class="mt-2"><?php  echo  $jumlah_Menunggu_konfirmasi; ?> Menunggu Konfirmasi</h3>
                        </div>

                        <?php
                        include "koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT status_transaksi FROM data_transaksi WHERE nama_penjual = '$penjual' AND status_transaksi = 'Dalam Pengiriman';");

                        if ($query) {
                            $jumlah_dikirim = mysqli_num_rows($query);
                        } else {
                            
                            echo "Error: " . mysqli_error($koneksi);
                        }

                        mysqli_close($koneksi);
                        ?>

                        <div class="col-md-3 mr-5 mt-5 conten-hover"
                            style="height:200px;background: linear-gradient(180deg,#749BC2, white, #749BC2); margin: 0 10px 0 3vw; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5); border-radius: 20px;">
                            <i class="fas fa-truck mr-2 fa-3x" style="margin-top: 70px;"></i>
                            <h5 class="mt-2"><?php  echo  $jumlah_dikirim; ?> Dalam Pengiriman</h3>
                        </div>

                        <?php
                        include "koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT status_transaksi FROM data_transaksi WHERE nama_penjual = '$penjual' AND status_transaksi = 'selesai';");

                        if ($query) {
                            $jumlah_selesai = mysqli_num_rows($query);
                        } else {
                            
                            echo "Error: " . mysqli_error($koneksi);
                        }

                        mysqli_close($koneksi);
                        ?>

                        <div class="col-md-3 mr-5 mt-5 conten-hover"
                            style="height:200px;background: linear-gradient(180deg,#749BC2, white, #749BC2); margin: 0 10px 0 3vw; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5); border-radius: 20px;">
                            <i class="fas fa-circle-check mr-2 fa-3x" style="margin-top: 70px;"></i>
                            <h5 class="mt-2"><?php  echo  $jumlah_selesai; ?> Transaksi selesai</h3>
                        </div>

                        <?php
                        include "koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT status_transaksi FROM data_transaksi WHERE nama_penjual = '$penjual' AND status_transaksi = 'Dibatalkan';");

                        if ($query) {
                            $jumlah_dibatalkan = mysqli_num_rows($query);
                        } else {
                            
                            echo "Error: " . mysqli_error($koneksi);
                        }

                        mysqli_close($koneksi);
                        ?>
                        <div class="col-md-3 mr-5 mt-5 conten-hover"
                        style="height:200px;background: linear-gradient(180deg,#749BC2, white, #749BC2); margin: 0 10px 0 3vw; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5); border-radius: 20px;">
                        <a href="transaksi_dibatalkan.php" class="text-dark">
                            <i class="fas fa-ban mr-2 fa-3x " style="margin-top: 70px;"></i>
                            <h5 class="mt-2"><?php  echo  $jumlah_dibatalkan; ?> Transaksi Dibatalkan</h3>
                        </a>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>


    <script>

        // tombol data produk
        const listHidentBarang = document.querySelector('.click-barang-menu');
        const clictDataBarang = document.querySelectorAll('.hide-barang-menu');

        listHidentBarang.addEventListener('click', function() {
            clictDataBarang.forEach(function(e) {
                e.classList.toggle('show-barang-menu');
        });

    });


        // tombol transaksi
    const listHident = document.querySelector('.click-transaksi-menu');
    const clictTransaksi = document.querySelectorAll('.hide-transaksi-menu');

    listHident.addEventListener('click', function() {
        clictTransaksi.forEach(function(e) {
            e.classList.toggle('show-transaksi-menu');
        });

    });
    </script>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>