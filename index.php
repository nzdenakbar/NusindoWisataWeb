<?php
require __DIR__ . '/config/database.php';

/**
 * Mengambil paket wisata yang aktif dari database.
 */
$query = "
    SELECT *
    FROM packages
    WHERE is_active = 1
    ORDER BY id ASC
";

$result = $conn->query($query);
$packages = $result->fetch_all(MYSQLI_ASSOC);

/**
 * Gambar destinasi wisata.
 * Pastikan nama file sesuai dengan folder gambar.
 */
$photos = [
    'Yogyakarta' => 'gambar/tugu.jpg',
    'Bali'       => 'gambar/bali.jpg',
    'Bandung'    => 'gambar/bandung.jpg',
    'Bromo'      => 'gambar/bromo.jpg',
    'Jakarta'    => 'gambar/monas.jpg',
    'Lombok'     => 'gambar/lombok.jpg',
    'Malang'     => 'gambar/malangbatu.jpg.png',
];

/**
 * Informasi kontak Nusindo Wisata.
 */
$email = 'nusindowisata@gmail.com';
$phone = '0877-7995-9192';
$whatsapp = '6287779959192';

$whatsappMessage = rawurlencode(
    'Halo Nusindo Wisata, saya ingin bertanya tentang paket wisata.'
);

