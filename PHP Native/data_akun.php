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
    <title>Lapstore Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .input-group-text {
        height: 2.4em;
        cursor: pointer;
    }
    </style>
</head>

<body style="background-color:#FAF6F6;">
    <div class="card-body col-md-12 mx-auto mv-auto"
        style=" padding-bottom: 1vh; border-radius:20px; ">
        <center>
            <h5 class="text-primary mt-5">Informasi Akun</h5>
        </center>
        <?php
                include "koneksi.php";
                $username = $_SESSION['user'];
                $query = mysqli_query($koneksi, "SELECT * FROM login_pembeli WHERE username = '$username'");
                $data = mysqli_fetch_assoc($query)
        ?>
        <div class="ms-3">
            <img src="file/foto profil user/<?php echo $data['foto_profil'];?>" class="card-img-top ms-3 mb-2" alt="..."
                style="width: 120px; height: 120px; border-radius :50%;"><br>
            <a href="#" class=" mb-3 mx-auto" data-toggle="modal" data-target="#editFotoProfil">
                <p class=" ms-3"> Ubah Foto Profil</p>
            </a>


            <!-- modal ubah foto profil -->
            <div class="example-modal">
                <div id="editFotoProfil" class="modal fade" data-backdrop="static" role="dialog" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <form action="action/action_update_profile_customer.php" method="post" enctype="multipart/form-data">
                                    <h6 class="modal-title">Pilih Foto Anda:</h6>
                                    <input type="hidden" name="username" value="<?php echo $username; ?>" readonly>
                                    <input type="file" id="namaFile" name="namaFile">
                            </div>
                            <div class="modal-footer mb-2">
                                <button id="nosave" type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Batal</button>
                                <input type="submit" name="ubah_foto_profil" class="btn btn-primary" value="Simpan">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="bg-secondary">
        <div class=" col-md-12 ms-3">
            <form action="" method="POST">
                <div>
                    <h6>Data pengguna</h6>
                    <hr class="bg-secondary">
                    <div class="col-md-10 ms-3">
                        <table>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td><?php echo $data['username']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Pengguna</th>
                                <td>:</td>
                                <td id="namaPengguna"><?php echo $data['nama_pengguna']; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Email</th>
                                <td>:</td>
                                <td><?php echo $data['email']; ?></td>
                            </tr>
                            <tr>
                                <th>No Handphone</th>
                                <td>:</td>
                                <td><?php echo $data['no_hp']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <hr class="bg-secondary">
                </div>
            </form>
        </div>

        <div class="ms-4">
            <h6>Alamat</h6>
            <hr class="bg-secondary">
            <div class="col-md-6 ms-3"><p id="alamat"><?php echo $data['alamat']; ?></p>
            </div>
        </div>

    </div>
    <a href="#" class=" mb-3 mx-auto" data-toggle="modal" data-target="#editData">
        <p class="mt-4 ms-5"> Ubah Data</p>
    </a>
    </form>
    </div>
    <!-- Modal edit data akun -->
    <div class="example-modal">
        <div id="editData" class="modal fade" data-backdrop="static" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Perbarui Data Anda</h3>
                    </div>
                    <div class="modal-body">
                        <form action="action/action_update_profile_customer.php" method="post" enctype="multipart/form-data">

                            <div class="form-group mb-2">
                                <p>Username:</p>
                                <input type="text" class="form-control" name="username" placeholder=""
                                    value="<?php echo $data['username']; ?>" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <p>Nama Pengguna:</p>
                                <input type="text" class="form-control" name="nama_pengguna"
                                    placeholder="Lengkapi nama pengguna" value="<?php echo $data['nama_pengguna']; ?>">
                            </div>

                            <div class="form-group mb-2">
                                <p>Alamat Email:</p>
                                <input type="text" class="form-control" name="email" placeholder="email"
                                    value="<?php echo $data['email']; ?>">
                            </div>
                            <div class="form-group mb-2">
                                <p>No Handphone:</p>
                                <input type="text" class="form-control" name="no_hp" placeholder="No Handphone"
                                    value="<?php echo $data['no_hp']; ?>">
                            </div>
                            <div class="form-group mb-2">
                                <p>Alamat:</p>
                                <textarea cols="30" rows="5" class="form-control"
                                    name="alamat"><?php echo $data['alamat']; ?></textarea>
                            </div>
                            <div class="modal-footer mb-2">
                                <button id="nosave" type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Batal</button>
                                <input type="submit" name="proses_simpan" class="btn btn-primary" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    const namaPengguna = document.querySelector("#namaPengguna")
    const alamat = document.querySelector("#alamat")
    if (namaPengguna.innerText == "") {
        namaPengguna.innerHTML = "Lengkapi Nama Pengguna";
        namaPengguna.style.color = "red";
        namaPengguna.style.fontStyle = "italic";
    }
    if (alamat.innerText == "") {
        alamat.innerHTML = "Lengkapi Alamat Anda";
        alamat.style.color = "red";
        alamat.style.fontStyle = "italic";
    }
    </script>
    

    </div>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>