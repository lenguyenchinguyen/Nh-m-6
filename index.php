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
	<link rel="stylesheet" href="/client/css/font-awesome.min.css">
	<link rel="stylesheet" href="/client/css/themify-icons.css">
	<link rel="stylesheet" href="/client/css/bootstrap.css">
	<link rel="stylesheet" href="/client/css/owl.carousel.css">
	<link rel="stylesheet" href="/client/css/nice-select.css">
	<link rel="stylesheet" href="/client/css/nouislider.min.css">
	<link rel="stylesheet" href="/client/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="/client/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="/client/css/magnific-popup.css">
	<link rel="stylesheet" href="/client/css/main.css">
</head>

<body>

	<!-- Start Header Area -->
		<?php
			include './client/header.php';
		?>
	<!-- End Header Area -->

	<?php
    if (isset($_GET["pages"])) {
        switch ($_GET["pages"]) {
            case "index":
                
                break;

            default:
                include "client/homepage.php";
                break;
			 case "cart":

				include "client/cart.php";
			 	break;
			case "checkout":

				include "client/checkout.php";
				break;
			case "blog":

				include "client/blog.php";
				break;
			case "category":

				include "client/catagory.php";
				break;
			case "confirmation":

				include "client/confirmation.php";
				break;
			case "contact":

				include "client/contact.php";
				break;
			case "contact_process":

				include "client/contact.php";
				break;

			case "elements":

				include "client/elements.php";
				break;
			case "login":

				include "client/login.php";
				break;
			case "single-blog":

				include "client/single-blog.php";
				break;
			case "single-product":

				include "client/single-product.php";
				break;
			case "tracking":

				include "client/tracking.php";
				break;
				
			

                // switch ($_GET["action"]) {
                //     case "cart":
                //         include "index.php";
                //     break;
                // }
        }
    }else{
        include "client/homepage.php";
    }
    ?>

	<!-- start footer Area -->
		<?php
			include './client/footer.php';
		?>
	<!-- End footer Area -->

	<script src="./client/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="./client/js/vendor/bootstrap.min.js"></script>
	<script src="./client/js/jquery.ajaxchimp.min.js"></script>
	<script src="./client/js/jquery.nice-select.min.js"></script>
	<script src="./client/js/jquery.sticky.js"></script>
	<script src="./client/js/nouislider.min.js"></script>
	<script src="./client/js/countdown.js"></script>
	<script src="./client/js/jquery.magnific-popup.min.js"></script>
	<script src="./client/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="./client/js/gmaps.min.js"></script>
	<script src="./client/js/main.js"></script>
</body>

</html>