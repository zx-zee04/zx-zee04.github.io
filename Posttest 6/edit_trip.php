<?php
$conn = new mysqli('localhost', 'root', '', 'travel_plan');

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM trips WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$trip = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = htmlspecialchars($_POST['destination']);
    $days = htmlspecialchars($_POST['days']);
    $tanggal_perjalanan = htmlspecialchars($_POST['tanggal_perjalanan']);
    $category = htmlspecialchars($_POST['category']);
    $keterangan = htmlspecialchars($_POST['keterangan']);
    
    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $fileTmpPath = $_FILES['file_upload']['tmp_name'];
        $fileExtension = strtolower(pathinfo($_FILES['file_upload']['name'], PATHINFO_EXTENSION));
        $dateTime = date('Y-m-d H.i.s');
        $newFileName = "{$dateTime}.{$fileExtension}";
        $target_file = $target_dir . $newFileName;

        $uploadOk = 1;

        if ($_FILES["file_upload"]["size"] > 2000000) {
            echo "Maaf, ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        if ($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg") {
            echo "Maaf, hanya file JPG, JPEG, & PNG yang diizinkan.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($fileTmpPath, $target_file)) {
                if ($trip['file_path'] && file_exists($trip['file_path'])) {
                    unlink($trip['file_path']);
                }
                $stmt = $conn->prepare("UPDATE trips SET destination=?, days=?, tanggal_perjalanan=?, category_id=?, keterangan=?, file_path=? WHERE id=?");
                $stmt->bind_param("sissssi", $destination, $days, $tanggal_perjalanan, $category, $keterangan, $target_file, $id);
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
            }
        }
    } else {
        $stmt = $conn->prepare("UPDATE trips SET destination=?, days=?, tanggal_perjalanan=?, category_id=?, keterangan=? WHERE id=?");
        $stmt->bind_param("sissss", $destination, $days, $tanggal_perjalanan, $category, $keterangan, $id);
    }

    if ($stmt->execute()) {
        header("Location: lihat_trip.php"); 
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Edit Rencana Perjalanan">
    <title>Edit Rencana Perjalanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Rencana Perjalanan</h1>
    </header>
    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="destination">Destinasi Perjalanan:</label>
                <input type="text" id="destination" name="destination" value="<?php echo $trip['destination']; ?>" required>
            </div>
            <div>
                <label for="days">Lama Perjalanan (Hari):</label>
                <input type="number" id="days" name="days" value="<?php echo $trip['days']; ?>" required>
            </div>
            <div>
                <label for="tanggal_perjalanan">Tanggal Perjalanan:</label>
                <input type="date" id="tanggal_perjalanan" name="tanggal_perjalanan" value="<?php echo $trip['tanggal_perjalanan']; ?>" required>
            </div>
            <div>
                <label for="keterangan">Keterangan:</label>
                <textarea id="keterangan" name="keterangan"><?php echo $trip['keterangan']; ?></textarea>
            </div>
            <div>
                <label for="category">Kategori:</label>
                <select id="category" name="category" required>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'travel_plan');
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['id'] == $trip['category_id']) ? 'selected' : '';
                        echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>Foto Saat Ini:</label><br>
                <?php if ($trip['file_path']): ?>
                    <img src="<?php echo $trip['file_path']; ?>" alt="Foto Perjalanan" style="max-width: 200px; max-height: 200px;"><br>
                <?php else: ?>
                    <p>Tidak ada foto saat ini.</p>
                <?php endif; ?>
            </div>
            <div>
                <label for="file_upload">Upload Foto Baru (jika ada):</label>
                <input type="file" id="file_upload" name="file_upload" accept=".jpg,.jpeg,.png">
            </div>
            <button type="submit">Update</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Rencana Perjalanan. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
