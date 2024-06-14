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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>LapStore</title>
    <style>
    .crop-line {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
        text-overflow: ellipsis;
    }

    .click-transaksi-menu {
        cursor: pointer;
    }

    .hide-transaksi-menu {
        display: block;
    }

    .show-transaksi-menu {
        display: none;
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
                    <a class="nav-link active text-white " href="dashboard_admin.php"><i
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
                    <a class="nav-link text-dark click-transaksi-menu bg-white rounded mb-2"><i
                            class="fas fa-dollar me-2"></i>Data
                        Transaksi</a>
                    <div>
                        <a class="nav-link text-white ms-4 hide-transaksi-menu text-dark rounded"
                            style="background-color: #8CADCE;" href="data_transaksi.php">Menunggu
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

        <div class="col-md-10 p-5 pt-2" style="margin-left: 250px;">
            <center>
                <h4><i class="fas mt-5"></i> Data Transaksi Menunggu Konfirmasi</h4>

            </center>
            <hr>
            <?php
              include 'koneksi.php';
                $username = $_SESSION['user'];
              $query = mysqli_query($koneksi, "SELECT * FROM data_transaksi WHERE nama_penjual ='$username' AND status_transaksi = 'Menunggu Konfirmasi'");
              $no = 1;
              if (!$query || mysqli_num_rows($query) == 0) { ?>

                <div class="container-fluid col-md-12 " style=" padding:25vh 20px 10vh 20px;">
                    <div>
                        <div class="d-flex justify-content-center mt-2">
                            <h5>Tidak ada pesanan pembelian menunggu konfirmasi anda</h5>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <h6>Silahkan tunggu pembelian dari costumer !!</h6>
                        </div>
    
                    </div>
                    <?php }else{?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Transaksi</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Harga </th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal </th>
                        <th scope="col">Pembeli</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Detail Transaksi</th>

                    </tr>
                </thead>
              <?php
              while ($data = mysqli_fetch_assoc($query)){
              ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['id_transaksi'];?></td>
                    <td class="col-md-2">
                        <p class="crop-line"><?php echo $data['nama_barang'];?></p>
                    </td>
                    <td>Rp.<?php echo $data['total_harga'];?></td>
                    <td><?php echo $data['jumlah'];?></td>
                    <td class="col-md-1"><?php echo $data['tanggal_transaksi'];?></td>
                    <td><?php echo $data['username_pembeli'];?></td>
                    <td>
                        <a href="#" class="btn btn-primary mb-3 mx-auto konfirmasi" data-toggle="modal"
                            data-target="#konfirmasi<?php echo $data['id_transaksi'];?>"><i class="">konfirmasi
                                </i></a>
                        <a href="#" class="btn btn-danger mb-3 mx-auto" data-toggle="modal"
                            data-target="#batalkan<?php echo $data['id_transaksi'];?>"><i class="">Batalkan</i></a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-secondary mb-3 mx-auto" data-toggle="modal"
                            data-target="#edittransaksi<?php echo $data['id_transaksi'];?>"><i class="">Lihat Detail</i></a>

                    </td>
                </tr>

                <div class="example-modal">
                    <div class="modal fade" id="edittransaksi<?php echo $data['id_transaksi'];?>" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title mx-auto">Detail Transaksi</h3>
                                    <h4 style="cursor:pointer;"
                                        class="modal-title d-flex justify-content-end btn btn-danger"
                                        data-dismiss="modal"><b>X</b></h4>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?php
                                            $id_transaksi = $data['id_transaksi'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM data_transaksi WHERE id_transaksi='$id_transaksi'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                            ?>
                                        <div class="form-group mb-1">
                                            <b>Id Transaksi</b>
                                            <p class="form-control" name="id_barang">
                                                <?php echo $data1['id_transaksi']; ?></p>
                                        </div>
                                        <div class="form-group mb-1">
                                            <b>Nama Barang</b>
                                            <p class="form-control"><?php echo $data1['nama_barang']; ?></p>

                                        </div>
                                        <div class="form-group mb-1">
                                            <b>Harga Barang</b>
                                            <p class="form-control">Rp.<?php echo $data1['total_harga']; ?></p>

                                        </div>
                                        <div class="form-group mb-1">
                                            <b>Alamat Pengiriman</b>
                                            <p class="form-control"><?php echo $data1['alamat']; ?></p>
                                        </div>
                                        <div class="form-group mb-2">
                                            <b>jumlah Pembelian</b>
                                            <p class="form-control"><?php echo $data1['jumlah']; ?></p>
                                        </div>
                                        <div class="form-group mb-2">
                                            <b>Tanggal Pembelian</b>
                                            <p class="form-control"><?php echo $data1['tanggal_transaksi']; ?></p>
                                        </div>
                                        <div class="form-group mb-2">
                                            <b>Status Transaksi</b>
                                            <p class="form-control"><?php echo $data1['status_transaksi']; ?></p>
                                        </div>

                                        <?php
                                            }
                                            ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- modal konfirmasi pesanan -->
                    <div class="example-modal">
                        <div id="konfirmasi<?php echo $data['id_transaksi']; ?>" class="modal fade" role="dialog"
                            style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <form action="action/action_waiting_confirm.php" method="post" enctype="multipart/form-data">
                                            <h6 style="color :red;" align="center">konfirmasi Pesanan Untuk
                                                <?php echo $data['nama_barang'];?>?</h6>
                                            <input type="hidden" name="dalam_pengiriman" value="Dalam Pengiriman">
                                            <input type="hidden" class="status"
                                                value="<?php echo $data['status_transaksi'];?>">
                                            <input type="hidden" name="transaksi"
                                                value="<?php echo $data['id_transaksi']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                            data-dismiss="modal">Batal</button>
                                        <input type="submit" name="konfirmasi" class="btn btn-primary" value="konfirmasi">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal membatalkan -->
                    <div class="example-modal">
                        <div id="batalkan<?php echo $data['id_transaksi']; ?>" class="modal fade" role="dialog"
                            style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <form action="action/action_waiting_confirm.php" method="post" enctype="multipart/form-data">
                                            <h6 style="color :red;" align="center">batalkan Pesanan Untuk
                                                <?php echo $data['nama_barang'];?>?</h6>
                                            <input type="hidden" name="batalkan" value="Dibatalkan">
                                            <input type="hidden" class="status"
                                                value="<?php echo $data['status_transaksi'];?>">
                                            <input type="hidden" name="transaksi"
                                                value="<?php echo $data['id_transaksi']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                            data-dismiss="modal">Batal</button>
                                        <input type="submit" name="batal" class="btn btn-primary" value="Ok">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <?php
              }
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


                        const status = document.querySelectorAll('.status');
                        const konfirmasi = document.querySelectorAll('.konfirmasi');
                        for (let i = 0; i < status.length; i++) {
                            if (status[i].value == 'Dalam Pengiriman') {
                                konfirmasi[i].innerHTML = 'Dikirim';
                                konfirmasi[i].style = 'color:white;';
                                konfirmasi[i].classList.remove('btn-primary');
                                konfirmasi[i].classList.add('btn-warning');
                                konfirmasi[i].setAttribute("data-target", "");
                            } else if (status[i].value == 'Selesai') {
                                konfirmasi[i].innerHTML = 'Selesai';
                                konfirmasi[i].style = 'color:white;';
                                konfirmasi[i].classList.remove('btn-warning');
                                konfirmasi[i].classList.add('btn-success');
                                konfirmasi[i].setAttribute("data-target", "");
                            }
                        };

                        const listHident = document.querySelector('.click-transaksi-menu');
                        const clictTransaksi = document.querySelectorAll('.hide-transaksi-menu');

                        listHident.addEventListener('click', function() {
                            clictTransaksi.forEach(function(e) {
                                e.classList.toggle('show-transaksi-menu');
                            });

                        });
                        </script>

                        


                        <!-- Optional JavaScript -->
                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                            crossorigin="anonymous">
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                            crossorigin="anonymous">
                        </script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                            crossorigin="anonymous">
                        </script>
                         
</body>

</html>