$whatsappUrl = "https://wa.me/{$whatsapp}?text={$whatsappMessage}";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nusindo Wisata — Jelajahi Lebih Jauh</title>

    <meta
        name="description"
        content="Temukan paket wisata pilihan bersama Nusindo Wisata. Lihat destinasi, pilih tanggal, dan booking perjalanan Anda."
    >

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- =========================
         HEADER DAN NAVIGASI
    ========================== -->
    <header class="container">
        <nav class="nav">

            <!-- Logo -->
            <a class="brand" href="index.php">

                <img
                    class="brand-logo"
                    src="gambar/logofix.png"
                    alt="Logo Nusindo Wisata"
                    onerror="this.hidden=true; this.nextElementSibling.hidden=false;"
                >

                <span class="brand-mark" hidden>N</span>

                <span>
                    Nusindo
                    <span style="color: var(--green);">Wisata.</span>
                </span>

            </a>

            <!-- Menu navigasi -->
            <div class="navlinks">
                <a href="#paket">Paket Wisata</a>
                <a class="optional" href="#keunggulan">Keunggulan</a>
                <a href="#kontak">Kontak</a>
            </div>

            <a class="btn btn-primary" href="#paket">
                Jelajahi Paket <span>↗</span>
            </a>

        </nav>
    </header>


    <!-- =========================
         KONTEN UTAMA
    ========================== -->
    <main>

        <!-- HERO -->
        <section class="hero container">

            <div class="hero-panel">
                <div class="hero-copy">

                    <span class="eyebrow">
                        Perjalanan bermakna dimulai di sini
                    </span>

                    <h1>
                        Temukan cerita baru di setiap perjalanan.
                    </h1>

                    <p>
                        Liburan jadi lebih mudah bersama paket wisata pilihan,
                        itinerary jelas, dan tim yang siap membantu dari awal
                        sampai pulang.
                    </p>

                    <div class="hero-actions">

                        <a class="btn btn-primary" href="#paket">
                            Temukan Paket <span>→</span>
                        </a>

                        <a class="btn btn-light" href="why-nusindo.php">
                            Kenapa Nusindo?
                        </a>

                    </div>

                    <div class="trust-row">
                        <span>✦ Destinasi pilihan</span>
                        <span>✓ Booking praktis</span>
                        <span>♡ Layanan ramah</span>
                    </div>

                </div>
            </div>

        </section>


        <!-- =========================
             DAFTAR PAKET WISATA
        ========================== -->
        <section class="section container" id="paket">

            <div class="section-head">
                <div>

                    <div class="kicker">
                        Inspirasi perjalanan
                    </div>

                    <h2>
                        Destinasi favorit, pengalaman tak terlupakan.
                    </h2>

                    <p>
                        Pilih paket yang cocok dengan rencana liburanmu.
                    </p>

                </div>
            </div>


            <div class="cards">

                <?php foreach ($packages as $index => $package): ?>

                    <?php
                    $packageId = (int) $package['id'];
                    $destination = $package['destination'];

                    $image = $photos[$destination]
                        ?? 'gambar/bromo.jpg';
                    ?>

                    <article
                        class="card reveal"
                        style="transition-delay: <?= ($index % 3) * 70 ?>ms;"
                    >

                        <!-- Gambar paket -->
                        <a
                            href="package.php?id=<?= $packageId ?>"
                            aria-label="Lihat rincian <?= e($package['name']) ?>"
                        >

                            <div class="card-image">

                                <img
                                    src="<?= e($image) ?>"
                                    alt="Wisata <?= e($destination) ?>"
                                    loading="lazy"
                                >

                                <span class="duration">
                                    ◷ <?= e($package['duration']) ?>
                                </span>

                            </div>

                        </a>


                        <!-- Detail paket -->
                        <div class="card-body">

                            <div class="card-location">
                                ⌖ <?= e($destination) ?>
                            </div>

                            <h3>
                                <?= e($package['name']) ?>
                            </h3>

                            <p>
                                <?= e($package['description']) ?>
                            </p>


                            <!-- Harga -->
                            <div class="card-bottom">

                                <div class="price">
                                    <?= rupiah($package['price']) ?>

                                    <small>
                                        Estimasi / orang
                                    </small>
                                </div>

                            </div>


                            <!-- Tombol paket -->
                            <div class="card-actions">

                                <a
                                    class="btn btn-outline"
                                    href="package.php?id=<?= $packageId ?>"
                                >
                                    Rincian Paket <span>↗</span>
                                </a>

                                <a
                                    class="btn btn-primary"
                                    href="booking.php?package=<?= $packageId ?>"
                                >
                                    Booking
                                </a>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>


                <!-- Jika belum ada paket -->
                <?php if (empty($packages)): ?>

                    <p class="empty-packages">
                        Belum ada paket wisata yang tersedia.
                        Silakan kunjungi kembali nanti.
                    </p>

                <?php endif; ?>

            </div>

        </section>


        <!-- =========================
             KEUNGGULAN NUSINDO
        ========================== -->
        <section class="feature-band" id="keunggulan">

            <div class="container features">

                <div class="feature">

                    <div class="feature-icon">✦</div>

                    <div>
                        <strong>Destinasi pilihan</strong>

                        <span>
                            Rute dan pengalaman yang dirancang untukmu.
                        </span>
                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">◷</div>

                    <div>
                        <strong>Booking lebih praktis</strong>

                        <span>
                            Ajukan pemesanan langsung melalui website.
                        </span>
                    </div>

                </div>


                <div class="feature">

                    <div class="feature-icon">♡</div>

                    <div>
                        <strong>Dukungan tim</strong>

                        <span>
                            Tim kami siap membantu kebutuhan perjalanan.
                        </span>
                    </div>

                </div>

            </div>

        </section>

    </main>


    <!-- =========================
         FOOTER DAN KONTAK
    ========================== -->
    <footer class="footer" id="kontak">

        <div class="container footer-grid">

            <!-- Tentang Nusindo -->
            <div class="footer-about">

                <a
                    class="brand"
                    href="index.php"
                    style="color: white;"
                >

                    <img
                        class="brand-logo"
                        src="gambar/logofix.svg"
                        alt="Logo Nusindo Wisata"
                        onerror="this.hidden=true; this.nextElementSibling.hidden=false;"
                    >

                    <span class="brand-mark" hidden>N</span>

                    <span>Nusindo Wisata.</span>

                </a>

                <p>
                    Temukan perjalanan yang punya cerita.
                    Kami siap membantu merencanakan liburanmu.
                </p>

            </div>


            <!-- Informasi kontak -->
            <div class="footer-contact">

                <h3>Informasi Kontak</h3>

                <a href="mailto:<?= e($email) ?>">
                    ✉ <?= e($email) ?>
                </a>

                <a href="tel:+6287779959192">
                    ☎ <?= e($phone) ?>
                </a>

                <a
                    href="<?= e($whatsappUrl) ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <svg
                        class="whatsapp-icon"
                        viewBox="0 0 32 32"
                        aria-hidden="true"
                    >
                        <path
                            fill="currentColor"
                            d="M16 3.2A12.5 12.5 0 0 0 5.2 22l-1.7 6.1 6.3-1.6A12.5 12.5 0 1 0 16 3.2Zm0 22.7c-2 0-3.9-.5-5.6-1.5l-.4-.2-3.7 1 1-3.6-.2-.4A10.1 10.1 0 1 1 16 25.9Zm5.5-7.6c-.3-.2-1.8-.9-2.1-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8.2 8.2 0 0 1-2.5-1.5 9.3 9.3 0 0 1-1.7-2.1c-.2-.3 0-.5.1-.7l.5-.5c.2-.2.2-.4.3-.6s0-.4 0-.6-.7-1.7-1-2.3c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4s-1.2 1.2-1.2 2.8 1.2 3.2 1.4 3.4a12 12 0 0 0 4.6 4c.6.2 1.1.4 1.5.5.6.2 1.2.2 1.7.1.5-.1 1.8-.7 2.1-1.4s.3-1.3.2-1.4-.3-.3-.6-.5Z"
                        />
                    </svg>

                    WhatsApp Reservasi
                </a>

            </div>


            <!-- Tautan -->
            <div class="footer-links">

                <h3>Jelajahi</h3>

                <a href="#paket">Paket Wisata</a>

                <a href="why-nusindo.php">
                    Keunggulan Kami
                </a>

                <a href="booking.php">
                    Form Booking
                </a>

            </div>

        </div>


        <!-- Copyright -->
        <div class="container footer-bottom">

            <span>
                &copy; <?= date('Y') ?> Nusindo Wisata.
                Hak cipta dilindungi.
            </span>

            <span>
                Perjalanan nyaman, cerita berkesan.
            </span>

        </div>

    </footer>


    <!-- =========================
         TOMBOL WHATSAPP MELAYANG
    ========================== -->
    <a
        class="whatsapp-float"
        href="<?= e($whatsappUrl) ?>"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Hubungi Nusindo melalui WhatsApp"
    >

        <svg
            class="whatsapp-icon"
            viewBox="0 0 32 32"
            aria-hidden="true"
        >
            <path
                fill="currentColor"
                d="M16 3.2A12.5 12.5 0 0 0 5.2 22l-1.7 6.1 6.3-1.6A12.5 12.5 0 1 0 16 3.2Zm0 22.7c-2 0-3.9-.5-5.6-1.5l-.4-.2-3.7 1 1-3.6-.2-.4A10.1 10.1 0 1 1 16 25.9Zm5.5-7.6c-.3-.2-1.8-.9-2.1-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8.2 8.2 0 0 1-2.5-1.5 9.3 9.3 0 0 1-1.7-2.1c-.2-.3 0-.5.1-.7l.5-.5c.2-.2.2-.4.3-.6s0-.4 0-.6-.7-1.7-1-2.3c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4s-1.2 1.2-1.2 2.8 1.2 3.2 1.4 3.4a12 12 0 0 0 4.6 4c.6.2 1.1.4 1.5.5.6.2 1.2.2 1.7.1.5-.1 1.8-.7 2.1-1.4s.3-1.3.2-1.4-.3-.3-.6-.5Z"
            />
        </svg>

        <span>Chat WhatsApp</span>

    </a>


    <!-- JavaScript -->
    <script src="assets/js/app.js"></script>

</body>
</html>
