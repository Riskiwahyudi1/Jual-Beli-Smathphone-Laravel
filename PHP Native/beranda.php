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
            <img src="logo/logo.png" style="height: 50px; width: 100px; margin-right: 5vw;">


            <div class="d-flex" id="search">
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" style="width: 30vw;" placeholder="Cari Barang"
                        aria-label="Search" name="cari_barang">
                    <button class="btn btn-outline-dark ms-2 " type="submit" name="tombol_cari"><i
                            class="fas fa-search"></i></button>
                </form>
            </div>
            <!-- Tombol Toggle Navbar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
                include "koneksi.php";
                $username = $_SESSION['user'];
                $query = mysqli_query($koneksi, "SELECT * FROM login_pembeli WHERE username = '$username'");
                $foto_profil = mysqli_fetch_assoc($query)
        ?>

            <div class="collapse navbar-collapse" id="">
                <!-- Form Pencarian di Tengah -->
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item">
                        <a href="keranjang.php">
                            <i class="fas fa-cart-plus me-5 text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="riwayat_transaksi.php">
                            <i class="fas fa-bag-shopping me-5 text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="">
                            <i class="fas fa-envelope me-5 text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <img src="file/foto profil user/<?php echo $foto_profil['foto_profil'];?>" class="img-fluid"
                            alt="..." style="width: 25px; height: 25px; border-radius: 50%;">
                        <a href="data_akun.php" style="text-decoration: none;">
                            <small class="ms-2 me-5  text-dark"><b><?php echo $foto_profil['username'];?></b></small>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?logout"><i class="fa-solid fa-sign-out-alt me-2 text-danger"></i></a>
                        </a>

                </ul>
            </div>
        </div>
    </nav>
    <!-- sidebar -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"
        style="max-width: 60vw; background-color: #4682A9;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column ml-3 mb-5 ">

                <li class="nav-item ">
                    <a class="nav-link active text-white  " href="keranjang.php">Keranjang Belanja</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item ">
                    <p class="nav-link text-white click-transaksi-menu">Kategori Produk <i
                            class="fa fa-chevron-right ms-4"></i></p>
                    <div>
                        <?php
                            include "koneksi.php";
                        
                            $query = mysqli_query($koneksi, "SELECT * FROM data_barang");
                        
                            $brand = array();
                            while ($data = mysqli_fetch_assoc($query)){
                                ?>

                        <?php
                                  if (!in_array($data['brand'], $brand)) {
                                              ?>
                        <a href="#" class="ms-4 mb-3 hide-transaksi-menu text-white"><?php echo $data['brand'];?></a>
                        <?php
                                      array_push($brand, $data['brand']);
                                          }
                                      ?>

                        <?php
                            }
                        ?>
                    </div>
                    <hr class="bg-secondary ">
                </li>
                <li class="nav-item ">
                    <a class="nav-link active text-white  " href="riwayat_transaksi.php">Riwayat Transaksi</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item ">
                    <a class="nav-link active text-white  " href="data_akun.php">informasi Akun</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item pb-5">
                    <a class="nav-link text-white" href="?logout">Logout</a>
                    <hr class="bg-secondary ">
                </li>

            </ul>

        </div>
    </div>
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
        }else if (mysqli_num_rows($result) == 0){
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
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 mb-3 card-group">
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
    <script>
    // tombol transaksi
    const listHident = document.querySelector('.click-transaksi-menu');
    const chevron = document.querySelector('.fa-chevron-right');
    const clictTransaksi = document.querySelectorAll('.hide-transaksi-menu');

    listHident.addEventListener('click', function() {

        if (chevron.classList.contains("rotated")) {
            // Jika ya, menghapus kelas 'rotated'
            chevron.classList.remove("rotated");
        } else {
            // Jika tidak, menambahkan kelas 'rotated'
            chevron.classList.add("rotated");
        }


        // hide show brand
        clictTransaksi.forEach(function(e) {
            e.classList.toggle('show-transaksi-menu');
        });

    });
    </script>


    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>