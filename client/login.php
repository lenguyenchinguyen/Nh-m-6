<?php
include_once 'config/database.php';

if(!$connection){
	die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
}
global $connection;
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// Kiểm tra xem tài khoản đã tồn tại trong cơ sở dữ liệu chưa
		$query = "SELECT * FROM taikhoan WHERE user = '$username' AND pass = '$password' ";
		$result = mysqli_query($connection, $query);
		if ($result  && mysqli_num_rows($result) == 1) {
			// Đăng nhập thành công
			// echo "Đăng nhập thành công!";
			while ($data = mysqli_fetch_assoc ($result)) {
				$_SESSION ['nguoiDung_id'] = $data ['id'] ;
			}
			// header('Location: /admin/index.php');
		} else {
			// đăng nhập thất bại
			echo "Tên đăng nhập hoặc mật khẩu không đúng!";
		}
	}
?>


<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>VHL STORE</title>

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="/client/css/linearicons.css">
	<link rel="stylesheet" href="/client/css/owl.carousel.css">
	<link rel="stylesheet" href="/client/css/themify-icons.css">
	<link rel="stylesheet" href="/client/css/font-awesome.min.css">
	<link rel="stylesheet" href="/client/css/nice-select.css">
	<link rel="stylesheet" href="/client/css/nouislider.min.css">
	<link rel="stylesheet" href="/client/css/bootstrap.css">
	<link rel="stylesheet" href="/client/css/main.css">
</head>	
<body>
	<!-- Start Header Area -->
    <?php 
        include "header.php";
    ?>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Đăng nhập/ Đăng ký</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?pages=login">Đăng nhập/ Đăng ký</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="client/img/login.jpg" alt="">
						<div class="hover">
							<h4>Nếu bạn là khách hàng mới hãy tạo tài khoản ngay?</h4>

							<a class="primary-btn" href="index.php?pages=dangky">Tạo tài khoản </a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng nhập</h3>
						<form class="row login_form" action="" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" required id="name" name="username" placeholder="Nhập Họ Tên" >
							</div>
							<!-- <div class="col-md-12 form-group">
								<input type="email" class="form-control" required id="name" name="email" placeholder="Nhập Email" placeholder = 'Email'>
							</div> -->
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" required id="name" name="password" placeholder="Nhập Password" >
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Luôn Đăng Nhập</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="login" class="primary-btn">Đăng nhập</button>
								<a href="#">Quên mật khẩu?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</script>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
    <?php
        include "footer.php"
    ?>
</p>
            </div>
        </div>
    </footer>
	<!-- End footer Area -->


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>