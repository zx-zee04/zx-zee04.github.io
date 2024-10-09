<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tampilkan Data Rencana Perjalanan">
    <title>Data Rencana Perjalanan</title>
    <link rel="stylesheet" href="lihat_trip.css">
</head>
<body>
    <header>
        <h1>Data Rencana Perjalanan</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Destinasi</th>
                    <th>Lama Perjalanan (Hari)</th>
                    <th>Tanggal Perjalanan</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'travel_plan');
                $sql = "SELECT trips.*, categories.name AS category_name FROM trips LEFT JOIN categories ON trips.category_id = categories.id";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['destination']}</td>
                        <td>{$row['days']}</td>
                        <td>{$row['tanggal_perjalanan']}</td>
                        <td>{$row['category_name']}</td>
                        <td>{$row['keterangan']}</td>
                        <td>
                            <a href='edit_trip.php?id={$row['id']}'>Edit</a>
                            <a href='delete_trip.php?id={$row['id']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Rencana Perjalanan. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
