<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapstore</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-... (hash)" crossorigin="anonymous" />


    <style>
    .offcanvas-body a {
        text-decoration: none;
        color: white;
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

    .fa-chevron-right {
        transition: transform 0.3s ease-in-out;
    }

    .rotated {
        transform: rotate(90deg);
    }

    .crop-line {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
        text-overflow: ellipsis;
        text-decoration: none;
    }

    .card-body .container {
        margin: 0;
        padding: 0;
    }

    .card-body p {
        margin: 0;
    }

    /* Min-width 768px dan Max-width 991px */
    @media only screen and (max-width: 952px) {

        .hide-minisize-regist {
            display: none;
        }
    }

    /* Min-width 768px dan Max-width 991px */
    @media only screen and (min-width: 992px) {

        .hide-margin {
            margin-left: 12vw;
        }
    }
    </style>
</head>

<body>



    <div style="height: 25px; width: 100%; background-color: #4682A9; margin-bottom: 50px;"></div>
    <nav class="navbar navbar-expand-lg fixed-top " style="background-color: #91C8E4;">
        <div class="container-fluid">
            <a href="beranda.php">
                <img src="logo/logo.png" style="height: 50px; width: 100px;" class="">
            </a>


            <div class="d-flex me-2" id="search">
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" style="width: 30vw;" placeholder="Cari Barang"
                        aria-label="Search" name="cari_barang">
                    <button class="btn btn-outline-dark ms-2 " type="submit" name="tombol_cari"><i
                            class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="" id="">
                <!-- Form Pencarian di Tengah -->
                <ul class="navbar-nav ms-auto me-2">

                    <li class="nav-item ">
                        <a href="login.php" class="btn btn-primary me-2">
                            Login
                        </a>

                    </li>
                    <li class="nav-item  hide-minisize-regist ">
                        <a href="login.php" class="btn bg-white ">
                            Register
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- brand select -->

    <div class="row d-none d-lg-block">
        <div class="col"
            style="background-color: #FAF6F6 ;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2); position:fixed; padding-bottom:80vh; width:11vw;">
            <h6 class="mt-2 ms-3 mb-2"><b>Kategori</b></h6>
            <input type="hidden" class="checkboxesHide" value="">
            <?php
            include "koneksi.php";
        
            $query = mysqli_query($koneksi, "SELECT * FROM data_barang");
        
            $brand = array();
            while ($data = mysqli_fetch_assoc($query)){
                ?>
            <table class="ms-3">
                <tr>
                    <?php
                            if (!in_array($data['brand'], $brand)) {
                                ?>
                    <td><input type="checkbox" class="brand_checkbox" value="<?php echo $data['brand'];?>"
                            name="<?php echo $data['brand'];?>"></td>
                    <td><?php echo $data['brand'];?></td>
                    <?php
                                array_push($brand, $data['brand']);
                            } else {
                            ?>
                    <?php
                            }
                        ?>
                </tr>
            </table>
            <?php
            }
        ?>
        </div>
    </div>

    <!-- isi -->

    <?php
    include "koneksi.php";

    $query = mysqli_query($koneksi, "SELECT * FROM data_barang");

    if (isset($_GET['cari_barang'])) {
        $keyword = $_GET['cari_barang'];
        $query1 = "SELECT * FROM data_barang WHERE nama_barang LIKE '%$keyword%'";
        $result = mysqli_query($koneksi, $query1);

        if (isset($_GET['cari_barang']) && $result && mysqli_num_rows($result) > 0) {
        ?>
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 mb-3 hide-margin"
        style="background-color:#FAF4F4; padding: 20px;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">

        <div>
            <h5>Hasil Pencarian untuk : "<small class="text-danger"> <?php echo $keyword; ?></small> "</h5>
            <div class="container-fluid mt-4">
                <div class="row">
                    <?php while ($data = mysqli_fetch_assoc($result)) { ?>

                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 mb-3 card-group">
                        <div class="card mb-1">
                            <img src="file/foto barang/<?php echo $data['foto_barang'];?> " class="card-img-top"
                                alt="Product Image">
                            <div class="card-body bg-light">
                                <h6 class="card-title"><?php echo $data['brand'];?></h5>
                                    <p class="card-text crop-line text-primary"><a
                                            href="detail_barang.php?id_barang=<?php echo $data['id_barang'];?>"><?php echo $data['nama_barang'];?></a>
                                    </p>
                                    <small class="card-text mt-1 text-warning">Rp.<?php echo $data['harga']; ?></small>
                                    <p class="card-text">Tersedia <?php echo $data['stok_barang']; ?></p>
                                    <div class="countainer-fluid col mt-1">
                                        <p class="fas me-1 ">5.0</p>
                                        <i class="fas fa-star text-warning "></i>

                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        }else{
            ?>
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 mb-3 hide-margin"
        style="background-color:#FAF4F4; padding: 15vh 20px 28vh 20px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">


        <div>
            <div class="d-flex justify-content-center mt-5">
                <p><i class="fa-solid fa-search fa-10x"></i></p>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <h5>Hasil Pencarian : "<small class="text-danger"> <?php echo $keyword; ?></small> " </h5>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <h6>Maaf hasil pencarian tidak di temukan!!</h6>
            </div>

        </div>
    </div>
    <?php
        }
        ?>
    <?php

        }else{
            ?>
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 mb-3 hide-margin"
        style="background-color:#FAF4F4; padding: 20px;  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
        <?php if (!isset($_GET['cari_barang']) || (isset($_GET['cari_barang']) && $result && mysqli_num_rows($result) == 0)) { ?>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="logo/gambar-iklan/gambar2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="logo/gambar-iklan/gambar1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="logo/gambar-iklan/gambar3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <hr class="bg-secondary">
        <div class="container-fluid mt-4">
            <div class="row">

                <?php
                 while ($data = mysqli_fetch_assoc($query)) { ?>
                <div class="card-group col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 mb-3 ">
                    <div class="card mb-1">
                        <img src="file/foto barang/<?php echo $data['foto_barang'] ?>" class="card-img-top"
                            alt="Product Image">
                        <div class="card-body bg-light">
                            <h6 class="card-title"><?php echo $data['brand'];?></h5>
                                <p class="card-text crop-line text-primary"><a
                                        href="detail_barang.php?id_barang=<?php echo $data['id_barang'];?>"><?php echo $data['nama_barang'];?></a>
                                </p>
                                <small class="card-text mt-1 text-warning ">Rp.<?php echo $data['harga']; ?></small><br>
                                <small class="card-text">Tersedia <?php echo $data['stok_barang']; ?></small>
                                <div class="countainer-fluid col mt-1">
                                    <p class="fas me-1 ">5.0</p>
                                    <i class="fas fa-star text-warning "></i>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <?php } ?>
        <?php
            }
            ?>

    </div>


    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>