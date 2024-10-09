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

    $stmt = $conn->prepare("UPDATE trips SET destination=?, days=?, tanggal_perjalanan=?, category_id=?, keterangan=? WHERE id=?");
    $stmt->bind_param("sissss", $destination, $days, $tanggal_perjalanan, $category, $keterangan, $id);

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
        <form action="" method="POST">
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
                <textarea id="keterangan" name="keterangan" required><?php echo $trip['keterangan']; ?></textarea>
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
            <button type="submit">Update</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Rencana Perjalanan. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
