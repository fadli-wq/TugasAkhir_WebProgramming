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
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
            position: relative;
            overflow: hidden;
        }
        
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(21, 50, 193, 0.3);
            pointer-events: none;
            z-index: 1;
        }
        
        .container {
            display: flex;
            width: 100%;
            height: 100vh;
            z-index: 2;
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
        
        .hamburger {
            display: none;
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 3;
            cursor: pointer;
            font-size: 24px;
            color: #ecf0f1;
        }
        
        @media (max-width: 768px) {
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
    <div class="overlay"></div>
    <div class="container">
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
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </div>
    <script>
        const backgrounds = [
            'url(https://leads.upnvj.ac.id/pluginfile.php/32/block_cocoon_slider_6/slides/3/Slider_3.jpg)',
            'url(https://leads.upnvj.ac.id/pluginfile.php/32/block_cocoon_slider_6/slides/1/Slider_1.jpg)',
            'url(https://leads.upnvj.ac.id/pluginfile.php/32/block_cocoon_slider_6/slides/2/Slider_2.jpg)',
            'url(https://leads.upnvj.ac.id/pluginfile.php/32/block_cocoon_slider_6/slides/4/Slider_4.jpg)'
        ];

        let currentIndex = 0;

        function changeBackground() {
            document.querySelector('body').style.backgroundImage = backgrounds[currentIndex];
            currentIndex = (currentIndex + 1) % backgrounds.length;
        }

        setInterval(changeBackground, 7000);

        changeBackground();

        const sidebar = document.getElementById('sidebar');
        const hamburger = document.getElementById('hamburger');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>
