<?php
include "koneksi.php";


?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="21/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(21/images/bgs.jpg);">
	<section class="ftco-section">
    <div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Perpustakaan Digital</h2>
				</div>
			</div>
	
            <div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
                                        <?php
                                         if(isset($_POST['login'])){
                                            $username = $_POST['username'];
                                            $password = $_POST['password'];
                                            $data = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");
                                            $cek  = mysqli_num_rows($data);
                                            if($cek>0){
                                                $_SESSION['user'] = mysqli_fetch_array($data);
                                                echo '<script>alert("Selamat datang,Login Berhasil"); location.href="index.php";</script>';
                                            }else{

                                                echo '<script>alert("Maaf,username/password salah")</script>';
                                            }
                                         }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputusername" type="username" name="username" placeholder="enter username" />
                                                <label for="inputusername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                
                                                <input class="form-control" id="inputPassword" name="password" type="password"  placeholder="Enter password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                                <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                                                <a class="btn btn-success" href="register.php">Register</a>
                                            </div>
                                        </form>
                                    </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="21/js/"></script>
  <script src="21/js/popper.js"></script>
  <script src="21/js/bootstrap.min.js"></script>
  <script src="21/js/main.js"></script>

	</body>
</html>

