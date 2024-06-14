<?php
    session_start();

    if (!isset($_SESSION["user"])){
        header("Location:login.php");
        exit;
    }
    $user = $_SESSION['user']; 

    if (isset($_GET['logout'])) {

    session_destroy();

    header("Location:login.php");
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

    .offcanvas-body a {
        text-decoration: none;
        color: white;
        cursor: pointer;
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

    <!-- Navigation -->

    <?php
                include "navigasi.php";
                
        ?>



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

    <?php
    include 'koneksi.php';

    $id_barang = $_GET['id_barang'];
    $result = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE id_barang='$id_barang'");
    while($user_data = mysqli_fetch_array($result))
    {
    $nama_barang = $user_data['nama_barang'];
    $harga = $user_data['harga'];
    $stok_barang = $user_data['stok_barang'];
    $deskripsi_barang = $user_data['deskripsi_barang'];
    $foto_barang = $user_data['foto_barang'];
    $penjual = $user_data['nama_penjual'];
?>
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 mb-3 hide-margin"
        style="background-color:#FAF4F4; padding: 20px;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
        <div class="row">
            <div class="container col-md-4 ml-3 ">
                <img src="file/foto barang/<?php echo $foto_barang; ?>" class="card-img-top" alt="...">
                <input type="hidden" id="hiddenInputTake" value="<?php echo $foto_barang; ?>">
            </div>
            <div class="countainer col-md-8  ">
                <div class="card mb-1">
                    <div class="card-body bg-light">
                        <form action="" method="post">
                            <b class="card-text " id="nama_barang"><?php echo $nama_barang; ?></b>
                            <input type="hidden" name="teks" id="hiddenInput" value="">
                            <input type="hidden" name="foto" id="hiddenInputFoto" value="">
                            <div class="countainer m-0 p-0">
                                <small class="card-text mt-1 text-warning ">Rp.<?php echo $harga; ?></small><br>
                                <small class="card-text">Tersedia <?php echo $stok_barang; ?></small>
                                <div class="countainer-fluid col mt-1">
                                    <p class="fas me-1 ">5.0</p>
                                    <i class="fas fa-star text-warning "></i>
                                </div>
                            </div><br>
                            <div class="circle-container" style="font-size: 20px;">
                                <img src="file/foto profil user/foto profil.jpg" class="card-img-top" alt="..."
                                    style="width: 6%; border-radius :50%;">
                                <?php echo $penjual;  ?>
                                <input type="hidden" name="penjual" id="hiddenInputpenjual"
                                    value="<?php echo $penjual; ?>">

                            </div><br>
                            <div>
                                <button type="submit" name="keranjang" class="btn btn-primary btn-lg">
                                    <span class="fa-solid fa-cart-shopping"></span>
                                    Masukkan Keranjang
                                </button>
                                <button type="button" class="btn btn-primary btn-lg">
                                    Beli Sekarang
                                </button>
                            </div><br>
                    </div>
                </div>
            </div>
            <hr class="bg-secondary">

            <div class="countainer-fluid col-md-12 ml-3 mt-3 ">
                <div class="card mb-1">
                    <h5 style="margin-left :20px;" class="mt-3">Deskripsi Barang</h5>
                    <p class="card-text mt-0 jarak-botton" style="margin-left :20px;">
                        <?php echo nl2br($deskripsi_barang); ?></p>
                    <?php
        }
        ?>
                </div><br>
            </div>
            </form>

            <hr class="bg-secondary">

            <?php
                   include "koneksi.php";
                   
                   $query = mysqli_query($koneksi, "SELECT * FROM data_barang");
                   ?>
            <div class="container-fluid ">
                <div class="row">
                    <?php while($data = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 mb-3 card-group">
                        <div class="card mb-1">
                            <img src="file/foto barang/<?php echo $data['foto_barang'] ?>" class="card-img-top"
                                alt="Product Image">
                            <div class="card-body bg-light">
                                <h6 class="card-title"><?php echo $data['brand'];?></h5>
                                    <p class="card-text crop-line text-primary"><a
                                            href="detail_barang.php?id_barang=<?php echo $data['id_barang'];?>"><?php echo $data['nama_barang'];?></a>
                                    </p>
                                    <small
                                        class="card-text mt-1 text-warning ">Rp.<?php echo $data['harga']; ?></small><br>
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
        </div>
    </div>


    <script>
        const hargaBarang = document.getElementById('harga_barang').innerText;
        const inputHargaBarang = document.getElementById("hiddenInputBarang").value = hargaBarang;
        const namaBarang = document.getElementById('nama_barang').innerText;
        const inputNamaBarang = document.getElementById("hiddenInput").value = namaBarang;
        const namaFoto = document.getElementById('hiddenInputTake').value;
        const inputNamaFoto = document.getElementById("hiddenInputFoto");
        inputNamaFoto.value = namaFoto;


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

    <?php
        include "koneksi.php";

        if(isset($_POST["keranjang"])){

        $teks = $_POST['teks'];
        $foto = $_POST['foto'];
        $harga = $_POST['harga'];
        $penjual = $_POST['penjual'];
        $user = $_SESSION["user"];
        $query = "INSERT INTO keranjang (nama_barang, username_pembeli, harga_barang, username_penjual, foto_barang) VALUES ('$teks', '$user', '$harga','$penjual', '$foto')";
        $result = mysqli_query($koneksi, $query);
        

        if ($result) {
            echo '<script type="text/javascript">';
              echo 'window.alert("barang sudah ditambahkan ke keranjang");';
              echo '</script>';
        } else {
            die(mysqli_error($koneksi));
        }

        }
    ?>


    <script src="js/bootstrap.min.js"></script>
</body>

</html>