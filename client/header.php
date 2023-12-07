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
							<li class="nav-item active"><a class="nav-link" href="index.php?pages=homepage">Trang chủ</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php?pages=category">Sản phẩm</a></li>						
							<li class="nav-item"><a class="nav-link" href="index.php?pages=blog">Tin tức</a></li>
							<li class="nav-item"><a class="nav-link" href="index.php?pages=contact">Liên hệ</a></li>
							
							

							<?
								if (isset ($_SESSION ['nguoiDung_id'])) {
									?>
										<li class="nav-item"><a class="nav-link" href="index.php?pages=logout">Đăng xuất</a></li>
									<?
								} else {
									?>
										<li class="nav-item"><a class="nav-link" href="index.php?pages=login">Đăng nhập</a></li>
									<?
								}
							?>		
										
						</ul>

						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="index.php?pages=cart" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
							<?
						if (isset ($_SESSION ['nguoiDung_id'])) {
							include_once 'config/database.php' ;
							global $connection ;
							$id = $_SESSION ['nguoiDung_id'] ;
							$select = mysqli_query ($connection , "SELECT * FROM taikhoan WHERE id = '$id'") ;
							while ($data = mysqli_fetch_assoc ($select)) {
								?>
									<li style="margin-top:auto; margin-bottom:auto;" class="nav-item"><a class="nav-link" href="index.php?pages=login"><?= $data ['user'] ;?></a></li>
								<?
								
							}
						}
					?>	
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