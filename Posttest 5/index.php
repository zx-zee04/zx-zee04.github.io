<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Rencanakan perjalanan Anda dengan mudah dan nyaman dengan fitur-fitur kami.">
    <title>Website Rencana Perjalanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Rencana Perjalanan</h1>
        <nav>
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#tentang-saya">Tentang Saya</a></li>
                <!-- <li><a href="lihat_perjalanan.php">Lihat Perjalanan</a></li> --> <!--belum saatnya, cuman biar ga lupa aja :v -->
                <li><button id="toggle-mode">Dark Mode</button></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="beranda">
            <h2>Selamat Datang di Website Rencana Perjalanan</h2>
            <p>Rencanakan perjalanan Anda dengan mudah dan nyaman.</p>
            <button id="start-planning">Mulai Merencanakan</button>
    
            <h3>Foto-Foto Wisata</h3>
            <div class="gallery">
                <div class="gallery-row">
                    <div class="gallery-item">
                        <img src="assets/universal-studio.jpg" alt="Pemandangan di Universal Studio" />
                        <h4>Universal Studio</h4>
                        <p>Nikmati wahana memacu adrenalin, pertunjukan interaktif, dan berbagai atraksi menarik bertemakan film blockbuster dan serial televisi yang sangat Anda kenal dan sukai.</p>
                    </div>
                    <div class="gallery-item">
                        <img src="assets/disneyland.jpg" alt="Wahana di Disneyland" />
                        <h4>Disneyland</h4>
                        <p>Disneyland adalah tempat anda. Di sini, berapapun umur anda, anda akan menikmati kenangan masa lalu, dan jiwa muda anda akan menikmati tantangan dan janji masa depan</p>
                    </div>
                </div>
                <div class="gallery-row">
                    <div class="gallery-item">
                        <img src="assets/library.jpg" alt="Interior perpustakaan" />
                        <h4>Library</h4>
                        <p>Tempat di mana Anda dapat meminjam koleksi buku dan sumber edukatif lainnya</p>
                    </div>
                    <div class="gallery-item">
                        <img src="assets/technical-museum.jpg" alt="Pameran di Museum Teknologi" />
                        <h4>Technical Museum</h4>
                        <p>Museum Teknologi, tempat dimana kita bisa merefresh pikiran dan mempelajari perkembangan teknologi</p>
                    </div>
                </div>
            </div>

        </section>
        
        <section id="tentang-saya"> 
            <h2>Tentang Saya</h2>
                <div class="mychara">
                    <img src="assets/Chara-boyjpg.jpg" alt="Gambar karakter" />
                    <p>Saya adalah seorang penggemar perjalanan yang dapat membantu merencanakan perjalanan impian Anda.</p>
                </div>
        </section>
    </main>

    <footer id="footer">
        <p> &copy; 2024 Rencana Perjalanan. Semua hak cipta dilindungi.</p>
        <p> Jika ada pertanyaan, drop us an email at <a href="mailto:mnrdhan04@gmail.com">mnrdhan04@gmail.com</a></p>
    </footer>

    <div id="popup" class="hidden">
        <div class="popup-content">
            <span id="close-popup">&times;</span>
            <h3>Form Rencana Perjalanan Anda</h3>
            <form id="planning-form" action="process.php" method="POST">
                <div>
                    <label for="destination">Destinasi Perjalanan:</label>
                    <input type="text" id="destination" name="destination" required>
                </div>
                <div>
                    <label for="days">Lama Perjalanan (Hari):</label>
                    <input type="number" id="days" name="days" required>
                </div>
                <div>
                    <label for="tanggal_perjalanan">Tanggal Perjalanan:</label>
                    <input type="date" id="tanggal_perjalanan" name="tanggal_perjalanan" required>
                </div>
                <div>
                    <label for="keterangan">Keterangan:</label>
                    <textarea id="keterangan" name="keterangan" required></textarea>
                </div>
                <div>
                    <label for="category">Kategori:</label>
                    <select id="category" name="category" required>
                        <?php
                            $conn = new mysqli('localhost', 'root', '', 'travel_plan');
                            $sql = "SELECT * FROM categories";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['id']}'>{$row['name']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>