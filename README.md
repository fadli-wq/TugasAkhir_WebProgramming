# RADIFF APP MENGGUNAKAN CODEIGNITER 4

## Apa itu RADIFF APP ?

RADIFF APP adalah sebuah aplikasi web yang memiliki fitur untuk meminjam ruangan, mengecek jadwal ruangan, mencari barang hilang, serta kritik dan saran dalam lingkup fakultas ilmu komputer di universitas pembangunan nasional veteran jakarta.

## Fitur

- **Peminjaman Ruangan**: Memungkinkan pengguna untuk memesan ruangan untuk berbagai keperluan akademik dan non-akademik dalam lingkup fakultas ilmu komputer di universitas pembangunan nasional veteran jakarta.
- **Pengecekan Jadwal**: Pengguna juga dapat mengecek jadwal mereka setelah mereka meminjam ruangan ataupun sebelum mereka meminjam dalam lingkup fakultas ilmu komputer di universitas pembangunan nasional veteran jakarta.
- **Pencarian Barang Hilang**: Fitur untuk melaporkan dan mencari barang yang hilang dalam lingkup fakultas ilmu komputer di universitas pembangunan nasional veteran jakarta.
- **Kritik dan Saran**: Pengguna dapat memberi kritik dan saran kepada fasilitas dalam lingkup fakultas ilmu komputer di universitas pembangunan nasional veteran jakarta.

## Tentang Pengembang

Nama RADIFF APP merupakan singkatan dari nama para pengembangnya:
- Rendy [@RendyEkaHernawan](https://github.com/RendyEkaHernawan)
- Riani [@rianip1105](https://github.com/rianip1105)
- Aura [@carissaura](https://github.com/carissaura)
- Dito [@dittoheone](https://github.com/dittoheone)
- Fadhli [@fadli-wq](https://github.com/fadli-wq)

## Teknologi yang Digunakan

- **Framework**: CodeIgniter 4, Bootstrap 5
- **Bahasa Pemrograman**: PHP, HTML, CSS, JavaScript
- **Library**: jQuery
- **Database**: MySQL
- **Versi Control**: Git

## Penggunaan

### Peminjaman Ruangan

1. Login menggunakan akun upnvj.
2. Masuk ke halaman peminjaman ruangan.
3. Isi formulir peminjaman dan klik "Submit".
4. Pengajuan berhasil.

### Pengecekan Jadwal Ruangan
1. Login menggunakan akun upnvj.
2. Masuk ke halaman jadwal peminjaman.
3. Pilih ruangan yang ingin dicari serta periode peminjamannya.
4. Lihat daftar jadwal peminjaman ruangan.

### Pencarian Barang Hilang
1. Login menggunakan akun upnvj.
2. Masuk ke halaman pencarian barang hilang.
3. Lihat daftar barang yang hilang atau laporkan barang baru yang hilang.

## Kontribusi

Kami menyambut baik kontribusi dari siapa pun. Silakan ikuti langkah-langkah berikut untuk berkontribusi:

1. Fork repositori ini.
2. Buat branch fitur baru:
   ```bash
    git branch nama-fitur
    ```
4. Ganti branch:
    ```bash
    git checkout nama-fitur
    ```
5. Tambahkan perubahan anda:
   ```bash
    git add .
    ```
7. Commit perubahan Anda:
    ```bash
    git commit -m 'Menambahkan fitur x'
    ```
8. Push ke branch:
    ```bash
    git push -u origin nama-fitur
    ```
9. Buat Pull Request di GitHub.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

## Setup

Salin `env` ke `.env` dan sesuaikan untuk aplikasi Anda, khususnya baseURL
dan pengaturan database apa pun.


## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> The end of life date for PHP 7.4 was November 28, 2022.
> The end of life date for PHP 8.0 was November 26, 2023.
> If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> The end of life date for PHP 8.1 will be November 25, 2024.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
