<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_acara = $_POST['nama'];
    $tanggal_acara = $_POST['tanggal'];

    // Proses upload file
    $target_dir = "uploads/"; // Direktori tempat menyimpan gambar
    $target_file = $target_dir . basename($_FILES["foto-tempat"]["name"]);
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file adalah gambar
    $check = getimagesize($_FILES["foto-tempat"]["tmp_name"]);
    if ($check !== false) {
        echo "File adalah gambar - " . $check["mime"] . ".";
        $upload_ok = 1;
    } else {
        echo "File bukan gambar.";
        $upload_ok = 0;
    }

    // Cek ukuran file (limit 2MB)
    if ($_FILES["foto-tempat"]["size"] > 2000000) {
        echo "Maaf, ukuran file terlalu besar.";
        $upload_ok = 0;
    }

    // Izinkan jenis file tertentu
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg"
        && $image_file_type != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        $upload_ok = 0;
    }

    // Periksa apakah tidak ada error sebelum mengunggah file
    if ($upload_ok == 0) {
        echo "Maaf, file Anda tidak dapat diunggah.";
    } else {
        if (move_uploaded_file($_FILES["foto-tempat"]["tmp_name"], $target_file)) {
            echo "File " . htmlspecialchars(basename($_FILES["foto-tempat"]["name"])) . " telah diunggah.";
            // Simpan data acara ke database di sini jika perlu
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
        }
    }
}
?>
