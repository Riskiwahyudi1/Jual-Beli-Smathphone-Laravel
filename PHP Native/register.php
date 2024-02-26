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

<body>
    <div class="card-body col-xl-4 col-lg-4 col-md-6 col-sm-6 col-8 mx-auto "
        style="background-color: #FAF6F6; margin-top : 20vh; border-radius:20px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
        <center>
            <h5 class="text-primary mt-5" style="padding-top: 2rem ;">Register Pembeli</h5>
        </center>
        <form action="" method="POST">
            <div class="col-8 col-xl-6 mx-auto mb-3">
                <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
            </div>
            <div class="col-8 col-xl-6 mx-auto mb-3">
                <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
            </div>
            <div class="col-8 col-xl-6 mx-auto mb-3">
                <input type="number" class="form-control" name="no_hp" placeholder="Masukan No HP" required>
            </div>
            <div class="col-8 col-xl-6 mx-auto mb-3">
                <div class="input-group">
                    <input type="password" class="form-control hide-password" name="kata_sandi" id="kata-sandi"
                        placeholder="Masukan Kata Sandi" required>
                    <div class="input-group-append ">
                        <span class="input-group-text">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-8 col-xl-6 mx-auto mb-3">
                <div class="input-group">
                    <input type="password" class="form-control hide-password" name="konfirmasi_kata_sandi"
                        id="kata-sandi" placeholder="Konfirmasi Kata Sandi" required>
                    <div class="input-group-append ">
                        <span class="input-group-text">
                            <i class="fa-solid fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
            </div>
            <center>
                <button id="noedit" type="submit" class="btn btn-primary mb-3" name="daftar">Daftar</button>
            </center>
            <center style="padding-bottom: 2rem; margin :auto;">
                <small class="pull-right pb-5">Sudah Daftar? <a href="login.php">Masuk</a></small><br>
                <small class="pull-right pb-5 ">Mau Jual Produk ? <a href="register_penjual.php" class="text-danger fw-bold">Buat Toko </a></small>
            </center>
        </form>
    </div>

    <?php
    include "koneksi.php";

    if (isset($_POST['daftar'])) {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
        $kata_sandi = $_POST['kata_sandi'];
        $konfirmasi_kata_sandi = $_POST['konfirmasi_kata_sandi'];
        $foto_profil = mysqli_real_escape_string($koneksi, 'foto profil.jpg');
        
        if ($kata_sandi != $konfirmasi_kata_sandi) {
            echo '<script type="text/javascript">window.alert("Konfirmasi kata sandi tidak sesuai");</script>';
            
        } else {
        
            $hashed_password = password_hash($kata_sandi, PASSWORD_DEFAULT);

            $query = "INSERT INTO login_pembeli (username, email, no_hp, kata_sandi, foto_profil) VALUES ('$username', '$email', '$no_hp', '$hashed_password', '$foto_profil')";
            
            $result = mysqli_query($koneksi, $query);
            
            if ($result) {
                echo '<script type="text/javascript">';
                echo 'window.alert("Akun berhasil Dibuat");';
                echo 'window.location.href = "login.php";'; 
                echo '</script>';
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        }
}
?>




<script>
    const kataSandi = document.querySelectorAll('.hide-password')
    const mata = document.querySelectorAll('.fa-eye-slash')

    for (let i = 0; i < kataSandi.length; i++) {
        mata[i].addEventListener('mousedown', function() {
            tombolMata(i);
        });

        mata[i].addEventListener('mouseup', function() {
            tombolMata(i);
        });
    }

    function tombolMata(index) {
        if (kataSandi[index].type === 'password') {
            kataSandi[index].type = 'text';
            mata[index].classList.remove('fa-eye-slash');
            mata[index].classList.add('fa-eye');
        } else {
            kataSandi[index].type = 'password';
            mata[index].classList.remove('fa-eye');
            mata[index].classList.add('fa-eye-slash');
        }
    }
</script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>