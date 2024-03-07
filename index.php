<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-navajo white" style="background-color: #DCDCDC">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">ANDHYRA</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-gainsboro" style="background-color: #C0C0C0"" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading" style="color: #00FFFF">Core</div>
                        <a class="nav-link"style="color: #ffff" href="?">
                            <div class="sb-nav-link-icon"style="color: #00ffff"><i class="fas fa-tachometer-alt"></i></div>
                            <h5>Dashboard</h5>
                        </a>
                        <div class="sb-sidenav-menu-heading"style="color: #00ffff"><h5>Navigasi</h5></div>
                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {
                        ?>
                            <a class="nav-link" href="?page=kategori"style="color: #ffff"> 
                                <div class="sb-nav-link-icon"><i class="fas fa-table"style="color: #00ffff"></i></div>
                                <h5>Kategori Buku</h5>
                            </a>

                            <a class="nav-link" href="?page=buku"style="color: #ffff">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"style="color: #00ffff"></i></div>
                                <h5>Buku</h5>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" href="?page=peminjaman"style="color: #ffff">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"style="color: #00ffff"></i></div>
                                <h5>Peminjaman</h5>
                            </a>
                        <?php
                        }
                        ?>
                        <a class="nav-link" href="?page=ulasan"style="color: #ffff">
                            <div class="sb-nav-link-icon"><i class="fas fa-comment"style="color: #00ffff"></i></div>
                            <h5>Ulasan</h5>
                        </a>

                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {
                        ?>
                            <a class="nav-link" href="?page=laporan"style="color: #ffff">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"style="color: #00ffff"></i></div>
                                <h5>Laporan Peminjaman</h5>
                            </a>
                            <?php if($_SESSION['user']['level'] == 'admin') : ?>
                            <a class="nav-link" href="admin_register.php"style="color: #ffff">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"style="color: #00ffff"></i></div>
                                <h5>Registrasi Admin</h5>
                            </a>
                            <?php endif; ?>
                        <?php
                        }
                        ?>
                        <?php
                        if($_SESSION['user']['level'] == 'peminjam'){
                            ?>
                        <a class="nav-link" href="?page=koleksi_pribadi"style="color: #ffff">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"style="color: #00ffff"></i></div>
                            <h5>Koleksi Pribadi</h5>
                        </a>
                        <?php
                        }
                        ?>
                        <a class="nav-link" href="logout.php"style="color: #ffff">
                            <div class="sb-nav-link-icon"><i class="fas fa-power-off"style="color: #00ffff"></i></div>
                            <h5>Logout</h5>
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['user']['nama_lengkap']; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <?php

                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                    if (file_exists($page . '.php')) {
                        include $page . '.php';
                    } else {
                        include '404.php';
                    }
                    ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>