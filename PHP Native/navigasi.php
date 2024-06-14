<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div style="height: 25px; width: 100%; background-color: #4682A9; margin-bottom: 50px;"></div>
    <nav class="navbar navbar-expand-lg fixed-top " style="background-color: #91C8E4;">
        <div class="container-fluid">
            <a href="beranda.php">
                <img src="logo/logo.png" style="height: 50px; width: 100px; margin-right: 5vw;" class="">
            </a>


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
</body>

</html>