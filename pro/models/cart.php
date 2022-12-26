<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Quoc Binh - HTML Ecommerce</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +077-556-5181</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> quocbinh10012003@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 53 Võ Văn Ngân</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
								<img src="./img/logotaone.png" style="height:150px" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
							<form action="findpro?page=1&key=first" method="post">
									<input class="input" name="key" id = "key" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
<?php
$tinh;
$tong =0;
?>
						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
                                <!-- Session -->
                                    
                                    <!-- Cart -->
                                    <div class="dropdown">
                                   
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Your Cart</span>
                                        </a>
                                        <div class="cart-dropdown">
                                        
                                            <div class="cart-list">
												
                                                <?php
												$tinh = 0;
												if(isset($_SESSION['giohang']))
												{
                                                foreach($_SESSION['giohang'] as $sp):
													$tinh = $sp['soluong']*$sp['Gia'];
                                					$tong = $tong + $tinh;
                                                ?>
                                                <div class="product-widget">
                                                    <div class="product-img">
                                                    <img src="<?php echo "data:image;base64,".base64_encode($sp['Hinh']) ?> " alt="">
                                                    </div>
                                                    <div class="product-body">
                                                        <h3 class="product-name"><a href="#"><?php echo $sp['ten san pham']?></a></h3>
                                                        <h4 class="product-price"><span class="qty"><?php echo $sp['soluong']?>x</span>$<?php echo $sp['soluong']*$sp['Gia']?></h4>
                                                    </div>
													<a href="deletecart_controller?id=<?php echo $sp['ma san pham']?>">
                                                    	<button class="delete"><i class="fa fa-close"></i></button>
													</a>
                                                </div>
                                                <?php
                                            	endforeach;
												}
                                            	?>
                                            </div>
                                            <div class="cart-summary">
                                                <small> Item(s) selected</small>
                                                <h5>SUBTOTAL: $<?php echo $tong?></h5>
                                            </div>
                                            
                                            <div class="cart-btns">
                                                <a href="cart.php">View Cart</a>
                                                <a href="checkout.php">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <!-- /Cart -->
                                    
                                <!-- /Session -->
								<!-- Wishlist -->
								<div>
									<a href="login.php">
									<i class="fa fa-arrow-right"></i>
										<span>Logout</span>
									</a>
								</div>
								<!-- /Wishlist -->
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="store?page=1">Shop Now</a></li>
						<li><a href="store_category?id=2001">SmartPhones</a></li>
						<li><a href="store_category?id=2002">Laptops</a></li>
						<li><a href="store_category?id=2003">SmartWatchs</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Cart</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Cart</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

        <!-- Carts -->
        <?php
        include_once 'productsDAO.php';
        $data = new ProductsDAO();
        $pro = $data->getAllProducts();
        $money;
        $total = 0;

        ?>
		<!-- Dong1 -->
        <div class="container">
			<!-- Dong 2 -->
        	<div class="products-widget" data-nav="#slick-nav-5">
				<!-- Dong 3 -->
				<div>
                    <?php
						if(isset($_SESSION['giohang']))
						{
                        $money = 0;
						
                            foreach($_SESSION['giohang'] as $sp):
                                $money = $sp['soluong']*$sp['Gia'];
                                $total = $total + $money;
                            ?>
                                <div class="product-widget">
                                	<div class="product-img">
                                		<div class="qty">x<?php echo $sp['soluong'] ?></div>
                                        	<img src="<?php echo "data:image;base64,".base64_encode($sp['Hinh']) ?> " alt="">
                                    </div> 
                                        <!-- product widget -->
                                    
                                        <div class="product-body">
                                            <p class="product-category"><?php echo $sp['ma san pham'] ?></p>
                                            <h3 class="product-name"><?php echo $sp['ten san pham'] ?></a> 
                                            <button style="background-color:red">
                                            <a href="deletecart_controller?id=<?php echo $sp['ma san pham'] ?>"><i class="fa fa-solid fa-trash"></i> Delete</a>
                                            </button>
                                            </h3>
                                            <h4 class="product-price"><a href="#">$<?php echo $sp['Gia'] ?>  </a> x<?php echo $sp['soluong']?> <i class="fa fa-arrow-right"></i> $<?php echo $sp['Gia']*$sp['soluong']?>
                                                <button>
                                                <a href="cart_controller?id=<?php echo $sp['ma san pham'] ?>"><i class="fa fa-plus"> Add</i></a>
                                                </button>
                                                <button>
                                                <a href="cart_delete?id=<?php echo $sp['ma san pham'] ?>"><i class="fa fa-minus"> Delete</i></a>
                                                </button>
                                            </h4>
                                        </div>
                                </div>
                                    <!-- /product widget -->
                                <?php	
                                    endforeach;		
						}
						?>		
				</div>
				<!-- /Dong3 -->
			</div>
			<!-- /Dong 2 -->
			<!-- Mo1 -->
    		<div class="section-title">
				<h4 class="title">Total: $<?php echo $total?> &emsp; &emsp;
                        <a href="checkout.php">
                            <button style="background-color:green; color:white" >
                            Checkout Now<i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </a>
                </h4>
			</div>	
			<!-- /Mo1 -->
                        
    	</div>
		<!-- Dong1 -->
   
						


	
        <!-- /Carts -->
		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
