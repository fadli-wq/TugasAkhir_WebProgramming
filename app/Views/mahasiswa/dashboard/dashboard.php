<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            background-color: white; /* Background putih polos */
            position: relative;
            overflow: hidden;
        }
        
        .container {
            display: flex;
            width: calc(100% - 250px); /* Mengurangi lebar sidebar */
            height: 100%;
            z-index: 2;
            flex-direction: column;
            align-items: flex-start; /* Tempatkan elemen di bagian atas */
            justify-content: flex-start; /* Tempatkan elemen di bagian atas */
            position: relative;
            margin-left: 250px; /* Menambahkan margin kiri untuk container */
            margin-top: 30px;
        }

        .Dash {
            margin-left: 40px;
        }
        
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 3;
        }
        
        .sidebar.active {
            transform: translateX(0);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .nav-menu {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        
        .nav-menu a {
            padding: 15px 20px;
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 7px;
        }
        
        .nav-menu a:hover {
            background-color: #34495e;
        }
        
        .cards {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            width: 100%;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .card {
            background-color: #ecf0f1;
            border-radius: 10px;
            width: 30%;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card i {
            font-size: 3em;
            margin-bottom: 10px;
        }

        .card h3 {
            margin: 0;
            padding: 0;
            font-size: 1.5em;
            color: #34495e;
        }

        .card p {
            font-size: 1em;
            color: #7f8c8d;
        }

        .card a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
        
        .hamburger {
            display: none;
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 4;
            cursor: pointer;
            font-size: 24px;
            color: #ecf0f1;
        }
        
        @media (max-width: 768px) {
            .container {
                margin-left: 0; /* Hilangkan margin kiri pada layar kecil */
                width: 100%; /* Ubah lebar menjadi 100% */
            }
            
            .cards {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 80%;
                margin-bottom: 20px;
            }
            
            .hamburger {
                display: block;
                background-color: #333;
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 5px;
                text-align: center;
                line-height: 40px;
                transition: background-color 0.3s ease;
            }

            .hamburger:hover {
                background-color: #555;
            }

            .hamburger i {
                color: #ecf0f1;
                font-size: 24px;
            }
        }
        
        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="hamburger" id="hamburger">
        <i class="fas fa-bars"></i>
    </div>
    <aside class="sidebar" id="sidebar">
        <div class="logo">
            <img src="<?= base_url('img/logo upnvj.png') ?>" width="120" height="120">
            <p><b>UPNVJ</b></p>
        </div>
        <nav class="nav-menu">
            <a href="<?= base_url('mahasiswa/pinjam_ruang') ?>"><i class="fas fa-house"></i><b>Peminjaman Ruang</b></a><br>
            <a href="<?= base_url('mahasiswa/jadwal_ruang') ?>"><i class="fa-solid fa-clipboard-list"></i><b>Jadwal Peminjaman</b></a><br>
            <a href="<?= base_url('mahasiswa/barang_hilang') ?>"><i class="fas fa-search"></i><b>Barang Hilang</b></a><br>
            <a href="<?= base_url('mahasiswa/kritik_saran') ?>"><i class="fas fa-comments"></i><b>Kritik dan Saran</b></a><br>
            <a href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt"></i><b>Logout</b></a>
        </nav>
    </aside>
    <div class="container">
        <div class="Dash">
        <h1>Dashboard</h1>
        </div>
        <div class="cards">
            <div class="card">
                <i class="fa-solid fa-clipboard-list"></i>
                <h3>Cek Status Peminjaman</h3>
                <p>Monitor status peminjaman ruangan secara real-time.</p>
                <a href="<?= base_url('mahasiswa/lihat_status_pinjam2') ?>">Lebih Lanjut</a>
            </div>
            <div class="card">
                <i class="fas fa-search"></i>
                <h3>Laporkan Barang Hilang</h3>
                <p>Laporkan barang yang hilang atau ditemukan.</p>
                <a href="<?= base_url('mahasiswa/barang_hilang') ?>">Lebih Lanjut</a>
            </div>
            <div class="card">
                <i class="fas fa-comments"></i>
                <h3>Kritik dan Saran</h3>
                <p>Sampaikan kritik dan saran untuk perbaikan ruangan.</p>
                <a href="<?= base_url('mahasiswa/kritik_saran') ?>">Lebih Lanjut</a>
            </div>
        </div>
    </div>
    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');

        hamburger.addEventListener('click', function () {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>
