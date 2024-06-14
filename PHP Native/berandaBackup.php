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
        max-height: 400px;
    }

    #carouselExampleDark .carousel-inner img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .crop-line {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
        text-overflow: ellipsis;

    }

    .card-body .container {
        margin: 0;
        padding: 0;
    }

    .card-body p {
        margin: 0;
    }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php
                include "koneksi.php";
                $username = $_SESSION['user'];
                $query = mysqli_query($koneksi, "SELECT * FROM login_pembeli WHERE username = '$username'");
                $foto_profil = mysqli_fetch_assoc($query)
        ?>

    <div style="height: 25px; width: 100%; background-color: #4682A9; margin-bottom: 70px;"></div>
    <nav class="navbar navbar-expand-lg fixed-top" style="height: 75px; background-color: #91C8E4; ;">
        <img src="logo/logo.png" style="height: 50px; width: 100px;" class="ms-3">
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

                <img src="file/foto profil user/<?php echo $foto_profil['foto_profil'];?>" class="img-fluid" alt="..."
                    style="width: 25px; height: 25px; border-radius: 50%;">

                <a href="data_akun.php" style="text-decoration: none;">
                    <small class="ms-2 me-5  text-dark"><b><?php echo $foto_profil['username'];?></b></small>
                </a>
                <a href="?logout"><i class="fa-solid fa-sign-out-alt me-5 text-danger"></i></a>
            </div>

        </div>
    </nav>

    <!-- brand select -->

    <div class="row">
        <div class="col-md-1 "
            style="background-color: #FAF6F6 ;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2); position:fixed; padding-bottom:80vh;">
            <h6 class="mt-2 ms-3 mb-2"><b>Kategori</b></h6>
            <input type="hidden" class="checkboxesHide" value="">
            <?php
                include "koneksi.php";
            
                $query = mysqli_query($koneksi, "SELECT * FROM data_barang");
            
                $brand = array();
                while ($data = mysqli_fetch_assoc($query)){
                        ?>
            <table class=" ms-3">
                <tr>
                    <?php
                        if (!in_array($data['brand'], $brand)) {
                            ?>
                    <td><input type="checkbox" class="brand_checkbox" value="<?php echo $data['brand'];?>"
                            name="<?php echo $data['brand'];?>"></td>
                    <td><?php echo $data['brand'];?></td>
                    <?php
                            array_push($brand, $data['brand']);
                            ?>
                    <?php
                        }else {
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

        <?php
    include "koneksi.php";

    $query = mysqli_query($koneksi, "SELECT * FROM data_barang");

    if (isset($_GET['cari_barang'])) {
        $keyword = $_GET['cari_barang'];
        $query1 = "SELECT * FROM data_barang WHERE nama_barang LIKE '%$keyword%'";
        $result = mysqli_query($koneksi, $query1);

        if (isset($_GET['cari_barang']) && $result && mysqli_num_rows($result) > 0) {
        ?>
        <div class="col-md-10 "
            style="background-color:#FAF4F4; padding: 20px; margin-left:12vw;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">

            <div>
                <h5>Hasil Pencarian untuk : "<small class="text-danger"> <?php echo $keyword; ?></small> "</h5>
                <div class="container-fluid mt-4">
                    <div class="row">
                        <?php while ($data = mysqli_fetch_assoc($result)) { ?>

                        <div class="col-md-2 ml-3 fixed-width-column">
                            <div class="card mb-1">
                                <img src="file/foto barang/<?php echo $data['foto_barang'];?> "class="card-img-top" alt="Product Image">
                                <div class="card-body bg-light">
                                    <h6 class="card-title"><?php echo $data['brand'];?></h5>
                                        <p class="card-text crop-line text-primary"><a
                                                href="detail_barang.php?id_barang=<?php echo $data['id_barang'];?>"><?php echo $data['nama_barang'];?></a>
                                        </p>
                                        <p class="card-text mt-1 text-warning">Rp.<?php echo $data['harga']; ?></p>
                                        <p class="card-text">Tersedia <?php echo $data['stok_barang']; ?></p>
                                        <div class="countainer-fluid col mt-1">
                                            <p class="fas me-1 ">5.0</p>
                                            <i class="fas fa-star text-warning "></i>
                                            <i class="fas fa-star text-warning "></i>
                                            <i class="fas fa-star text-warning "></i>
                                            <i class="fas fa-star text-warning"></i>
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
        <div class="col-md-10 "
            style="background-color:#FAF4F4; padding: 15vh 20px 28vh 20px; margin-left:12vw;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">


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
        <div class="col-md-10 "
            style="background-color:#FAF4F4; padding: 20px; margin-left:12vw;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
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
                    <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-md-2 ml-3 fixed-width-column">
                        <div class="card mb-1">
                            <img src="file/foto barang/<?php echo $data['foto_barang'] ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body bg-light">
                                <h6 class="card-title"><?php echo $data['brand'];?></h5>
                                    <p class="card-text crop-line text-primary"><a
                                            href="detail_barang.php?id_barang=<?php echo $data['id_barang'];?>"><?php echo $data['nama_barang'];?></a>
                                    </p>
                                    <small class="card-text mt-1 text-warning">Rp.<?php echo $data['harga']; ?></small>
                                    <small class="card-text">Tersedia <?php echo $data['stok_barang']; ?></small>
                                    <div class="countainer-fluid col mt-1">
                                        <p class="fas me-1 ">5.0</p>
                                        <i class="fas fa-star text-warning "></i>
                                        <i class="fas fa-star text-warning "></i>
                                        <i class="fas fa-star text-warning "></i>
                                        <i class="fas fa-star text-warning"></i>
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
        const checkboxes = document.querySelectorAll(".brand_checkbox");
        const checkboxesHide = document.querySelectorAll(".checkboxesHide");

        checkboxes.forEach(function(cb) {
            cb.addEventListener("change", function() {
                checkboxesHide.value = cb.value
                console.log(checkboxesHide.value);
            })

        });
        </script>

        <script src="js/bootstrap.min.js"></script>
</body>

</html>