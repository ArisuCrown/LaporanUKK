<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="img" style="background-image: url(21/images/bgs.jpg);background-size: 1920px 960px;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Register Admin Perpustakaan Digital</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['register'])) {
                                        $nama_lengkap = $_POST['nama_lengkap'];
                                        $email = $_POST['email'];
                                        $alamat = $_POST['alamat'];
                                        $username = $_POST['username'];
                                        $level = $_POST['level'];
                                        $password = $_POST['password'];

                                    
                                            $insert = mysqli_query($koneksi, "INSERT INTO user(nama_lengkap,email,alamat,username,password,level) VALUES('$nama_lengkap','$email','$alamat','$username','$password','$level')");

                                            if ($insert) {
                                                echo '<script>alert("Selamat register berhasil. Silahkan Login"); location.href="login.php"</script>';
                                            } else {
                                                echo '<script>alert("Register gagal, silahkan register ulang");</script>';
                                            }
                                        }        
                                    ?>
                                    
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" required name="nama_lengkap" placeholder="Masukan Nama Lengkap" />
                                            <label class="small mb-1">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" type="text" required name="email" placeholder="Masukan Email" />
                                            <label class="small mb-1">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea name="alamat" rows="5" required class="form-control"></textarea>
                                            <label class="small mb-1">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputusername" required type="username" name="username" placeholder="Masukan Username" />
                                            <label class="small mb-1">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" required type="password" name="password" placeholder="Masukan Password" />
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="level" class="form-control">
                                                <option value="petugas">petugas</option>
                                                <option value="peminjam">peminjam</option>
                                            </select>
                                            <label for="small mb-1">Level</label>
                                        </div>


                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="register" value="register" href="index.html">Register</button>
                                            <a class="btn btn-danger" href="index.php">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        &copy; Andhyra
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
