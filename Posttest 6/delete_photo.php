<?php
$conn = new mysqli('localhost', 'root', '', 'travel_plan');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT file_path FROM trips WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $trip = $result->fetch_assoc();

    if ($trip) {
        $filePath = $trip['file_path'];

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $stmt = $conn->prepare("UPDATE trips SET file_path = NULL WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Foto berhasil dihapus.";
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }
    } else {
        echo "Data tidak ditemukan.";
    }
    $stmt->close();
} else {
    echo "ID tidak ditentukan.";
}

$conn->close();

header("Location: lihat_trip.php");
exit();
?>