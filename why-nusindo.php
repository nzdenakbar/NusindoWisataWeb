<?php require __DIR__ . '/config/database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenapa Nusindo Wisata? — Nusindo Wisata</title>
    <meta name="description" content="Kenali layanan Nusindo Wisata, proses booking, dan pengalaman perjalanan yang kami prioritaskan.">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="container">
    <nav class="nav">
        <a class="brand" href="index.php">
            <img class="brand-logo" src="gambar/logofix.svg" alt="Logo Nusindo Wisata" onerror="this.hidden=true;this.nextElementSibling.hidden=false">
            <span class="brand-mark" hidden>N</span>
            <span>Nusindo <span style="color:var(--green)">Wisata.</span></span>
        </a>
        <div class="navlinks"><a href="index.php#paket">Paket Wisata</a><a href="index.php#kontak">Kontak</a></div>
        <a class="btn btn-primary" href="index.php#paket">Lihat Paket ↗</a>
    </nav>
</header>
<main class="container why-page">
    <section class="why-hero">
        <span class="eyebrow">Kenali Nusindo Wisata</span>
        <h1>Perjalanan nyaman, cerita berkesan.</h1>
        <p>Kami membantu kamu merencanakan perjalanan dengan informasi paket yang jelas dan proses pemesanan yang praktis. Pilih destinasi, kirim detail perjalanan, lalu tim kami akan meninjau permintaan dan mengonfirmasi ketersediaan serta harga akhir.</p>
        <div class="why-actions"><a class="btn btn-primary" href="index.php#paket">Pilih Paket Wisata ↗</a><a class="btn btn-outline" href="index.php">← Kembali ke Beranda</a></div>
    </section>
    <section class="why-benefits" aria-label="Keunggulan Nusindo Wisata">
        <article class="why-card"><span class="why-number">01</span><h2>Informasi paket jelas</h2><p>Durasi, destinasi, deskripsi, dan estimasi harga tersedia agar kamu bisa membandingkan pilihan sebelum memesan.</p></article>
        <article class="why-card"><span class="why-number">02</span><h2>Pemesanan praktis</h2><p>Mulai booking dari tombol pada paket pilihan. Nama paket akan terpilih otomatis, jadi kamu tinggal mengisi data diri dan rencana keberangkatan.</p></article>
        <article class="why-card"><span class="why-number">03</span><h2>Konfirmasi oleh tim</h2><p>Permintaan masuk ke sistem untuk ditinjau. Tim admin akan menghubungi kamu untuk memastikan ketersediaan dan detail akhir sebelum pembayaran.</p></article>
    </section>
    <section class="reviews-section" id="ulasan">
        <div class="section-head"><div><div class="kicker">Ulasan pelanggan</div><h2>Setiap perjalanan dimulai dari kepercayaan.</h2><p>Bagian ulasan siap diisi dengan testimoni asli pelanggan Nusindo Wisata.</p></div></div>
        <div class="review-grid">
            <article class="review-card"><div class="review-stars" aria-label="Ulasan pelanggan">★★★★★</div><p>“untuk pelayanan bagus banget terutama untuk pak jack orangnya ramah dan baik”</p><span class="review-name"></span><small>Asvin</small></article>
            <article class="review-card"><div class="review-stars" aria-label="Ulasan pelanggan">★★★★★</div><p>“keren sih untuk perjalanannya asik dan destinasi wisatanya juga oke banget josjis pool pokoke”</p><span class="review-name"></span><small>Akbar</small></article>
            <article class="review-card"><div class="review-stars" aria-label="Ulasan pelanggan">★★★★★</div><p>“pelayanannya ramah harga juga oke kalau mau jalan jalan bareng keluarga nusindo ini rekomen banget buat kalian”</p><span class="review-name"></span><small>Putri</small></article>
        </div>
    </section>
    <div class="why-back-row"><a class="btn btn-outline" href="index.php">← Kembali ke Beranda</a><a class="btn btn-primary" href="index.php#paket">Pesan Paket Sekarang ↗</a></div>
</main>
<footer class="footer" id="kontak"><div class="container footer-grid"><div class="footer-about"><a class="brand" href="index.php" style="color:white"><img class="brand-logo" src="gambar/logofix.svg" alt="Logo Nusindo Wisata" onerror="this.hidden=true;this.nextElementSibling.hidden=false"><span class="brand-mark" hidden>N</span><span>Nusindo Wisata.</span></a><p>Temukan perjalanan yang punya cerita. Kami siap membantu merencanakan liburanmu.</p></div><div class="footer-contact"><h3>Informasi Kontak</h3><a href="mailto:nusindowisata@gmail.com">✉ nusindowisata@gmail.com</a><a href="tel:+6287779959192">☎ 0877-7995-9192</a><a href="https://wa.me/6287779959192" target="_blank" rel="noopener noreferrer">WhatsApp Reservasi</a></div><div class="footer-links"><h3>Jelajahi</h3><a href="index.php#paket">Paket Wisata</a><a href="index.php#keunggulan">Keunggulan Kami</a><a href="booking.php">Form Booking</a></div></div><div class="container footer-bottom"><span>&copy; <?= date('Y') ?> Nusindo Wisata. Hak cipta dilindungi.</span><span>Perjalanan nyaman, cerita berkesan.</span></div></footer>
<script src="assets/js/app.js"></script>
</body>
</html>
