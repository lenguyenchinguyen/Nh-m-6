<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="/client/img/logo.jpg" style="width:100px ;height:100px"  alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="/client/homepage.php">Trang chủ</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Cửa hàng</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/client/category.php">danh mục cửa hàng</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/single-product.php">chi tiết sản phẩm</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/checkout.php">Thanh toán sản phẩm</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/cart.php">Giỏ hàng</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/confirmation.php">Xác nhận </a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">TIN TỨC</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/client/blog.php">Tin tức</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/single-blog.php">Tin tức chi tiết</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Trang</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/client/login.php">Đăng nhập</a></li>
									<li class="nav-item"><a class="nav-link" href="/client/tracking.php">Theo dõi</a></li>
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
					<input type="text" class="form-control" id="search_input" placeholder="Search here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>