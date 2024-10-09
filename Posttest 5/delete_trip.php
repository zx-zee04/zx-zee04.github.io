<?php
$conn = new mysqli('localhost', 'root', '', 'travel_plan');

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM trips WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo "Data berhasil dihapus.";
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}
$stmt->close();
$conn->close();

header("Location: lihat_trip.php");
exit;
?>
