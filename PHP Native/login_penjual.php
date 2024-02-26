<?php
    session_start();

    include 'koneksi.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $kata_sandi = $_POST['kata_sandi'];

        $data = mysqli_query($koneksi, "SELECT * FROM login_penjual WHERE username='$username'");

        if (mysqli_num_rows($data) > 0) {
            $row = mysqli_fetch_array($data);

            
            if (password_verify($kata_sandi, $row['kata_sandi'])) {
                $_SESSION['user'] = $row['username'];
                $_SESSION['pass'] = $row['kata_sandi'];

                header("location:dashboard_admin.php");
            } else {
                echo "<script>alert( 'Username Atau Password Salah')</script>";
            }
        } else {
            echo "<script>alert( 'Username Atau Password Salah')</script>";
        }
    }
    ?>
<style>
    .input-group-text {
        height: 2.4em;
        cursor: pointer;
    }
    </style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapstore Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    
</head>

<body>


    <div class="card-body col-xl-4 col-lg-4 col-md-6 col-sm-6 col-8 mx-auto " style="background-color: #FAF6F6; margin-top : 20vh; border-radius:20px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);">
        <center>
        <center>
            <h5 class="text-primary mb-3" style="padding-top: 2rem ;">Login Penjual</h5>
        </center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="col-8 mx-auto mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="col-8 mx-auto mb-3">
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
            <center>
                <button id="noedit" type="submit" class="btn btn-primary mb-3" name="login">Masuk</button>
            </center>
            <center style="padding-bottom: 2rem; margin :auto;">
                <small class="pull-right pb-5"> Belum Punya Toko? <a href="register_penjual.php">Daftar</a></small>
            </center>
        </form>
    </div>
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