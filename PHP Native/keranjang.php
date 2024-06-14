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

    /* Min-width 768px dan Max-width 991px */
    @media only screen and (max-width: 768px) {

        .hide-sm-screen {
            display : none;
        }
    }
    /* @media only screen and (min-width: 992px) {
        .sm-left-margin{
            margin-left:5vw;
        }
        
    } */
    </style>
</head>

<body>

    <!-- Navigation -->

    <?php
                include "navigasi.php";
                
        ?>


    <?php
                include "koneksi.php";
                
                $query = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE id_barang");
                $data1 = mysqli_fetch_assoc($query)
                ?>
    <?php

        include "koneksi.php";
        $keranjang_user =  $_SESSION['user']; 
        $query = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE username_pembeli = '$keranjang_user'");
        if (!$query || mysqli_num_rows($query) == 0) { ?>
    <div class="col-12"
        style="background-color: #FAF6F6; padding:15vh 20px 25vh 20px;box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
        <div>
            <div class="d-flex justify-content-center mt-5">
                <p><i class="fa-solid fa-cart-shopping fa-10x"></i></p>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <h5>Keranjang belanja anda masih kosong</h5>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <h6>Ayo tambahkan produk belanjaan anda di sini </h6>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <a href="beranda.php" class="btn btn-warning">Cari Barang</a>
            </div>
        </div>
        <?php }else{
            ?>
        <div class="mx-auto col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12"
            style=" padding:0 20px 20px 20px;box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); margin-top : 60px; height:85vh;">
            <div>
                <center>
                    <h5 class="mb-3 text-primary mt-5" style="padding-top :20px;">Daftar Keranjang</h5>
                </center>
            </div>
            <div class="container-fluid" style="border-bottom:1px solid black ;">
                <div class="row hide-sm-screen">
                    <div class="col-6 d-flex align-items-center">
                        <input type="checkbox" name="" id="" class="me-2 mb-3">
                        <p>Produk</p>
                    </div>

                    <div class="col-md-2">
                        <p>Harga barang</p>
                    </div>
                    <div class="col-md-1">
                        <p></p>
                    </div>
                </div>
            </div>
            <?php while($data = mysqli_fetch_assoc($query)) { ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7 d-flex align-items-center ms-3">
                        <p><b>Penjual:</b> <?php echo $data['username_penjual'] ?></p>
                    </div>

                </div>
            </div>
            <form action="" method="post">
                <div class="container-fluid" style="border-bottom: 1px solid black;">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-sm-12 d-flex align-items-center">
                            <input type="checkbox" name="" id="" class="me-3 mb-2 checkbox-keranjang"
                                value="<?php echo $data['id_barang']; ?>">
                            <input type="hidden" class="takeId" value="<?php echo $data['id_barang']; ?>">
                            <img src="file/foto barang/<?php echo $data['foto_barang'] ?>"
                                style="width: 50px; height: 50px;" alt="" class="mb-2 me-3">
                            <p class="nama_barang"><?php echo $data['nama_barang']; ?></p>
                        </div>
                        <div class="col-md-2 mt-2">
                            <p style="color: #FF7F09;">Rp.<span class="harga"><?php echo $data['harga_barang'];?></span>
                            </p>
                        </div>
                        <div class="col-md-3 mt-1 sm-left-margin">
                            <i class="fa-solid fa-trash text-danger mb-3 me-2"></i>
                            <a href="#" class="" data-toggle="modal" data-target="#deleteproduk<?php echo $data['id_barang'];?>" style="color:red; text-decoration:none;">Hapus</a>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div class="example-modal">
                        <div id="deleteproduk<?php echo $data['id_barang']; ?>" class="modal fade" role="dialog"
                            style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <center>
                                            <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                        </center>
                                    </div>
                                    <div class="modal-body">
                                        <h6 style="color :red;" align="center">Apakah anda yakin ingin menghapus
                                            <?php echo $data['nama_barang'];?>?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                            data-dismiss="modal">Cancle</button>
                                        <a href="delete.php?id_barang=<?php echo $data['id_barang']; ?>"
                                            class="btn btn-primary">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>

                <div class="container d-flex justify-content-end me-5 mb-5 fixed-bottom">
                    <button type="button" name="checkout" class="btn btn-primary me-5">
                        <a id="linkId" href="checkout.php?id_barang=<?php echo $data['id_barang'] ?>"
                            class="text-white text-decoration-none">checkout</a>
                    </button>
                </div>
            </form>
        </div>
        <script>
        // script checkout

        const checkbox = document.querySelectorAll('.checkbox-keranjang');
        const link = document.querySelector('#linkId');
        for (let i = 0; i < checkbox.length; i++) {
            checkbox[i].addEventListener('change', function() {
                const isChecked = this.checked;

                if (isChecked) {
                    const takeId = document.querySelectorAll(`.takeId`);
                    checkbox.value = takeId[i].value;
                    link.href = "checkout.php?id_barang=" + checkbox.value;
                    link.style.display = "inline";
                } else {
                    link.removeAttribute("href");
                    
                }
            });
        }
        <?php
            }
            ?>
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