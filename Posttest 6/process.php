<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hasil Perencanaan Perjalanan">
    <title>Hasil Rencana Perjalanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hasil Rencana Perjalanan Anda</h1>
    </header>
    <main>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'travel_plan');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $destination = htmlspecialchars($_POST['destination']);
        $days = htmlspecialchars($_POST['days']);
        $tanggal_perjalanan = htmlspecialchars($_POST['tanggal_perjalanan']);
        $category = htmlspecialchars($_POST['category']);
        $keterangan = htmlspecialchars($_POST['keterangan']);

        $uploadDir = 'uploads/'; 
        $fileUpload = $_FILES['file_upload'];

        if ($fileUpload['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $fileUpload['tmp_name'];
            $fileName = $fileUpload['name'];
            $fileSize = $fileUpload['size'];

            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $dateTime = date('Y-m-d H.i.s');
            $newFileName = "{$dateTime}.{$fileExtension}";

            $destPath = $uploadDir . $newFileName;

            if ($fileSize <= 2097152) {
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $stmt = $conn->prepare("INSERT INTO trips (destination, days, tanggal_perjalanan, category_id, keterangan, file_path) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sissss", $destination, $days, $tanggal_perjalanan, $category, $keterangan, $destPath);

                    if ($stmt->execute()) {
                        echo "Data berhasil disimpan.";
                    } else {
                        echo "Terjadi kesalahan: " . $stmt->error;
                    }
                } else {
                    echo "Gagal mengupload file.";
                }
            } else {
                echo "Ukuran file melebihi batas maksimum (2MB).";
            }
        } else {
            echo "Terjadi kesalahan saat mengupload file: " . $fileUpload['error'];
        }
    } else {
        echo "<p>Form tidak terisi dengan benar.</p>";
    }
    $conn->close();
    ?>
    </main>
    <footer>
        <p>&copy; 2024 Rencana Perjalanan. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
