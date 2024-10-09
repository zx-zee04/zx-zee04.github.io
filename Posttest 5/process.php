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

        $stmt = $conn->prepare("INSERT INTO trips (destination, days, tanggal_perjalanan, category_id, keterangan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $destination, $days, $tanggal_perjalanan, $category, $keterangan);
        
        if ($stmt->execute()) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }
        $stmt->close();
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
