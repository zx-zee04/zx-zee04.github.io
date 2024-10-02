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
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $destination = htmlspecialchars($_POST['destination']);
                $days = htmlspecialchars($_POST['days']);
                $email = htmlspecialchars($_POST['email']); 
                
                echo "<h2>Destinasi: $destination</h2>";
                echo "<p>Lama Perjalanan: $days hari</p>";
                echo "<p>Email: $email</p>"; 
            } else {
                echo "<p>Form tidak terisi dengan benar.</p>";
            }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Rencana Perjalanan. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
