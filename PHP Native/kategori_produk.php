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
        display: block;
    }

    .show-barang-menu {
        display: none;
        transition: 0.5s ease-in-out;
        border-bottom: 1px solid gray;
    }
    </style>
</head>

<body>
    <div class="row no-gutters h-100">
        <div class="col-md-2 pt-4 d-none d-md-block"
            style="background:linear-gradient(180deg,#749BC2, #749BC2, white); padding-bottom: 35vh; position: fixed;">
            <ul class="nav flex-column mb-5 ">
                <li class="nav-item ">
                    <img src="logo.jhpg" width="100" alt="">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard_admin.php"><i class="fas fa-shop me-2"
                            style="font-size: 1em;"></i>
                        <?php echo $user; ?>
                    </a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item ">
                    <a class="nav-link active text-white " href="dashboard_admin.php"><i
                            class="fas fa-tachometer-alt me-2 "></i>Dashboard
                    </a>
                    <hr class="bg-secondary">
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark bg-white rounded click-barang-menu mb-2" href="#"><i
                            class="fas fa-box me-2"></i>Data Produk</a>
                    <div>
                        <a class="nav-link text-white ms-4 hide-barang-menu" href="data_produk.php">Penjualan Barang</a>
                        <a class="nav-link text-white ms-4 rounded hide-barang-menu" style="background-color: #8CADCE;"
                            href="kategori_barang.php">Kategori Barang</a>
                    </div>
                    <hr class="bg-secondary ">
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
                    <a class="nav-link text-white" href="data_transaksi.php"><i
                            class="fas fa-right-from-bracket me-2"></i>Logout</a>
                    <hr class="bg-secondary ">
                </li>
            </ul>
        </div>


        <div class="col-md-10 p-5 pt-2 mt-3" style="margin-left: 300px;">
            <center>
                <h3>Daftar Kategori Produk</h3>

            </center>
            <hr>
            <?php
            include "koneksi.php";
            $penjual = $_SESSION['user'];
            $query_barang = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE nama_penjual='$penjual'");
            $brand = array();
            if (!$query_barang || mysqli_num_rows($query_barang) == 0) { ?>
            
                <div class="container-fluid col-md-12 "
                    style=" padding:25vh 20px 10vh 20px;">
                    <div>
                        <div class="d-flex justify-content-center mt-2">
                            <h5>Daftar kategori produk anda masih kosong</h5>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <h6>Ayo jual produk anda sekarang !!</h6>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                        <a href="data_barang.php" class="btn btn-success mx-auto"><i class="fas fa-plus-circle me-2"></i>Jual Produk</a>
                        </div>
                    </div>
                    <?php }else{
                        ?>
            <table class="table table-striped table-bordered">
                <div class="container text-center">
                    <div class="row mr-5">
                        <?php
                        while ($data_barang = mysqli_fetch_assoc($query_barang)) {
                            if (!in_array($data_barang['brand'], $brand)) {
                                $brand1 = mysqli_real_escape_string($koneksi, $data_barang['brand']);
                                $query_count = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_baris FROM data_barang WHERE nama_penjual='$penjual' AND brand = '$brand1'");
                                $data_count = mysqli_fetch_assoc($query_count);

                                $jumlah_baris = $data_count['jumlah_baris'];
                                ?>
                        <div class="col-md-3 mr-5 mt-4 conten-hover"
                            style="height:200px;background: linear-gradient(180deg,#749BC2, white, #749BC2); margin: 0 10px 0 3vw; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5); border-radius: 20px;">
                            <h2 class="" style="margin-top: 70px;"><?php echo $data_barang['brand']; ?></h2>
                            <h5 class="mt-2"><?php echo $jumlah_baris; ?> Produk</h5>
                        </div>
                        <?php
                                array_push($brand, $data_barang['brand']);
                            }
                        }
                        ?>
                    </div>
                </div>
            </table>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>

<?php
                    }
?>
    <script>
    // tombol data produk

    const listHidentBarang = document.querySelector('.click-barang-menu');
    const clictDataBarang = document.querySelectorAll('.hide-barang-menu');

    listHidentBarang.addEventListener('click', function() {
        clictDataBarang.forEach(function(e) {
            e.classList.toggle('show-barang-menu');
        });

    });

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