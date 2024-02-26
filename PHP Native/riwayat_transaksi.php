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
        /* Sesuaikan lebar sesuai kebutuhan Anda */
    }

    html {
        height: 100%;
        width: 100%;
    }

    .countainer {
        display: flex;
        justify-content: center;

    }

    .botton {
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
        background-color: #D9D9D9;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .angka {
        width: 20px;
        height: 20px;
        background-color: #D9D9D9;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 5px
    }


    .botton p {
        text-align: center;
        margin: 0;

    }

    @media only screen and (max-width: 768px) {

        .hide-sm-screen {
            display: none;
        }
    }
    </style>
</head>

<body>

    <!-- Navigation -->

    <?php
                include "navigasi.php";
                
        ?>
    <?php
                include "koneksi.php";
                $username = mysqli_real_escape_string($koneksi, $_SESSION['user']);
                $query = mysqli_query($koneksi, "SELECT * FROM data_transaksi WHERE username_pembeli = '$username'");

                if (!$query || mysqli_num_rows($query) == 0) { ?>
    <div class="col-12"
        style="background-color: #FAF6F6; padding:15vh 20px 25vh 20px;box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
        <div>
            <div class="d-flex justify-content-center mt-5">
                <p><i class="fas fa-clock-rotate-left fa-10x"></i></p>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <h5>Belum ada riwayat belanja anda disini</h5>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <h6>Ayo checkout barang belanja anda sekarang </h6>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <a href="keranjang.php" class="btn btn-warning">Keranjang</a>
            </div>
        </div>
    </div>
    <?php }else{
                            ?>
    <div class="mx-auto col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12"
        style="background-color: #FAF6F6; padding:0 20px 80vh 20px;box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); margin-top : 70px;">
        <div>
            <center>
                <h5 class="mb-3 text-primary mt-5" style="padding-top :20px;">Riwayat Belanja</h5>
            </center>
        </div>
        <div class="container-fluid hide-sm-screen" style="border-bottom:1px solid black ;">
            <div class="row">
                <div class="col-md-5 d-flex align-items-center">
                    <p>Produk</p>
                </div>

                <div class="col-md-2">
                    <p>Harga barang</p>
                </div>
                <div class="col-md-2">
                    <p>Status</p>
                </div>
                <div class="col-md-1">
                    <p>Invoice</p>
                </div>
            </div>
        </div>
        <?php while($data = mysqli_fetch_assoc($query)) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 d-flex align-items-center">
                    <p><b>Penjual:</b> <?php echo $data['nama_penjual'] ?></p>
                </div>

            </div>
        </div>
        <form action="" method="post">
            <div class="container-fluid" style="border-bottom: 1px solid black;">
                <div class="row align-items-center">
                    <div class="col-md-5 d-flex align-items-center">

                        <img src="file/foto barang/<?php echo $data['foto_barang'] ?>"
                            style="width: 50px; height: 50px;" alt="" class="mb-2 me-3">
                        <p class="nama_barang"><?php echo $data['nama_barang']; ?></p>
                    </div>
                    <div class="col-2 mt-2">
                        <p style="color: #FF7F09;"><span class="harga"><?php echo $data['total_transaksi'];?></span>
                        </p>
                    </div>
                    <div class="col-md-2 ">
                        <p href="#" class="btn btn-primary mb-3 konfirmasi" data-toggle="modal"
                            data-target="#konfirmasi<?php echo $data['id_transaksi'];?>"><i class="">Barang Diterima?
                            </i></p>
                    </div>
                    <div class="col-md-1 ">
                        <a href="invoice.php?id_transaksi=<?php echo $data['id_transaksi'];?>"
                            class="card-text crop-line btn btn-warning mb-3">Invoice</a>

                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-1 mt-1 ms-">
                        <a href="#" class="" data-toggle="modal"
                            data-target="#deleteproduk<?php echo $data['id_transaksi'];?>"
                            style="color:red; text-decoration:none;"><i
                                class="fa-solid fa-trash mb-3 me-2"></i>Hapus</a>
                    </div>
                </div>
                <!-- modal delete -->
                <div class="example-modal">
                    <div id="deleteproduk<?php echo $data['id_transaksi']; ?>" class="modal fade" role="dialog"
                        style="display:none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h6 style="color :red;" align="center">Apakah anda yakin ingin menghapus
                                        <?php echo $data['nama_barang'];?>?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                        data-dismiss="modal">Cancle</button>
                                    <a href="action/action_update_riwayat_belanja.php?id_transaksi=<?php echo $data['id_transaksi']; ?>"
                                        class="btn btn-primary">Delete</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>
        <!-- modal konfirmasi pesanan -->
        <div class="example-modal">
            <div id="konfirmasi<?php echo $data['id_transaksi']; ?>" class="modal fade" role="dialog"
                style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="action/action_update_riwayat_belanja.php" method="post"
                                enctype="multipart/form-data">
                                <h6 style="color: red;" align="center">Konfirmasi jika barang
                                    <?php echo $data['nama_barang']; ?> sudah diterima</h6>
                                <input type="hidden" name="konfirmasi_brg" value="Selesai">
                                <input type="hidden" class="status" value="<?php echo $data['status_transaksi']; ?>">
                                <input type="hidden" name="id_transaksi_hidden"
                                    value="<?php echo $data['id_transaksi']; ?>">
                                <div class="modal-footer">
                                    <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                        data-dismiss="modal">Batal</button>
                                    <input type="submit" name="konfirmasi_btn" class="btn btn-primary"
                                        value="konfirmasi">
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


    </div>
    <?php
            }
            ?>
    <script>
    // script checkout

    const status = document.querySelectorAll('.status');
    const konfirmasi = document.querySelectorAll('.konfirmasi');
    for (let i = 0; i < status.length; i++) {
        if (status[i].value == 'Selesai') {
            konfirmasi[i].innerHTML = 'Selesai';
            konfirmasi[i].style = 'color:green;';
            konfirmasi[i].classList.remove('btn-primary');
            konfirmasi[i].classList.remove('btn');
            konfirmasi[i].setAttribute("data-target", "");
        } else if (status[i].value == 'Dibatalkan') {
            konfirmasi[i].innerHTML = 'Dibatalkan';
            konfirmasi[i].style = 'color:red;';
            konfirmasi[i].classList.remove('btn-primary');
            konfirmasi[i].classList.remove('btn');
            konfirmasi[i].setAttribute("data-target", "");
        }
    }
    </script>

    <script src="js/bootstrap.min.js"></script>
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