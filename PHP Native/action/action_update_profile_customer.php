<?php
include "../koneksi.php";

if (isset($_POST["proses_simpan"])) {
    $username_edit = $_POST["username"] ?? "";
    $nama_pengguna = $_POST["nama_pengguna"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];

    $query = "UPDATE login_pembeli SET nama_pengguna=?, email=?, no_hp=?, alamat=? WHERE username=?";

    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $nama_pengguna, $email, $no_hp, $alamat, $username_edit);

    if (mysqli_stmt_execute($stmt)) {
        $alert_message = "Data berhasil diperbarui";
    } else {
        $alert_message = "Gagal memperbarui data: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
} elseif (isset($_POST["ubah_foto_profil"])) {
    $username_foto = $_POST["username"] ?? "";
    $direktori = "../file/foto profil user/";

    // Mendapatkan informasi path file
    $pathInfo = pathinfo($_FILES["namaFile"]["name"]);

    // Mendapatkan ekstensi file
    $fileExtension = strtolower($pathInfo['extension']);

    // Memeriksa apakah ekstensi file diizinkan
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if (in_array($fileExtension, $allowedExtensions)) {
        $foto_profil = $_FILES["namaFile"]['name'];

        if (move_uploaded_file($_FILES['namaFile']['tmp_name'], $direktori . $foto_profil)) {
            $query_foto = "UPDATE login_pembeli SET foto_profil=? WHERE username=?";
            
            $stmt_foto = mysqli_prepare($koneksi, $query_foto);
            mysqli_stmt_bind_param($stmt_foto, "ss", $foto_profil, $username_foto);

            if (mysqli_stmt_execute($stmt_foto)) {
                $alert_message = "Data berhasil diperbarui";
            } else {
                $alert_message = "Gagal memperbarui data: " . mysqli_error($koneksi);
            }

            mysqli_stmt_close($stmt_foto);
        } else {
            $alert_message = "Gagal mengunggah file. Pastikan file yang diunggah adalah gambar.";
        }
    } else {
        $alert_message = "Hanya file gambar (JPG, JPEG, PNG, GIF) yang diizinkan untuk diupload.";
    }
}


echo '<script type="text/javascript">';
echo "window.alert('$alert_message');";
echo 'window.location.href ="../data_akun.php";'; 
echo '</script>';
?>
