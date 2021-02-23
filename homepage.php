<?php session_start() ?>

<!DOCTYPE html>
<html lang="ind">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
</head>
<body>

    <!-- Awal Navbar -->
    <div class="navbar">
        <img src="img/WarungIn.png" alt="">
        <ul class="nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#product">Product</a></li>
            <li>Contact Us</li>
            <li>WarungKu</li>
        </ul>
        <div class="user">
            <span><a class="a" href="logout.php">Logout</a></span>
        </div>
        <span class="check">
            <div class="hamburger"></div>
        </span>
    </div>
    <!-- Akhir Navbar -->
    
    <div class="container">
        <div class="jumbotron" id="home">
            <div class="jumboText">
                <h1>WarungIn</h1>
                <p>Pengen nyetok warung jadi lebih praktis dan terorganisir ?<br>
                    Males keluar Rumah untuk belanja stok di warung ?
                </p>
                <div class="continue">
                    <p>Coba WarungIn Aja Dengan</p>
                    <span class="sosmed"><img src="img/google.png" alt=""> With Google</span>
                    <span class="garus">|</span>
                    <span class="sosmed fb"><img src="img/fb.png" alt=""> With Facebook</span>
                </div>
            </div>
            <div class="img">
                <img src="img/jumbotron.png" alt="">
                <img class="jumbo2" src="img/jumbotron2.png" alt="">
            </div>
        </div>
        <div class="searchBox" id="product">
            <input class="searchInput" type="text" placeholder="Search">
            <span class="search">Lokasi</span>
            <span class="search">Radius</span>
        </div>
        <div class="product">
            <div class="prod">
                <h1>Best Seller</h1>
                <span>Lihat Semua</span>
                <div class="slider"><img src="img/slider.png" alt=""></div>
                <div class="items">
                    <div class="item"><img src="img/images (31).jpeg" alt=""><p>Indomie Goreng</p><span>Warung Mang Sholeh <br>Jl. Kebon Jeruk</span></div>
                    <div class="item"><img src="img/images (31).jpeg" alt=""><p>Indomie Goreng</p><span>Warung Mang Sholeh <br>Jl. Kebon Jeruk</span></div>
                    <div class="item"><img src="img/images (31).jpeg" alt=""><p>Indomie Goreng</p><span>Warung Mang Sholeh <br>Jl. Kebon Jeruk</span></div>
                    <div class="item"><img src="img/images (31).jpeg" alt=""><p>Indomie Goreng</p><span>Warung Mang Sholeh <br>Jl. Kebon Jeruk</span></div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <img src="img/WarungIn.png" alt="">
        <ul>
            <li><a href="">Kerja Sama</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>
    </footer>

    <script src="script.js"></script>
</body>
</html>
