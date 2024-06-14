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
    .ukuran_barang {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 1;
    }
    </style>
</head>

<body style="background-color:gray;">

    <div class="row no-gutters mt-0">
        <div class="col-md-2 mt-2 pr-3 pt-4 " style="background-color:#749BC2;">
            <ul class="nav flex-column ml-3 mb-5 ">
                <li class="nav-item ">
                    <img src="logo.jhpg" width="100" alt="">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard_admin.php"><i
                            class="fas fa-user me-2"></i><b><?php echo $user; ?></b></a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard_admin.php"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="data_produk.php"><i class="fas fa-box me-2"></i>Data Produk</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="data_transaksi.php"><i class="fas fa-dollar me-2"></i>Data
                        Transaksi</a>
                    <hr class="bg-secondary ">
                </li>
                <li class="nav-item pb-5">
                    <a class="nav-link text-white" href="data_transaksi.php"><i
                            class="fas fa-right-from-bracket me-2"></i>Logout</a>
                    <hr class="bg-secondary ">
                </li>
            </ul>
        </div>


        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas mr-2"></i> Data Produk</h3>
            <hr>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Id Transaksi</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Harga transaksi</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <?php
              include 'koneksi.php';
                $username = $_SESSION['user'];
              $query = mysqli_query($koneksi, "SELECT * FROM data_transaksi WHERE nama_penjual ='$username'");
              $no = 1;
              while ($data = mysqli_fetch_assoc($query)){
              ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['id_transaksi'];?></td>
                    <td><?php echo $data['nama_barang'];?></td>
                    <td>Rp.<?php echo $data['total_harga'];?></td>
                    <td><?php echo $data['jumlah'];?></td>
                    <td><?php echo $data['tanggal_transaksi'];?></td>
                    <td><?php echo $data['username_pembeli'];?></td>
                    <td>
                        <a href="#" class="btn btn-primary mb-3 mx-auto konfirmasi" data-toggle="modal"
                            data-target="#konfirmasi<?php echo $data['id_transaksi'];?>"><i class="">konfirmasi
                                Pemesanan</i></a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-success mb-3 mx-auto" data-toggle="modal"
                            data-target="#edittransaksi<?php echo $data['id_transaksi'];?>"><i class="">Detail
                                Transaksi</i></a>
                        <a href="#" class="btn btn-danger mb-3 mx-auto" data-toggle="modal"
                            data-target="#deleteproduk<?php echo $data['id_transaksi'];?>"><i class="">Hapus</i></a>
                    </td>
                </tr>

                <!-- Modal detail -->

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

                <!-- modal delete -->

                <div class="example-modal">
                    <div id="deleteproduk<?php echo $data['id_transaksi']; ?>" class="modal fade" role="dialog"
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
                                    <a href="simpan_produk.php?id_transaksi=<?php echo $data['id_transaksi']; ?>"
                                        class="btn btn-primary">Delete</a>
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
                                        <form action="simpan_produk.php" method="post" enctype="multipart/form-data">
                                            <h6 style="color :red;" align="center">konfirmasi Pesanan Untuk
                                                <?php echo $data['nama_barang'];?>?</h6>
                                            <input type="hidden" name="konfirmasi" value="Dalam Pengiriman">
                                            <input type="hidden" class="status"
                                                value="<?php echo $data['status_transaksi'];?>">
                                            <input type="hidden" name="id_transaksi"
                                                value="<?php echo $data['id_transaksi']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                            data-dismiss="modal">Batal</button>
                                        <input type="submit" class="btn btn-primary" value="konfirmasi">
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
                            konfirmasi[i].classList.add('btn-dark');
                            konfirmasi[i].setAttribute("data-target", "");
                        }
                    };
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