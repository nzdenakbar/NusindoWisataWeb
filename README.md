# Nusindo Wisata — Website Booking + Admin

Website PHP + MySQL untuk katalog paket, formulir booking pelanggan, dan dashboard admin.

## Kebutuhan
- PHP 8.0+ (extension `mysqli` aktif)
- MySQL/MariaDB
- XAMPP/Laragon untuk menjalankan secara lokal

## Instalasi lokal (XAMPP)
1. Ekstrak folder `nusindo-wisata` ke `C:\xampp\htdocs\nusindo-wisata`.
2. Jalankan Apache dan MySQL dari XAMPP.
3. Buka `http://localhost/phpmyadmin`, pilih tab **Import**, lalu impor `database.sql`.
4. Periksa `config/database.php`. Konfigurasi XAMPP umumnya `localhost`, user `root`, password kosong.
5. Buka `http://localhost/nusindo-wisata/admin/setup.php` dan buat akun admin dengan password minimal 12 karakter.
6. **Segera hapus `admin/setup.php` dari folder setelah akun dibuat.** Jangan biarkan file setup di server produksi.
7. Website: `http://localhost/nusindo-wisata/`
8. Login admin: `http://localhost/nusindo-wisata/admin/login.php`

## Fitur
- Katalog paket aktif dari database dan halaman detail paket.
- Form booking menyimpan data ke MySQL, membuat kode booking, menghitung estimasi total, dan memvalidasi data di sisi server.
- Admin login memakai password hash, dashboard statistik, pengubahan status booking/pembayaran, dan pengelolaan harga serta visibilitas paket.
- Tampilan responsif, animasi reveal, hover, dan formulir dinamis.

## Catatan penting sebelum online
- Harga awal di `database.sql` adalah contoh estimasi, silakan ganti dengan harga resmi melalui dashboard admin.
- Foto hero pada desain baru memakai gambar Unsplash dari internet; pastikan hak penggunaan dan koneksi internet sesuai kebutuhan. Folder gambar lokal dari website lama tidak termasuk dalam file unggahan, sehingga itinerary lama disertakan di folder `legacy` dan aset gambar lokalnya mungkin perlu disalin sendiri ke folder `gambar`.
- Booking baru berstatus **Menunggu** dan bukan pembayaran/konfirmasi otomatis. Admin perlu memverifikasi ketersediaan, harga akhir, serta pembayaran.
- Untuk produksi gunakan HTTPS, backup database, kredensial MySQL terpisah dengan hak minimum, pembatasan percobaan login, serta review keamanan tambahan.


## Catatan aset dan kontak

Folder `gambar/` kini disertakan dengan logo lokal dan ilustrasi fallback lokal agar gambar tidak bergantung pada koneksi internet. File foto asli dari folder `gambar` milik Anda tidak ikut terunggah bersama HTML sebelumnya; jika Anda punya foto asli, salin ke folder `gambar/` dengan nama file yang sama untuk menggantikan ilustrasi.

Kontak yang diambil dari halaman rincian paket: `nusindowisata@gmail.com`, `0877-7995-9192`, WhatsApp `https://wa.me/6287779959192`.


## Perbaikan navigasi dan booking
- Tombol “Kenapa Nusindo?” membuka `why-nusindo.php`, yang berisi penjelasan layanan, bagian ulasan, dan tombol kembali. Ulasan di halaman tersebut adalah contoh format; ganti dengan testimoni pelanggan asli sebelum dipublikasikan.
- Tombol “Pesan Sekarang” pada halaman itinerary lama kini menuju `booking.php?package=ID` sehingga paket langsung terpilih.
- Tombol kembali pada halaman itinerary lama diarahkan ke `../index.php#paket`.
- Logo memiliki fallback huruf N jika file SVG gagal dimuat.
