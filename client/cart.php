<?php

session_start () ;
if (!isset ($_SESSION ['cart'])) {
    $_SESSION ['cart'] = [] ;
}
// Them vao gio hang
if (isset ($_POST ['addcart'])) {
    $id = $_POST ['id'] ;
    $name = $_POST ['name'] ;
    $thumbnail = $_POST ['thumbnail'] ;
    $price = $_POST ['price'] ;
    $sale_price = $_POST ['sale_price'] ; 
    $qty = 1 ;
    $product = [
        'id' => $id ,
        'name' => $name ,
        'thumbnail' => $thumbnail ,
        'price' => $price ,
        'sale_price' => $sale_price ,
        'qty' => $qty 
    ] ;
    $found = false ;
    if (isset ($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                $_SESSION['cart']["$id"]['qty']++ ;
                $found = true ; 
                break ;
            }
        }
}
if (!$found) {
    $_SESSION['cart']["$id"] = $product ;
}
header ('location: cart.php') ;
}
// xoa gio hang
if (isset($_SESSION['cart'])) {
    if (isset($_POST['removecart'])) {
        $id = $_POST['removecart'] ;
        
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                unset($_SESSION['cart']["$id"]) ;
                header('Location: cart.php') ;
                break ;
            }
        }
    }
}
// chinh sua
if (isset($_SESSION['cart'])) {
    if (isset($_POST['editcart'])) {
        $id = $_POST['id'] ;
        $qtyedit = $_POST['editqty'] ;
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                $_SESSION['cart']["$id"]['qty'] = $qtyedit ;
                header('Location: cart.php') ;
                break ;
            }
        }
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
    <link rel="stylesheet" href="/client/css/font-awesome.min.css">
    <link rel="stylesheet" href="/client/css/themify-icons.css">
    <link rel="stylesheet" href="/client/css/nice-select.css">
    <link rel="stylesheet" href="/client/css/nouislider.min.css">
    <link rel="stylesheet" href="/client/css/bootstrap.css">
    <link rel="stylesheet" href="/client/css/main.css">
</head>

<body>

    <!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">trang chủ</a></li>
							<li class="nav-item submenu dropdown active">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">cửa hàng</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/client/category.php">Danh mục cửa hàng</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/single-product.php">chi tiết sản phẩm</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/checkout.php">thanh toán sản phẩm</a></li>
									<li class="nav-item active"><a class="nav-link" href="/client/cart.php">giỏ hàng</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/confirmation.php">xác nhận </a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Tin tức</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/client/blog.php">Tin tức</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/single-blog.php">chi tiết tin tức</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">trang</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/client/login.php">đăng nhập</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/tracking.php">theo dõi</a></li>
									
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="/client/contact.php">Liên hệ</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="/client/cart.php" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Giỏ hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/client/category.php">giỏ hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <div class="container px-3 my-5 clearfix">
  <div class="card">
    <div class="card-header bg-primary text-light">
      <h2>Giỏ hàng</h2>
    </div>
    <div class="card-body">
      <form action="cart.php" method="post">
        <div class="table-responsive">
          <table class="table table-bordered m-0">
            <thead>
              <tr>
                <th class="text-left py-3 px-4" style="min-width: 400px;">Thông tin chi tiết sản phẩm</th>
                <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
                <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
              </tr>
            </thead>
            <tbody>
              <?if (isset ($_SESSION['cart'])) : ?>
                <?php
                  $total_product = 0 ;
                  $total_bill = 0 ;
                ?>
                <?php foreach ($_SESSION['cart'] as $item) : ?>
                  <?php
                    $total_product = ($item['sale_price'] * $item['qty']) ;
                    $total_bill += $total_product ;
                  ?>
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="../admin/<?= $item['thumbnail'] ?>" width="50" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark text-decoration-none"><?= $item['name'] ?></a>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?= $item['sale_price'] ?></td>
                    <td class="text-right font-weight-semibold align-middle p-4"><input name="editqty" type="text" class="form-control text-center" value="<?= $item['qty'] ?>"></td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?= number_format ($total_product , 0 , "," , ".") ?? '' ?></td>
                    <td class="text-center align-middle px-0"><button type=submit name="removecart" value="<?= $item['id'] ?>" class="shop-tooltip close float-none text-light btn btn-danger">x</button></td>
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                  </tr>
                  <?php endforeach ; ?>
                  <?php endif ; ?>
            </tbody>
          </table>
        </div>

        <div class="d-flex flex-wrap justify-content-end align-items-center pb-4">
          <div class="d-flex gap-4">
            <div class="text-right mt-4 mr-5">
              <label class="text-muted font-weight-normal">Giảm giá</label>
              <div class="text-large"><strong>20%</strong></div>
            </div>
            <div class="text-right mt-4">
              <label class="text-muted font-weight-normal">Tổng</label>
              <div class="text-large"><strong><?= isset ($total_bill) ? (number_format ($total_bill , 0 , "," , ".")) : "" ?></strong></div>
            </div>
          </div>
        </div>

        <div class="float-right">
          <a href="/client/category.php" class="text-decoration-none text-dark">Quay lại</a>
          <a href="/client/checkout.php" class="btn btn-lg btn-success mt-2 float-end">Thanh toán</a>
          <button type="submit" name="editcart" class="btn btn-lg btn-primary mt-2 mx-2 float-end">Cập nhập</button>
        </div>
      </form>
    </div>
  </div>
</div>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Về chúng tôi</h6>
                        <p>
                            Địa chỉ: Hẻm 379 , đường Trần Quang Diệu, quận Bình Thủy, TP.Cần Thơ.
                            Hotline: 0359235876. <br>
                            EMAIL: luongvhpc05477@fpt.edu.vn
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Dịch vụ khách hàng</h6>
                        <p>Thanh Toán <br>
                            Vận chuyển và giao hàng <br>
                            Trả lại <br>
                            Ủng hộ </p>
                        <div class="" id="mc_embed_signup">

                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                    <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Email '" required="" type="email">


                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                            type="text">
                                    </div>

                                    <!-- <div class="col-lg-4 col-md-4">
                                                    <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                                </div>  -->
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="img/i1.jpg" alt=""></li>
                            <li><img src="img/i2.jpg" alt=""></li>
                            <li><img src="img/i3.jpg" alt=""></li>
                            <li><img src="img/i4.jpg" alt=""></li>
                            <li><img src="img/i5.jpg" alt=""></li>
                            <li><img src="img/i6.jpg" alt=""></li>
                            <li><img src="img/i7.jpg" alt=""></li>
                            <li><img src="img/i8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Theo dõi chúng tôi</h6>
                        <p>Các trang mạng xã hội</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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